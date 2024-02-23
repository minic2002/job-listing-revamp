<x-dashboard-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-4">
                UPLOAD RESUME
            </h2>
        </header>
        <form action="/store/resume" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" name="name" id="name" class="border border-gray-200 rounded p-2 w-full" value="{{old('name')}}">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="resume_url" class="inline-block text-lg mb-2">Upload Resume</label>
                <input type="file" accept=".pdf,.xlsx,.xls,.csv" name="resume_url" id="resume_url" class="border border-gray-200 rounded p-2 w-full">
                @error('resume_url')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-8 flex justify-center">
                <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Submit</button>
            </div>
        </form>
    </x-card>
</x-dashboard-layout>