<x-layout>
    <x-logo>
        <x-card class="p-10 max-w-lg mx-auto mt-6">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Reset Password
                </h2>
                <p class="mb-4">Remember your password? <a href="/login" class="text-red-600">Login here</a></p>
            </header>
            <form action="/reset-password" method="post">
                @csrf
                <input type="hidden" name="token" id="token" value="{{ $token }}">
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-200 rounded p-2 w-full" value="{{ $email }}" readonly>
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
                <div class="mb-6">
                    <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-200 rounded p-2 w-full" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-8 flex justify-center">
                    <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Reset Your Password</button>
                </div>
            </form>
        </x-card>
    </x-logo>
</x-layout>