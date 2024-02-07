<!doctype html>

<title>Friends Book</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.jpg" alt="friend book Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="min-w-12 text-sm font-bold uppercase text-green-500 flex items-center">
                                <span>Welcome, {{auth()->user()->name}}</span>
                                <svg class="transform -rotate-90 pointer-events-none" style="right: 12px;" width="22"
                                    height="22" viewBox="0 0 22 22">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path fill="#00cc00"
                                            d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                    </g>
                                </svg>
                            </button>
                        </x-slot>
                        @admin
                            <p class="mx-2 hover:bg-blue-500 pl-4 min-w-12 ">
                                <a href="/admin/posts" >All Posts</a><br>
                            </p>
                            <p class="mx-2 hover:bg-blue-500 px-2">
                                <a href="/admin/posts/create" class="ml-2">New Post</a> <br>
                            </p>
                        @endadmin

                        <p class="mx-2 hover:bg-blue-500 px-2">
                            <a href="#" class="ml-2" x-data="{}" @click.prevent="document.querySelector('#out').submit()">Log Out</a>
                        </p>
                        <form action="/logout" id="out" method="post" class="text-xs font-semibold text-blue-500 ml-6">
                            @csrf
                        </form>
                    </x-dropdown>

                    @else
                    <a href="/register" class="text-xs font-bold uppercase mr-6">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase">Login</a>
                @endauth

                <a href="#newsletter" class="bg-yellow-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        @yield('content')

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/person.jpg" alt="" class="mx-auto  rounded-xl" height="60" width="100">
            <h5 class="text-3xl text-green-600">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3 text-green-500">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center relative">

                                <label for="email" class="hidden lg:inline-block">
                                    <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                                </label>

                                <input id="email" type="text" name="email" placeholder="Your email address"
                                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">


                                @error('email')
                                    <span class="text-xs text-red-500 absolute bottom-0 top-12 left-0 mb-2 ml-4">{{$message}}</span>
                                @enderror

                         </div>
                        <button type="submit"
                                class="transition-colors duration-300 bg-green-500 hover:bg-green-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    @if (session()->has('success'))
        <div x-data="{show:true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bg-green-400 py-2 px-4 rounded-xl bottom-3 right-3 text-sm text-white flex justify-end">
            <p>{{session('success')}}</p>
        </div>
    @endif

</body>
