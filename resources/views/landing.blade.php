<x-layout>
    <x-hero-footer>
        <h1 class="text-4xl font-semibold text-hipe-blue text-center pt-6">FEATURED JOBS</h1>
        
        @unless (count($listings) == 0)
            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 p-6">
                @foreach ($listings as $listing)
                    <x-listing-section :listing="$listing" />
                @endforeach
            </div>
        @else
            <div class="flex justify-center items-center p-16">
                <p>NO LISTING FOUND!</p>
            </div>
        @endunless
        
    </x-hero-footer>
</x-layout>