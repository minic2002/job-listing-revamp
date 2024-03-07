<x-dashboard-layout>
    <div class="px-6 mt-2 overflow-hidden rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-[44px] font-sans font-bold">Applicants for - {{ $listing->job_title }}</h1>
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
                @if ($applicants->count() > 0)
                    @foreach ($applicants as $applicant)
                    <tr>
                        <td class="px-6 py-4">{{ $applicant->id }}</td>
                        <td class="px-6 py-4">{{ $applicant->first_name }}</td>
                        <td class="px-6 py-4">{{ $applicant->last_name }}</td>
                        <td class="px-6 py-4">{{ $applicant->tel }}</td>
                        <td class="px-6 py-4">{{ $applicant->user->email }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ $applicant->user_resume->private_resume_url() }}" target="_blank">
                                {{ $applicant->user_resume->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form id="form_{{$applicant->id}}" method="POST" action="/job-listings/{{$listing->id}}/applicant/{{$applicant->id}}/update-status" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                                <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 applicant_status" name="status" id="status">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}" {{ $applicant->status == $status ? 'selected' : '' }} >{{ ucwords($status) }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="px-6 py-4 text-center" colspan="6">NO APPLICANTS</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script>
        var selects = document.querySelectorAll('.applicant_status');
        selects.forEach(function(select) {
            select.addEventListener('change', function() {
                var form = this.closest('form');
                var applicantId = form.querySelector('input[name="applicant_id"]').value;
                form.submit();
            });
        });
    </script>
</x-dashboard-layout>