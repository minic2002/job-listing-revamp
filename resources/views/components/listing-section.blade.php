@props(['listing'])

<x-card class="p-6">
    <div class="flex">
        <img
            class="hidden w-40 h-40 mr-6 md:block object-cover"
            src="{{asset('storage/' . $listing->company->logo_url)}}"
            onerror="this.src='{{asset('images/no-image.png')}}'"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->job_title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company->name }}</div>
            <p class="text-sm">{{ $listing->description }}</p>
            <h3 class="text-2xl">₱{{ $listing->min_monthly_salary }} - ₱{{ $listing->max_monthly_salary }}</h3>
        </div>
    </div>
</x-card>
