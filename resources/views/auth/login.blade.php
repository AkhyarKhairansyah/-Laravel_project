<x-layout>
    <h1 class="title text-3xl font-bold mb-6">Login to Your Account</h1>
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-lg mx-auto">
        <form action="{{ route('login') }}" method="post" x-data="formSubmit">
            @csrf

            {{-- Email --}}
            <div class="mb-8">
                <label for="email" class="block text-lg font-medium text-gray-700 mt-3">Email</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="mt-2 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="text-red-600 text-base mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-8">
                <label for="password" class="block text-lg font-medium text-gray-700 mt-3">Password</label>
                <input type="password" name="password"
                    class="mt-2 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="text-red-600 text-base mt-1">{{ $message }}</p>
                @enderror
            </div>
  {{-- Remember checkbox --}}
  <div class="mb-4 flex justify-between items-center">
    <div class="flex items-center">
        <input type="checkbox" name="remember" id="remember"
            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
        <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
    </div>

    <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">Forgot your password?</a>
</div>

@error('failed')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror

            {{-- Submit Button --}}
            <button x-ref="btn" type="submit" class="w-full bg-indigo-600 text-white text-lg py-3 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Login
            </button>
        </form>
    </div>
</x-layout>
<script src="//unpkg.com/alpinejs" defer></script>
