<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bank Sampah </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap");

            :root {
                --dark-1: #101d2e;
                --dark-2: rgba(0, 0, 0, 0.55);
                --dark-3: #1e2a39;
                --purple-1: #7f31ff;
                --purple-2: #8F00FF;
                --grey-1: #626a7f;
            }

            .font-noto {
                font-family: "Noto Sans", sans-serif;
            }

            .headerID__1 .font-montserrat {
                font-family: "Montserrat", sans-serif;
            }

            .headerID__1 .btn-outline {
                border: 1px solid var(--purple-1);
                color: var(--purple-1);
                transition: 0.3s;
            }

            .headerID__1 .btn-outline:hover {
                background-color: var(--purple-1);
                color: #FFFFFF;
                transition: 0.3s;
            }

            .headerID__1 nav a.nav-link {
                color: var(--dark-2);
                font-weight: 500;
                transition: 0.3s;
            }

            .headerID__1 nav a.nav-link:hover {
                color: var(--dark-1);
                transition: 0.3s;
            }

            .headerID__1 nav a.nav-link.active {
                color: var(--dark-1);
                font-weight: 700;
            }

            .headerID__1 #menu-toggle:checked+#menu,
            .headerID__1 #menu-toggle:checked+#menu+#menu {
                display: block;
            }

            .headerID__1 .btn-fill:hover {
                background-color: var(--purple-2);
                transition: 0.3s;
            }

            .headerID__1 .bg-purple-1 {
                background-color: var(--purple-1);
            }

            .headerID__1 .text-dark-2 {
                color: var(--dark-2);
            }

            .headerID__1 .text-dark-3 {
                color: var(--dark-3);
            }

            .headerID__1 .text-grey-1 {
                color: var(--grey-1);
            }

            .headerID__1 .arrow {
                transition: 0.4s;
                left: 0px;
                padding: 1rem 0;
            }

            .headerID__1 .header:hover .arrow {
                left: 6px;
                transition: 0.4s;
            }

            .headerID__1 .header:hover .card-blur {
                bottom: 33px;
                right: 50px;
                transition: 0.4s;
            }

            .headerID__1 .card-blur {
                background-color: rgba(234, 234, 234, 0.1);
                backdrop-filter: blur(40px);
                bottom: 29px;
                right: 45px;
                transition: 0.4s;
            }

            .headerID__1 .dropdown a.nav-dropdown-color {
                color: var(--dark-1);
                transition: 0.3s;
            }

            .headerID__1 .dropdown-menu {
                width: 250px;
                --tw-shadow: 0 0px 20px 0 rgba(167, 167, 167, 0.1), 0 0px 20px 0 rgba(167, 167, 167, 0.06);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 rgba(167, 167, 167, 0)), var(--tw-ring-shadow, 0 0 rgba(167, 167, 167, 0)), var(--tw-shadow);
            }

            .headerID__1 .dropdown .dropdown-hover:hover {
                background-color: #f9f5ff;
                border-radius: 0.75rem;
            }

            @media (min-width: 375px) {
                .headerID__1 .dropdown-menu {
                    width: 310px;
                }
            }

            @media (min-width: 1024px) {
                .headerID__1 .dropdown:hover a {
                    color: var(--dark-1) !important;
                    transition: 0.3s;
                }

                .headerID__1 .dropdown a.nav-dropdown-color {
                    color: var(--dark-1);
                    transition: 0.3s;
                }

                .headerID__1 .dropdown:hover .dropdown-menu {
                    display: block;
                    z-index: 1;
                }
            }

        </style>
    </head>

    <body>
        <section class="mx-auto max-w-screen-2xl	h-full	w-full border-box transition-all duration-500 linear">
            <main class="headerID__1 font-noto">
                <div class="">
                    <div class="h-full w-full border-box transition-all duration-500 linear lg:px-16 md:px-12 px-4 py-6
                        bg-white">
                        <div class="container mx-auto flex flex-wrap flex-row items-center justify-between">
                            <a href="" class="flex font-medium items-center">
                                <img src="{{asset('./frontend/assets/img/background/Logobank.png')}}" alt="GetShayna"
                                    class="rounded-xl " width="80">
                                <span class="pl-3 font-bold ">Bank Sampah</span>
                            </a>
                            <label for="menu-toggle" class="cursor-pointer lg:hidden block">
                                <svg class="w-6 h-6" fill="none" stroke="#092A33" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16">
                                    </path>
                                </svg>
                            </label>
                            <input class="hidden" type="checkbox" id="menu-toggle" />

                            @include('components.frontend.navbar')

                            @if (Route::has('login'))
                            @auth
                            <div class="hidden lg:flex flex-col-2  lg:items-center lg:w-auto w-full" id="menu">
                                <div class="lg:pl-5">
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="btn-outline text-base items-center border-0 py-3 px-4 focus:outline-none rounded-full mt-6 lg:mt-0">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                                <div class="lg:pl-5">
                                    <form action="{{route('profile.show')}}">
                                        @csrf
                                        <button type="submit"
                                            class="btn-outline text-base items-center border-0 py-3 px-4 focus:outline-none rounded-full mt-6 lg:mt-0">
                                            Setting Profile
                                        </button>
                                    </form>
                                </div>

                            </div>


                            @else
                            <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
                                <form action="{{route('login')}}">
                                    <button type="submit"
                                        class="btn-outline text-base items-center border-0 py-3 px-4 focus:outline-none rounded-full mt-6 lg:mt-0">
                                        login
                                    </button>
                                </form>
                            </div>

                            @endauth

                            @endif

                        </div>
                    </div>
                </div>
                <div class="pt-12 pb-16 px-4 lg:px-32">
                    <div class="header grid grid-cols-12 items-center justify-center lg:mb-10 md:mb-12 mb-14">
                        <div class="col-span-12 md:col-span-5 lg:col-span-6">
                            <div>
                                <div
                                    class="headline text-dark-3 font-medium font-montserrat text-4xl lg:text-5xl lg:leading-tight md:text-left text-center                  ">
                                    Cara gratis untuk menemukan<br class="hidden md:block" /> talenta jarak jauh <br
                                        class="hidden md:block" />
                                    terbaik di dunia
                                    <span class="arrow relative"><svg class=" hidden md:inline-block" width="104"
                                            height="46" viewBox="0 0 104 46" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 20C1.34315 20 0 21.3431 0 23C0 24.6569 1.34315 26 3 26V20ZM103.121 25.1213C104.293 23.9497 104.293 22.0503 103.121 20.8787L84.0294 1.7868C82.8579 0.615224 80.9584 0.615224 79.7868 1.7868C78.6152 2.95837 78.6152 4.85786 79.7868 6.02944L96.7574 23L79.7868 39.9706C78.6152 41.1421 78.6152 43.0416 79.7868 44.2132C80.9584 45.3848 82.8579 45.3848 84.0294 44.2132L103.121 25.1213ZM3 26H101V20H3V26Z"
                                                fill="#832FC5" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="mt-6 mb-14">
                                    <p class="text-grey-1 text-xl md:text-left text-center leading-7">
                                        PT.Kinarya Ahlidaya Mandiri 100%
                                        sumber daya gratis untuk perusahaan<br class="hidden md:block" /> mencari
                                        temukan jarak jauh
                                        bakat di seluruh
                                        bola dunia</p>
                                </div>
                                <div class="md:text-left text-center">
                                    <a href="https://ptkam.co.id/news-event/"
                                        class="py-5 px-8 rounded-full bg-purple-1 btn-fill transition-all duration-300">
                                        <span class="text-white text-center text-xl">More Info</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-7 lg:col-span-6 lg:mt-0 mt-14 relative md:block hidden">
                            <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-Talent-1/headerID__1.png"
                                alt="headerly-getShayna" />
                            <div class="card-blur absolute p-8 text-white rounded-2xl">
                                <p class="font-semibold text-2xl mb-4">Viola</p>
                                <p class="font-medium text-xs mb-1.5">Sofware Developer</p>
                                <p class="font-light">Previously at <span class="font-semibold">Google</span></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-dark-2 text-center font-semibold mb-6">Over 1,500+ trusted partner around the
                            world </p>
                        <div
                            class="font-montserrat flex md:flex-row flex-wrap justify-center lg:space-x-16 space-x-0 lg:gap-0 gap-4">
                            <p class="text-dark-2 font-semibold text-2xl text-center">smartoro</p>
                            <p class="text-dark-2 font-semibold text-2xl text-center">geoapp</p>
                            <p class="text-dark-2 font-semibold text-2xl text-center">cesis</p>
                            <p class="text-dark-2 font-semibold text-2xl text-center">adelfox</p>
                            <p class="text-dark-2 font-semibold text-2xl text-center">rainbow</p>
                            <p class="text-dark-2 font-semibold text-2xl text-center">simbadda</p>
                        </div>
                    </div>
                </div>
            </main>
        </section>
    </body>

</html>
