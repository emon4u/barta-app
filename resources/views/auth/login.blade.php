@extends( 'layout.auth' )
@section('page_title', 'Sign In')
@section('content_title', 'Sign in to your account')

@section('auth_main_content')
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        @if (session('register_success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-5 rounded" role="alert">
                {{ session('register_success') }}
            </div>
        @endif

        @error('login_fail')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-5 rounded" role="alert">
            {{ $message }}
        </div>
        @enderror

        <form
                class="space-y-6"
                action="{{ route('login') }}"
                method="POST">
            @csrf

            <div>
                <label
                        for="email"
                        class="block text-sm font-medium leading-6 text-gray-900"
                >Email address</label
                >
                <div class="mt-2">
                    <input
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            placeholder="bruce@wayne.com"
                            required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label
                            for="password"
                            class="block text-sm font-medium leading-6 text-gray-900"
                    >Password</label
                    >
                    <div class="text-sm">
                        <a
                                href="#"
                                class="font-semibold text-black hover:text-black"
                        >Forgot password?</a
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            placeholder="••••••••"
                            required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
            </div>

            <div>
                <button
                        type="submit"
                        class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Sign in
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Don't have an account yet?
            <a
                    href="./register"
                    class="font-semibold leading-6 text-black hover:text-black"
            >Sign Up</a
            >
        </p>
    </div>
@endsection
