<div class="hidden main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div
        class="border shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Application form to {{$listing->company->name}}</p>
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
            <div class="my-5">
                <form method="POST" action="/listings/apply">
                    @csrf
                    <input type="hidden" name="job_listing_id" value="{{ $listing->id }}"/>
                    {{-- Resume --}}
                    <div class="mb-6">
                        <label for="resume_id" class="inline-block text-lg mb-2">Resume</label>
                        <select class="border border-gray-200 rounded p-2 w-full" name="resume_id" id="resume_id">
                          <option disabled selected>Select your resume</option>
                          @foreach ($resumes as $resume)
                              <option value="{{ $resume->id }}">{{ $resume->name }}</option>
                          @endforeach
                        </select>
                        @error('resume_id')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="mb-6">
                      <label for="first_name" class="inline-block text-lg mb-2">First Name</label>
                      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="first_name" id="first_name"
                        value="{{old('first_name')}}" />

                      @error('first_name')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="mb-6">
                      <label for="last_name" class="inline-block text-lg mb-2">Last Name</label>
                      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="last_name" id="last_name"
                        value="{{old('last_name')}}" />

                      @error('last_name')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>

                    {{-- Contact Number --}}
                    <div class="mb-6">
                        <label for="tel" class="inline-block text-lg mb-2">Contact Number</label>
                        <input type="number" class="border border-gray-200 rounded p-2 w-full" name="tel" id="tel"
                          value="{{old('tel')}}" />

                        @error('tel')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- Education --}}
                    <div class="mb-6">
                      <label for="education" class="inline-block text-lg mb-2">Education</label>
                      <select class="border border-gray-200 rounded p-2 w-full" name="education" id="education"
                        value="{{old('education')}}">
                        <option selected disabled>Select education</option>
                        @foreach ($educations as $education)
                            <option value="{{ $education }}">{{ ucwords($education) }}</option>
                        @endforeach
                      </select>

                      @error('education')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>

                    <div class="flex justify-center pt-2">
                      <button type="submit" class="z-40 focus:outline-none px-4 bg-hipe-dark-blue p-3 ml-3 rounded-lg text-white hover:bg-teal-400">
                          Submit Application
                      </button>
                  </div>
                </form>
            </div>
            
        </div>
    </div>
</div>