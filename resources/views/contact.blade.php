<x-layout>
    <x-hero-footer>
        <x-card class="p-10 max-w-lg mx-auto mt-2 bg-hipe-blue">
            <header class="text-center">
                <h2 class="text-2xl text-white font-bold uppercase mb-4">
                    CONTACT US
                </h2>
            </header>
            <form action="/store-message" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="email" class="inline-block text-sm font-semibold mb-2 text-white">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-200 rounded p-2 w-full" value="{{old('email')}}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="subject" class="inline-block text-sm font-semibold mb-2 text-white">Subject</label>
                    <input type="text" name="subject" id="subject" class="border border-gray-200 rounded p-2 w-full" value="{{old('subject')}}">
                    @error('subject')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="message" class="inline-block text-sm font-semibold mb-2 text-white">Message</label>
                    <textarea name="message" id="message" cols="30" class="border border-gray-200 rounded p-2 w-full h-28" rows="10">{{old('message')}}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-8 flex justify-center">
                    <button type="submit" class="bg-hipe-dark-blue w-full text-white font-semibold rounded py-2 px-4">Submit</button>
                </div>
            </form>
        </x-card>
    </x-hero-footer>
</x-layout>