@php
    $genders = ['male', 'female', 'others'];
@endphp

<x-dashboard-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-4">
                {{ ($user == null) ? 'ADD DETAILS TO YOUR PROFILE' : 'UPDATE YOUR PROFILE' }}
            </h2>
        </header>
        <form action="/update/settings" method="post">
            @csrf
            <div class="mb-6">
                <label for="first_name" class="inline-block text-lg mb-2">First Name</label>
                <input type="text" name="first_name" id="first_name" class="border border-gray-200 rounded p-2 w-full">
                @error('first_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="last_name" class="inline-block text-lg mb-2">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="border border-gray-200 rounded p-2 w-full">
                @error('last_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="age" class="inline-block text-lg mb-2">Age</label>
                <input type="number" name="age" id="age" class="border border-gray-200 rounded p-2 w-full" value="">
                @error('age')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="gender" class="inline-block text-lg mb-2">Gender</label>
                <select name="gender" id="gender" class="border border-gray-200 rounded p-2 w-full">
                    <option disabled selected>Select Gender</option>
                    @foreach ($genders as $gender)
                    <option value="{{ $gender }}">{{ Str::studly($gender) }}</option>
                    @endforeach
                </select>
                @error('gender')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="address" class="inline-block text-lg mb-2">Address</label>
                <input type="text" name="address" id="address" class="border border-gray-200 rounded p-2 w-full" value="">
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="tel" class="inline-block text-lg mb-2">Tel</label>
                <input type="number" name="tel" id="tel" class="border border-gray-200 rounded p-2 w-full" value="">
                @error('tel')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-8 flex justify-center">
                <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Save Profile</button>
            </div>
        </form>
    </x-card>

    @if ($user != null)
        <script>
            document.getElementById('first_name').value='{{ $user->first_name }}';
            document.getElementById('last_name').value='{{ $user->last_name }}';
            document.getElementById('age').value='{{ $user->age }}';
            document.getElementById('gender').value='{{ $user->gender }}';
            document.getElementById('address').value='{{ $user->address }}';
            document.getElementById('tel').value='{{ $user->tel }}';
        </script>
    @endif
</x-dashboard-layout>