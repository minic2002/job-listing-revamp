<nav class="bg-hipe-dark-blue border-b border-gray-200 w-full">
   <div class="p-3 flex justify-between">
      <div class="flex">
         <img src="/images/hipe_logo.svg" width="105" class="border-r-2 border-gray-400 pr-4">
         <h1 class="pl-4 text-hipe-yellow text-4xl font-semibold">JOB</h1>
         <h1 class="text-hipe-blue text-4xl">LISTING</h1>
      </div>
      <div class="mt-3 flex">
         <div class="px-2 ">
             @if (auth()->user()->user_detail)
             <img class="h-9 w-9 rounded-full object-contain bg-gray-200 object-fill"
             src="{{  auth()->user()->user_detail->profile_url() }}" alt="" />
             @else
                 ''
             @endif
         </div>
         <h1 class="flex justify-end  text-2xl font-semibold mr-4 text-gray-300">Welcome,
             {{ auth()->user()->user_detail()->exists() ? auth()->user()->user_detail()->first()->first_name : 'Guest' }}!
         </h1>
     </div>
   </div>
   {{--  --}}
</nav>