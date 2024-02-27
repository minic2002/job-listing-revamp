<x-layout>
    @include('partials.landing._hero')

    <section id="jobs">
        <h1 class="text-4xl font-semibold text-hipe-blue text-center pt-6">FEATURED JOBS</h1>
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 p-6">
            @unless (count($listings) == 0)
                @foreach ($listings as $listing)
                    <x-listing-section :listing="$listing" />
                @endforeach
            @else
                <p>No Listing Found</p>
            @endunless
        </div>
    </section>
    
    @include('partials.landing._footer')
</x-layout>