<x-dashboard-layout>
    <div class="overflow-hidden rounded-lg border border-gray-200 px-12">
        @if ($notifications->count() > 0)
        <div class="container mx-auto mt-4">
            <h4 class="text-lg font-medium">You have {{ $notif_count }} unread {{ $notif_count > 1 ? 'notifications' : 'notification' }}</h4>
        </div>
            @foreach ($notifications as $notification)
            <div class="mx-start mt-4 flex max-w-3xl overflow-hidden rounded-lg shadow-lg cursor-pointer {{ $notification->read == true ? 'bg-gray-200' : 'bg-white' }}" onclick="location.href='/read-notification/{{ $notification->id }}'">
                <div class="{{ $notification->read == true ? 'bg-gray-400' : 'bg-hipe-blue' }} w-2"></div>
                <div class="flex items-center px-2 py-3">
                    <img class="h-12 w-12 rounded-full object-cover"
                        src="{{ $notification->job_application->job_listing->company->image_url() }}">
                    <div class="mx-3">
                        <h2 class="text-xl font-semibold text-gray-800 ">{{ $notification->message }}</h2>
                        <p class="text-gray-600"> {{ date('F d, Y h:i A', strtotime($notification->created_at)) }} </p>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="flex justify-center items-center pt-56">
                No notifications exist at this time
            </div>
        @endif
        
    </div>
</x-dashboard-layout>