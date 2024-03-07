<div class="h-full w-full border-r-2 border-gray-300 bg-white pt-20">
    <div class="px-4 pt-6">
        <ul class="space-y-2">
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2 {{ Request::is('dashboard/home') ? 'bg-hipe-blue rounded-md text-white' : '' }}">
                <a href="{{ route('dashboard.home') }}" class="">
                    <i class="ps-2 fa-solid fa-house"></i>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2 {{ Request::is('dashboard/company*') ? 'bg-hipe-blue rounded-md text-white' : '' }} ">
                <a href="{{ route('dashboard.company') }}" class="">
                    <i class="ps-2.5 fa-solid fa-building"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Company</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2 {{ Request::is('dashboard/job-listings*') ? 'bg-hipe-blue rounded-md text-white' : '' }} ">
                <a href="{{ route('dashboard.job-listings') }}" class="">
                    <i class="ps-2.5 fa-solid fa-user-doctor"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Job Listings</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2 {{ Request::is('dashboard/job-applications*') ? 'bg-hipe-blue rounded-md text-white' : '' }}">
                <a href="{{ route('dashboard.job-applications') }}" class="">
                    <i class="ps-2 fa-solid fa-file-import"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Job Applications</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2 {{ Request::is('dashboard/my-resume*') ? 'bg-hipe-blue rounded-md text-white' : '' }}">
                <a href="{{ route('dashboard.my-resume') }}" class="">
                    <i class="ps-2.5 fa-solid fa-file"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">My Resume</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2 {{ Request::is('dashboard/profile') ? 'bg-hipe-blue rounded-md text-white' : '' }}">
                <a href="{{ route('dashboard.profile') }}" class="">
                    <i class="ps-2.5 fa-solid fa-user"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:rounded-md hover:text-white p-2 {{ Request::is('dashboard/settings') ? 'bg-hipe-blue rounded-md text-white' : '' }}">
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