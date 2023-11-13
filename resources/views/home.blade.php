<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AlpineJS CDN -->
    <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link
            rel="preconnect"
            href="https://fonts.googleapis.com"/>
    <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
            rel="stylesheet"/>

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
<header>
    <!-- Navigation -->
    <nav
            x-data="{ mobileMenuOpen: false, userMenuOpen: false }"
            class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="flex flex-shrink-0 items-center">
                        <a href="/">
                            <h2 class="font-bold text-2xl">Barta</h2>
                        </a>
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <!-- Profile dropdown -->
                    <div
                            class="relative ml-3"
                            x-data="{ open: false }">
                        <div>
                            <button
                                    @click="open = !open"
                                    type="button"
                                    class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                                    id="user-menu-button"
                                    aria-expanded="false"
                                    aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img
                                        class="h-8 w-8 rounded-full"
                                        src="https://avatars.githubusercontent.com/u/831997"
                                        alt="Ahmed Shamim Hasan Shaon"/>
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div
                                x-show="open"
                                @click.away="open = false"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="user-menu-button"
                                tabindex="-1">
                            <a
                                    href="./profile.html"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-0"
                            >Your Profile</a
                            >
                            <a
                                    href="./edit-profile.html"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-1"
                            >Edit Profile</a
                            >
                            <a
                                    href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-2"
                            >Sign out</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="container max-w-xl mx-auto">
    <div style="padding: 200px 0">
        <h2 class="text-center font-bold text-2xl">Welcome to Barta App</h2>
    </div>
</main>

<footer class="shadow bg-black mt-10">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <span class="block text-sm sm:text-center text-gray-200">
            © 2023 <a href="https://github.com/alnahian2003" class="hover:underline" >Barta</a >. All Rights Reserved.
        </span>
    </div>
</footer>
</body>
</html>
