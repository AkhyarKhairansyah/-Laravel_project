<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Mail\WelcomeMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Define middleware for this controller.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user (if needed)
        $posts = Post::latest()->paginate(5); // Paginate posts
        $name = "Wasteland News"; // Example variable to pass to the view


        return view('posts.index', ['posts' => $posts, 'name' => $name]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'body'  => ['required'],
            'image' => ['nullable', 'file', 'max:50000', 'mimes:webp,png,jpg']
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('posts_images', $request->image);
        }

        Post::create([
            'title'   => $validatedData['title'],
            'body'    => $validatedData['body'],
            'image'   => $path,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
       
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'body'  => ['required'],
            'image' => ['nullable', 'file', 'max:50000', 'mimes:webp,png,jpg']
        ]);

        $path = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = Storage::disk('public')->put('posts_images', $request->image);
        }

        $post->update([
            'title' => $validatedData['title'],
            'body'  => $validatedData['body'],
            'image' => $path,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return back()->with('delete', 'Your post is deleted for sure.');
    }

    /**
     * Display the posts of the authenticated user.
     */
    public function showUserPosts($id)
    {

        $user = auth()->user(); // Get the authenticated user

        if ($user->id != $id) {
            abort(403, 'You cannot access this stuff, Idiot.');
        }

        $posts = $user->posts()->latest()->paginate(5); // Fetch user’s posts
        $userPostCount = $user->posts()->count(); // Count their posts

        return view('posts.my', [
            'user' => $user,
            'posts' => $posts,
            'userPostCount' => $userPostCount
        ]);
    }
}
