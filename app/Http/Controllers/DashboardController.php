<?php
namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $posts = Auth::user()->posts()->latest()->paginate(6);

        return view('users.dashboard', ['posts' => $posts]);

    }
    public function userPosts(User $user)
    {

        $userPosts = $user->posts()->latest()->paginate(6);
        $auth = auth()->user(); // Get the authenticated user

        if ($auth->id != $user->id) {
            abort(403, 'You cannot access this stuff, Idiot.');
        }
        return view('users.posts', [
            'posts' => $userPosts,
            'user' => $user
        ]);
    }
}
