@php
    $types = ['full-time', 'part-time'];
@endphp
<div class="hidden main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border shadow-lg modal-container bg-white md:max-w-4xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6  pb-6">
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold items-center">Edit Job: <span id="listing_job"></span></p>
                <div onclick="modalClose()" class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <!--Body-->
            <div class="my-5 h-96 pb-16">
                <form action="/update/job-post" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
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
                            <input type="number" name="min_monthly_salary" id="min_monthly_salary" class="border border-gray-200 rounded p-2 w-full">
                            @error('min_monthly_salary')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6 ml-2">
                            <label for="max_monthly_salary" class="inline-block text-lg mb-2">Max Salary</label>
                            <input type="number" name="max_monthly_salary" id="max_monthly_salary" class="border border-gray-200 rounded p-2 w-full">
                            @error('max_monthly_salary')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
        
                    {{-- Job Title --}}
                    <div class="mb-6">
                        <label for="job_title" class="inline-block text-lg mb-2">Job Title</label>
                        <input type="text" name="job_title" id="job_title" class="border border-gray-200 rounded p-2 w-full">
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
                    <div class="mb-8 flex justify-center pb-8">
                        <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Post Job</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<script>
    const modal = document.querySelector('.main-modal');

    const modalClose = () => {
        modal.classList.add('hidden');

    }

    const openModal = (listings) => {
        modal.classList.remove('hidden');
        const parsedListings = JSON.parse(listings);
        document.getElementById('id').value=parsedListings.id;
        document.getElementById('employment_type').value=parsedListings.employment_type;
        document.getElementById('min_monthly_salary').value=parsedListings.min_monthly_salary;
        document.getElementById('max_monthly_salary').value=parsedListings.max_monthly_salary;
        document.getElementById('job_title').value=parsedListings.job_title;
        document.getElementById('job_category_id').value=parsedListings.job_category_id;
        document.getElementById('description').value=parsedListings.description;
        document.getElementById('listing_job').innerHTML=parsedListings.job_title;
    }
  </script>