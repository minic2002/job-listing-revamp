<x-dashboard-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-4">
                CREATE COMPANY
            </h2>
        </header>
        <form action="/store/company" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="logo_url" class="inline-block text-lg mb-2">Logo</label>
                <input type="file" accept="image/*" name="logo_url" id="logo_url" class="border border-gray-200 rounded p-2 w-full">
            </div>
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" name="name" id="name" class="border border-gray-200 rounded p-2 w-full" value="{{old('name')}}">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="address" class="inline-block text-lg mb-2">Address</label>
                <input type="text" name="address" id="address" class="border border-gray-200 rounded p-2 w-full" value="{{old('address')}}">
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="city" class="inline-block text-lg mb-2">City</label>
                <input type="text" name="city" id="city" class="border border-gray-200 rounded p-2 w-full" value="{{old('city')}}">
                @error('city')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="state" class="inline-block text-lg mb-2">State</label>
                <input type="text" name="state" id="state" class="border border-gray-200 rounded p-2 w-full" value="{{old('state')}}">
                @error('state')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="postal" class="inline-block text-lg mb-2">Postal</label>
                <input type="number" name="postal" id="postal" class="border border-gray-200 rounded p-2 w-full" value="{{old('postal')}}">
                @error('postal')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="tel" class="inline-block text-lg mb-2">Tel</label>
                <input type="number" name="tel" id="tel" class="border border-gray-200 rounded p-2 w-full" value="{{old('tel')}}">
                @error('tel')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-200 rounded p-2 w-full" value="">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website</label>
                <input type="text" name="website" id="website" class="border border-gray-200 rounded p-2 w-full" value="">
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-8 flex justify-center">
                <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Create Company</button>
            </div>
        </form>
    </x-card>
</x-dashboard-layout>