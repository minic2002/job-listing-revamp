<x-dashboard-layout>
    <div class="px-6 mt-2 overflow-hidden rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-[44px] font-sans font-bold">Job Listings</h1>
            <div class="">
                <a href="{{ route('dashboard.job-listings-post') }}" class="bg-hipe-dark-blue text-md py-2 px-6 text-white rounded-lg shadow-sm">Post a Job</a>
            </div>
        </div>
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
          <thead class="bg-gray-100">
            <tr>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Listings</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Job Category</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Applicants</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Employee Type</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @if ($listings->count() > 0)
                @foreach ($listings as $listing)
                <tr class="hover:bg-gray-50">
                  <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                    <div class="relative h-16 w-16">
                      <img
                        class="h-full w-full rounded-lg object-contain bg-gray-200 p-2 object-center"
                        src="{{ $listing->company->image_url() }}"
                        onerror="this.src='{{asset('/images/logo_hipe_black.png')}}'"
                        alt=""
                      />
                    </div>
                    <div class="text-sm">
                      <div class="font-medium text-gray-700">{{ $listing->job_title }}</div>
                      <div class="text-gray-400">{{ $listing->company->name }}</div>
                    </div>
                  </th>
                  <td class="px-6 py-4">{{ $listing->job_category->name }}</td>
                  <td class="px-6 py-4"><a href="/dashboard/job-listings/{{ $listing->id }}/applicants">{{ $listing->job_application->count() }}</a></td>
                  <td class="px-6 py-4">
                    <span class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold {{ ($listing->employment_type == 'full-time') ? 'text-green-600 bg-green-50' : 'text-orange-600 bg-orange-50' }}">
                      <span class="h-1.5 w-1.5 rounded-full {{ ($listing->employment_type == 'full-time') ? 'bg-green-600' : 'bg-orange-600' }}"></span>
                      {{ ucwords(str_replace("-", " - ", $listing->employment_type)) }}
                    </span>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex justify-start gap-4">
                      <a onclick="openModal('{{ $listing }}')">
                         <i class="fa-solid fa-edit text-xl text-green-600"></i>
                      </a>
                    </div>
                  </td>
                </tr>                  
                @endforeach
            @else
            <tr>
                <td colspan="6" class="px-6 py-4 text-center">NO DATA AVAILABLE</td>
            </tr>  
            @endif
          </tbody>
        </table>
      </div>

      @include('partials.dashboard._edit-job-listing-modal')

</x-dashboard-layout>