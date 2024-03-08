<nav class="bg-hipe-dark-blue border-b border-gray-200 w-full">
   <div class="p-3 flex justify-between">
      <div class="flex">
         <img src="/images/hipe_logo.svg" width="105" class="border-r-2 border-gray-400 pr-4">
         <h1 class="pl-4 text-hipe-yellow text-4xl font-semibold">JOB</h1>
         <h1 class="text-hipe-blue text-4xl">LISTING</h1>
      </div>
      <div class="mt-3 flex">

        <div class="relative inline-flex w-fit">
            <div
                class="text-md absolute bottom-auto left-auto right-4 top-2 z-10 inline-block w-6 -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 whitespace-nowrap rounded-full bg-red-700 px-2 py-1 text-start align-baseline font-bold leading-none text-white">
                <p class="" id="notification-badge">0</p>
            </div>
            <div class="relative mr-3">
                <a href="{{ route('dashboard.notification') }}">
                    <i class="fa-solid fa-bell text-3xl text-white"> </i>
                </a>
            </div>
        </div>
        
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

<script>
$(document).ready(function() {
    updateNotificationBadge();
    // Fetch the count of unread notifications every 30 seconds
    setInterval(updateNotificationBadge, 2000); // 30 seconds
});

function updateNotificationBadge() {
    $.ajax({
        url: '/api/notifications/unread_count',
        type: 'GET',
        data: { user_id: {{ auth()->user()->id }} },
        success: function(response) {
            var count = response.count;
            $('#notification-badge').text(count);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
</script>