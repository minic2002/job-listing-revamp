<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{asset('storage/' . $listing->company->logo_url)}}"
                    onerror="this.src='{{asset('images/no-image.png')}}'"
                    alt="" />

                <h3 class="text-2xl mb-2">{{ $listing->job_title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company->name }}</div>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->company->address }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{ $listing->description }}
                        </p>

                        @auth
                            @if ($resumes->count() > 0  &&  auth()->user()->id != $listing->user_id)
                                <a
                                    onclick="openModal()"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 cursor-pointer">
                                    <i class="fa-solid fa-envelope"></i>
                                    Apply Now
                                </a>
                            @else
                                <a 
                                    href="/dashboard/my-resume"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 cursor-pointer">
                                    <i class="fa-solid fa-envelope"></i>
                                    Apply Now
                                </a>
                            @endif
                        @else
                            <a 
                                href="/login"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 cursor-pointer">
                                <i class="fa-solid fa-envelope"></i>
                                Apply Now
                            </a>
                        @endauth

                    </div>
                </div>
            </div>
        </x-card>

    </div>
    
    {{-- Modal --}}
    @include('partials/listing/_job-form-modal')
    <script>
        const modal = document.querySelector('.main-modal');
    
        const modalClose = () => {
            modal.classList.add('hidden');
        }
    
        const openModal = () => {
            modal.classList.remove('hidden');
        }
    </script>
</x-layout>