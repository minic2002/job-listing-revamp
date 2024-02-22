<div class="h-full w-full border-r-2 border-gray-300 bg-white pt-20">
    <div class="px-4 pt-6">
        <ul class="space-y-2">
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2" id="home">
                <a href="{{ route('dashboard.home') }}" class="">
                    <i class="ps-2 fa-solid fa-house"></i>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2" id="company">
                <a href="{{ route('dashboard.company') }}" class="">
                    <i class="ps-2.5 fa-solid fa-building"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Company</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2" id="listing">
                <a href="{{ route('dashboard.job-listings') }}" class="">
                    <i class="ps-2.5 fa-solid fa-user-doctor"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Job Listings</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2" id="application">
                <a href="{{ route('dashboard.job-applications') }}" class="">
                    <i class="ps-2 fa-solid fa-file-import"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Job Applications</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2" id="setting">
                <a href="{{ route('dashboard.settings') }}" class="">
                    <i class="ps-2.5 fa-solid fa-gear"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Settings</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2">
                <form action="{{ route('dashboard.logout') }}" method="post">
                    @csrf
                    <i class="ps-2.5 fa-solid fa-right-from-bracket"></i>
                    <button type="submit" class="ml-3 flex-1 whitespace-nowrap">Logout</button type="submit">
                </form>
            </li>
        </ul>
    </div>
</div>

<script>
    let home = document.getElementById('home');
    let company = document.getElementById('company');
    let listing = document.getElementById('listing');
    let application = document.getElementById('application');
    let setting = document.getElementById('setting');
</script>

@if (request()->path() == 'dashboard/home')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        home.classList.add('bg-blue-500', 'rounded-md', 'text-white');
    });
</script>

@elseif(request()->path() == 'dashboard/company' || request()->path() == 'dashboard/company/create')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        company.classList.add('bg-blue-500', 'rounded-md', 'text-white');
    });
</script>

@elseif(request()->path() == 'dashboard/job-listings')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        listing.classList.add('bg-blue-500', 'rounded-md', 'text-white');
    });
</script>

@elseif(request()->path() == 'dashboard/job-applications')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        application.classList.add('bg-blue-500', 'rounded-md', 'text-white');
    });
</script>

@elseif(request()->path() == 'dashboard/settings')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setting.classList.add('bg-blue-500', 'rounded-md', 'text-white');
    });
</script>

@endif