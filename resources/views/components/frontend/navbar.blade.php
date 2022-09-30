<div class="hidden lg:flex lg:items-center lg:w-auto w-full lg:ml-auto lg:mr-auto flex-wrap items-center text-base justify-center"
    id="menu">
    <nav
        class="lg:space-x-10 space-x-0 lg:flex items-center justify-between text-base pt-8 lg:pt-0 lg:space-y-0 space-y-6">
        <a href="{{route('index')}}" class="block nav-link active font-medium">Home</a>
        <a href="#" class="block nav-link">Service</a>
        <a href="#" class="block nav-link">About Us</a>

        @auth
        @if (Auth::user()->roles == 'ADMIN')
        <a href="{{route('dashboard.index')}}" class="block nav-link">Dashboard</a>

        @endif
        @endauth

        <div class="dropdown block lg:py-3" x-data="{ dropdownOpen: true }"> <a @click="dropdownOpen = !dropdownOpen"
                :class="{'nav-dropdown-color': !dropdownOpen}" class="flex items-center nav-link relative" href="#">
                <span class="mr-3">Our
                    Contact</span> <svg :class="{'block': dropdownOpen, 'hidden': !dropdownOpen}" class="lg:block"
                    width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.6">
                        <path
                            d="M11.9467 5.45337H7.79335H4.05335C3.41335 5.45337 3.09335 6.2267 3.54668 6.68004L7.00002 10.1334C7.55335 10.6867 8.45335 10.6867 9.00668 10.1334L10.32 8.82004L12.46 6.68004C12.9067 6.2267 12.5867 5.45337 11.9467 5.45337Z"
                            fill="#0F1C2D" />
                    </g>
                </svg> <svg :class="{'block': !dropdownOpen, 'hidden': dropdownOpen}" class="lg:hidden" width="16"
                    height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.6">
                        <path
                            d="M11.9467 5.45337H7.79335H4.05335C3.41335 5.45337 3.09335 6.2267 3.54668 6.68004L7.00002 10.1334C7.55335 10.6867 8.45335 10.6867 9.00668 10.1334L10.32 8.82004L12.46 6.68004C12.9067 6.2267 12.5867 5.45337 11.9467 5.45337Z"
                            fill="rgba(0, 0, 0, 0.55)" />
                    </g>
                </svg> </a>
            <ul :class="{'block z-10': !dropdownOpen, 'hidden': dropdownOpen}"
                class="dropdown-menu lg:hidden absolute bg-white sm:p-6 p-4 rounded-xl lg:mt-3">
                <li class="cursor-pointer">
                    <a href="#" class="dropdown-hover h-full flex sm:p-4 p-2 items-center justify-center text-left">
                        <div class="flex-grow">
                            <h2 class="title-font font-semibold text-sm mb-1 text-black-1">
                                Website Patner </h2>
                            <p class="mb-0 text-xs text-gray-1"> TEst</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
