<x-dashboard-layout>
    <div class="px-6 mt-2 overflow-hidden rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-[44px] font-sans font-bold">My Resume</h1>
            <div>
                <a href="{{ route('dashboard.my-resume-post') }}" class="bg-hipe-dark-blue text-md py-2 px-6 text-white rounded-lg shadow-sm">Upload resume</a>
            </div>
        </div>
        <div class=" grid grid-cols-3 gap-4 w-full p-2">
            @foreach ($resumes as $resume)
            @php
                $fileUrl = $resume->resume_url;
                $extension = pathinfo($fileUrl, PATHINFO_EXTENSION);
            @endphp 
            <div class="bg-white rounded-3xl px-2 py-2  shadow-md w- h-44">
                <div class="flex  mt-4">
                    <div class="bg-gray-200 h-14 p-4 rounded-lg">
                        @switch($extension)
                            @case('pdf')
                                <img class="w-full h-full  object-contain"
                                src="{{ asset('images/pdf.png') }}" alt="" />
                                @break
                            @case('xlsx')
                            @case('xls')
                                <img class="w-full h-full  object-contain"
                                src="{{ asset('images/excel.png') }}" alt="" />
                                @break
                            @case('csv')
                                <img class="w-full h-full  object-contain"
                                src="{{ asset('images/csv.png') }}" alt="" />
                            @break
                            @default
                                
                        @endswitch
                    </div>
                    <div class="w-full">
                        <h3 class="px-2 font-semibold">{{ $resume->name }}</h3>
                        <div class=" py-2 flex justify-between ">
                            <p><span> <i class="ps-2.5 fa-solid fa-file text-gray-300 px-2"></i></span>{{ Str::upper($extension) }}</p>
                            <p><span> <i class="ps-2.5 fa-solid fa-calendar text-gray-300 px-2"></i></span>{{ date('Y-m-d', strtotime($resume->created_at)) }}</p>
                        </div>
                        <div>
                            <hr class="">
                        </div>

                    </div>
                </div>
                <div class="flex justify-end p-4  h-24">
                    <div class=" ">
                        <p class="text-sm">This resume is being used in <span
                                class="text-hipe-dark-blue  font-semibold">{{ $resume->job_application->count() }}</span> job {{ ($resume->job_application->count() > 1) ? 'applications' : 'application' }}.</p>
                    </div>
                    <div class="ml-2 border-l-2 px-2 -mr-6 h-12">
                        <button
                            onclick="location.href='{{ asset('storage/' . $resume->resume_url) }}'"
                            class="p-2 rounded-full bg-hipe-dark-blue text-white w-20 ">view
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</x-dashboard-layout>