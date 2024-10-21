<x-layout>
    <h1 class="title text-3xl font-bold mb-6">Register a New Account</h1>
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-lg mx-auto">
        <form action="{{ route('register') }}" method="post" x-data="formSubmit"  >
            @csrf

            {{-- Username --}}
            <div class="mb-8">
                <label for="username" class="block text-lg font-medium text-gray-700 mt-3">Username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="mt-2 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg @error('username') ring-red-500 @enderror">
                @error('username')
                    <p class="text-red-600 text-base mt-1">{{ $message }}</p>
                @enderror
            </div>

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

            {{-- Confirm Password --}}
            <div class="mb-8">
                <label for="password_confirmation" class="block text-lg font-medium text-gray-700 mt-3">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="mt-2 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg">
            </div>

            {{-- Subscribe --}}
            <div class="mb-8 flex items-center">
                <input type="checkbox" name="subscribe" id="subscribe"
                    class="h-6 w-6 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="subscribe" class="ml-3 text-lg text-gray-900 mt-3">Subscribe to our newsletter</label>
            </div>

            {{-- Submit Button --}}
            <button x-ref="btn" type="submit" class="w-full bg-indigo-600 text-white text-lg py-3 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Register
            </button>
        </form>
    </div>
</x-layout>
