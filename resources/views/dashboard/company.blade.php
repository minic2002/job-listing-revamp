<x-dashboard-layout>
    <div class="px-6 mt-2 overflow-hidden rounded-lg border border-gray-200">
      <div class="flex justify-between items-center mb-10">
          <h1 class="text-[44px] font-sans font-bold">Company</h1>
          <div class="">
              <a href="{{ route('dashboard.company-create') }}" class="bg-hipe-dark-blue text-md py-2 px-6 text-white rounded-lg shadow-sm">Create company</a>
          </div>
      </div>
      <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-100">
          <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Website</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Address</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Contact</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
          @if ($companies)
              @foreach ($companies as $company)
              <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                  <div class="relative h-16 w-16">
                    <img
                      class="h-full w-full rounded-lg object-contain bg-gray-200 p-2 object-center"
                      src="{{ asset('storage/' . $company->logo_url) }}"
                      onerror="this.src='{{asset('/images/logo_hipe_black.png')}}'"
                      alt=""
                    />
                  </div>
                  <div class="text-sm">
                    <div class="font-medium text-gray-700">{{ $company->name }}</div>
                    <div class="text-gray-400">{{ $company->email }}</div>
                  </div>
                </th>
                <td class="px-6 py-4">
                  <span
                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                  >
                    <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                    {{ $company->website }}
                  </span>
                </td>
                <td class="px-6 py-4">{{ $company->address }}</td>
                <td class="px-6 py-4">
                  {{ $company->tel }}
                </td>
              </tr>                  
              @endforeach
              
          @endif
        </tbody>
      </table>
    </div>
  </x-dashboard-layout>