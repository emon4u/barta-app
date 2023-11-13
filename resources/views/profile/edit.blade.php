@extends( 'layout.app' )
@section('page_title', 'Edit ' . $user->first_name .' '. $user->last_name . ' Profile')

@section('app_content')
    <form action="{{route('edit-profile')}}" method="POST">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-xl font-semibold leading-7 text-gray-900">
                    Edit Profile
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    This information will be displayed publicly so be careful what you
                    share.
                </p>

                <div class="mt-10 border-b border-gray-900/10 pb-12">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">
                                First Name
                            </label>
                            <div class="mt-2">
                                <input
                                        id="first_name"
                                        name="first_name"
                                        type="text"
                                        autocomplete="first_name"
                                        placeholder="{{$user->first_name}}"
                                        value="{{$user->first_name}}"
                                        required
                                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">
                                Last Name
                            </label>
                            <div class="mt-2">
                                <input
                                        id="last_name"
                                        name="last_name"
                                        type="text"
                                        autocomplete="last_name"
                                        placeholder="{{$user->last_name}}"
                                        value="{{$user->last_name}}"
                                        required
                                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"
                                />
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                                Email address
                            </label>
                            <div class="mt-2">
                                <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        autocomplete="email"
                                        placeholder="{{$user->email}}"
                                        value="{{$user->email}}"
                                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"
                                />
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                                Password
                            </label>
                            <div class="mt-2">
                                <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        autocomplete="password"
                                        placeholder="••••••••"
                                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="bio" class="block text-sm font-medium leading-6 text-gray-900">
                            Bio
                        </label>
                        <div class="mt-2">
                            <textarea id="bio" name="bio" rows="3"
                                      class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"> {{$user->bio}}</textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            Write a few sentences about yourself.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{route('profile')}}" class="text-sm font-semibold leading-6 text-gray-900">
                Cancel
            </a>
            <button type="submit"
                    class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                Save
            </button>
        </div>
    </form>
@endsection