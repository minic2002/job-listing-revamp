@php
    $types = ['full-time', 'part-time'];
@endphp
<x-dashboard-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-4">
                POST A JOB
            </h2>
        </header>
        <form action="/store/job-post" method="post">
            @csrf
            {{-- Select Company --}}
            <div class="mb-6">
                <label for="company_id" class="inline-block text-lg mb-2">Company</label>
                <select name="company_id" id="company_id" class="border border-gray-200 rounded p-2 w-full">
                    <option disabled selected>Select Company</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ Str::studly($company->name) }}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Select Employee Type --}}
            <div class="mb-6">
                <label for="employment_type" class="inline-block text-lg mb-2">Employee Type</label>
                <select name="employment_type" id="employment_type" class="border border-gray-200 rounded p-2 w-full">
                    <option disabled selected>Select Employee Type</option>
                    @foreach ($types as $type)
                    <option value="{{ $type }}">{{ Str::studly($type) }}</option>
                    @endforeach
                </select>
                @error('employment_type')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Min Max Salary --}}
            <div class="flex">
                <div class="mb-6">
                    <label for="min_monthly_salary" class="inline-block text-lg mb-2">Min Salary</label>
                    <input type="number" name="min_monthly_salary" id="min_monthly_salary" class="border border-gray-200 rounded p-2 w-full" value="{{old('min_monthly_salary')}}">
                    @error('min_monthly_salary')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6 ml-2">
                    <label for="max_monthly_salary" class="inline-block text-lg mb-2">Max Salary</label>
                    <input type="number" name="max_monthly_salary" id="max_monthly_salary" class="border border-gray-200 rounded p-2 w-full" value="{{old('max_monthly_salary')}}">
                    @error('max_monthly_salary')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>

            {{-- Job Title --}}
            <div class="mb-6">
                <label for="job_title" class="inline-block text-lg mb-2">Job Title</label>
                <input type="text" name="job_title" id="job_title" class="border border-gray-200 rounded p-2 w-full" value="{{old('job_title')}}">
                @error('job_title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Job Category --}}
            <div class="mb-6">
                <label for="job_category_id" class="inline-block text-lg mb-2">Job Category</label>
                <select name="job_category_id" id="job_category_id" class="border border-gray-200 rounded p-2 w-full">
                    <option disabled selected>Select Job Category</option>
                    @foreach ($categories as $company)
                    <option value="{{ $company->id }}">{{ Str::studly($company->name) }}</option>
                    @endforeach
                </select>
                @error('job_category_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <textarea name="description" id="description" class="border border-gray-200 rounded p-2 w-full" cols="30" rows="10"></textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-8 flex justify-center">
                <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Post Job</button>
            </div>
        </form>
    </x-card>
</x-dashboard-layout>