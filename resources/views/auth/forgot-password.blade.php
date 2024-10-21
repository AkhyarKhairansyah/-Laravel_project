<x-layout>
    <h1 class="title">Request a password reset email</h1>

    {{-- Session Messages --}}
    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" />
    @endif

    <div class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
        <form action="{{ route('password.request') }}" method="post" x-data="formSubmit" @submit.prevent="submit">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') ring-red-500 @enderror">

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button x-ref="btn" type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Submit
            </button>
        </form>
    </div>
</x-layout>
