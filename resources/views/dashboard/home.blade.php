<x-dashboard-layout>
    {{-- Counts --}}
    <div class=" grid grid-cols-3 gap-4">
        <div class="rounded-md bg-gray-100 shadow-md flex justify-between ">
            <div class="p-6">
                <h1 class="font-semibold text-3xl">{{ $listings_count }}</h1>
                <p class="text-sm text-gray-500">{{ ($listings_count > 1) ? 'Your Job Listings' : 'Your Job Listing' }}</p>


            </div>
            <div class=" mr-4 flex flex-col justify-center ">
                <h6 class="text-sm font-semibold text-green-500">14.6% <span><i
                            class="fa-solid fa-arrow-up text-green-500"></i></span></h6>
            </div>
        </div>

        <div class="rounded-md bg-gray-100 shadow-md flex justify-between ">
            <div class="p-6">
                <h1 class="font-semibold text-3xl">{{ $listing_applications_count }}</h1>
                <p class="text-sm text-gray-500">{{ ($listing_applications_count > 0) ? 'Your Job Listing Applications' : 'Your Job Listing Application' }}</p>


            </div>
            <div class=" mr-4 flex flex-col justify-center ">
                <h6 class="text-sm font-semibold text-green-500">32.9% <span><i
                            class="fa-solid fa-arrow-up text-green-500"></i></span></h6>
            </div>
        </div>

        <div class="rounded-md bg-gray-100 shadow-md flex justify-between ">
            <div class="p-6">
                <h1 class="font-semibold text-3xl">{{ $applications_count }}</h1>
                <p class="text-sm text-gray-500">{{ ($applications_count > 1) ? 'Your Job Applications' : 'Your Job Application' }}</p>


            </div>
            <div class=" mr-4 flex flex-col justify-center ">
                <h6 class="text-sm font-semibold text-red-500">-2.7% <span><i
                            class="fa-solid fa-arrow-down text-red-500"></i></span></h6>
            </div>
        </div>
    </div>
    {{-- Your Companies --}}
    <div class="grid grid-cols-2 gap-4   mt-10">
        <div class="rounded-md p-4 shadow-md bg-gray-100">
            <div class=" flex justify-between">
                <div>
                    <h4 class="text-lg font-semibold">Your Companies</h4>
                </div>
                <div>

                    <p class="text-hipe-blue">View all</p>
                </div>
            </div>
            <div class="mt">
                <ul>
                    <li class="flex items-center p-2 "> <img src="{{ asset('images/logo.png') }}" alt="logo"
                            class="w-8 rounded-full">
                        <span class="mx-2">
                            <h4>HIPE 1</h4>
                        </span>


                    </li>
                    <div class="mx-auto ">
                        <hr class="border-gray-400 border-1/2 w-[95%]  mx-2">
                    </div>
                    <li class="flex items-center p-2"> <img src="{{ asset('images/logo.png') }}" alt="logo"
                            class="w-8 rounded-full">
                        <span class="mx-2">
                            <h4>HIPE 2</h4>
                        </span>
                    </li>
                    <div class="mx-auto ">
                        <hr class="border-gray-400 border-1/2 w-[95%]  mx-2">
                    </div>
                    <li class="flex items-center p-2"> <img src="{{ asset('images/logo.png') }}" alt="logo"
                            class="w-8 rounded-full">
                        <span class="mx-2">
                            <h4>HIPE 3</h4>
                        </span>
                    </li>
                    <div class="mx-auto ">
                        <hr class="border-gray-400 border-1/2 w-[95%]  mx-2">
                    </div>
                </ul>
            </div>
        </div>
        <div class="rounded-md p-4 shadow-md p2 bg-gray-100">Content is uploading...</div>
    </div>
</x-dashboard-layout>