<div class="hidden main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border shadow-lg modal-container bg-white md:max-w-4xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6  pb-6">
            <div class="flex justify-between items-center">
                <p class="text-2xl font-bold items-center">Edit Company to <span id="company_name"></span></p>
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
                <form action="/update/company" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="mb-6">
                        <label for="logo_url" class="inline-block mb-2">Logo</label>
                        <input type="file" accept="image/*" name="logo_url" id="logo_url" class="border border-gray-200 rounded p-2 w-full">
                    </div>
                    <div class="lg:grid lg:grid-cols-2 gap-4">
                        {{--  --}}
                        <div class="mb-6">
                            <label for="name" class="inline-block mb-2">Company Name</label>
                            <input type="text" name="name" id="name" class="border border-gray-200 rounded p-2 w-full">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="address" class="inline-block mb-2">Address</label>
                            <input type="text" name="address" id="address" class="border border-gray-200 rounded p-2 w-full">
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="city" class="inline-block mb-2">City</label>
                            <input type="text" name="city" id="city" class="border border-gray-200 rounded p-2 w-full">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="state" class="inline-block mb-2">State</label>
                            <input type="text" name="state" id="state" class="border border-gray-200 rounded p-2 w-full">
                            @error('state')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="postal" class="inline-block mb-2">Postal</label>
                            <input type="number" name="postal" id="postal" class="border border-gray-200 rounded p-2 w-full">
                            @error('postal')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="tel" class="inline-block mb-2">Tel</label>
                            <input type="number" name="tel" id="tel" class="border border-gray-200 rounded p-2 w-full">
                            @error('tel')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="email" class="inline-block mb-2">Email</label>
                            <input type="email" name="email" id="email" class="border border-gray-200 rounded p-2 w-full">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="website" class="inline-block mb-2">Website</label>
                            <input type="text" name="website" id="website" class="border border-gray-200 rounded p-2 w-full">
                            @error('website')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-8 flex justify-center pb-8">
                        <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Edit Company</button>
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
        document.getElementById('id').value=null;
        document.getElementById('name').value=null;
        document.getElementById('address').value=null;
        document.getElementById('city').value=null;
        document.getElementById('state').value=null;
        document.getElementById('postal').value=null;
        document.getElementById('tel').value=null;
        document.getElementById('email').value=null;
        document.getElementById('website').value=null;
    }

    const openModal = (company) => {
        modal.classList.remove('hidden');
        const parsedCompany = JSON.parse(company);
        document.getElementById('id').value=parsedCompany.id;
        document.getElementById('name').value=parsedCompany.name;
        document.getElementById('address').value=parsedCompany.address;
        document.getElementById('city').value=parsedCompany.city;
        document.getElementById('state').value=parsedCompany.state;
        document.getElementById('postal').value=parsedCompany.postal;
        document.getElementById('tel').value=parsedCompany.tel;
        document.getElementById('email').value=parsedCompany.email;
        document.getElementById('website').value=parsedCompany.website;
        document.getElementById('company_name').innerHTML=parsedCompany.name;
    }
  </script>