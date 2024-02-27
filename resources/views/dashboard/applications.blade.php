<x-dashboard-layout>
    <div class="px-6 mt-2 overflow-hidden rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-[44px] font-sans font-bold">My Job Applications</h1>
            {{-- <div class="">
                <a href="" class="bg-hipe-dark-blue text-md py-2 px-6 text-white rounded-lg shadow-sm">Post a Job</a>
            </div> --}}
        </div>
    </div>
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-100">
            <tr>
                @foreach ($headers as $h)
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{ $h }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @if ($applications->count() > 0)
                @foreach ($applications as $application)
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 items-center">
                        <div class="relative h-16 w-16">
                            <img
                            class="h-full w-full rounded-lg object-contain bg-gray-200 p-2 object-center"
                            src="{{ asset('storage/' . $application->job_listing->company->logo_url) }}"
                            onerror="this.src='{{asset('/images/logo_hipe_black.png')}}'"
                            alt=""/>
                        </div>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">{{ $application->job_listing->company->name }}</div>
                            <div class="text-gray-400">{{ $application->job_listing->company->email }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                        >
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            {{ $application->job_listing->job_title }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ '₱' . $application->job_listing->min_monthly_salary . ' - ₱' . $application->job_listing->max_monthly_salary }}</td>
                    <td class="px-6 py-4">{{ $application->user_resume->name }}</td>
                    <td class="px-6 py-4">{{ date('Y-m-d', strtotime($application->created_at)) }}</td>
                    <td class="px-6 py-4">
                        @switch($application->status)
                            @case('accept')
                            @case('on-initial-interview')
                            @case('on-skills-test')
                            @case('on-final-interview')
                            @case('hired')
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                    {{ ucwords($application->status) }}
                                </span>
                                @break
                            @case('reject')
                            @case('failed')
                            @case('declined')
                                <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                    {{ ucwords($application->status) }}
                                </span>
                                @break
                            @default
                                <span class="inline-flex items-center gap-1 rounded-full bg-orange-50 px-2 py-1 text-xs font-semibold text-orange-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-orange-600"></span>
                                    {{ ucwords($application->status) }}
                                </span>
                        @endswitch
                        
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
</x-dashboard-layout>