<x-layout>
    <x-logo>
        <x-card class="p-10 max-w-lg mx-auto mt-6">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account</p>
            </header>
            <form action="/users" method="post">
                @csrf
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-200 rounded p-2 w-full" value="{{old('email')}}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">Password</label>
                    <input type="password" name="password" id="password" class="border border-gray-200 rounded p-2 w-full" value="{{old('password')}}">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-8 flex justify-center">
                    <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Register</button>
                </div>
                <div>
                    Already have an account? <a href="/login" class="text-red-600">Login</a>
                </div>
            </form>
        </x-card>
    </x-logo>
</x-layout>