<x-guest-layout>
    {{-- <header class="bg-white shadow">
        <div class="max-w-3xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>
    </header> --}}

    <div class="sm:pt-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-4 sm:p-6 bg-white">
                    <h1
                        class="mt-10 sm:mt-0 mb-2 text-4xl font-bold text-gray-800 underline capitalize decoration-sky-500 ">
                        Edit Guestbook
                    </h1>
                    {{-- <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Arif Budiman Arrosyid</h1>
                    --}}
                    {{-- <p class="mt-4 text-gray-600">
                        Hope you enjoy the website, if you have something to say or request, or just say hello, please
                        leave a message.
                        @auth
                        You login as
                        <span class="text-sky-500">
                            {{ Auth::user()->name}}
                        </span>
                        with role
                        @if (Auth::user()->is_admin)
                        <span class="text-sky-500">
                            Admin
                        </span>
                        @else
                        <span class="text-sky-500">User
                        </span>
                        @endif
                        @else
                        You need to
                        <Link href="{{ route('login') }}" class="text-sky-500">login</Link>
                        @if (Route::has('register'))
                        or
                        <Link href="{{ route('register') }}" class="text-sky-500">register</Link>
                        @endif
                        to show the form.
                        @endauth
                    </p> --}}
                    {{-- @auth
                    @else
                    <p class="mt-4 text-red-400 dark:text-red-300">
                        Your information is only used to display your name and message.
                    </p>
                    @endauth --}}
                    @auth
                    <x-splade-form :default="$guestbook" action="{{ route('guestbook.update', $guestbook) }}" method="PATCH" class="mt-5 space-y-4">

                        <!-- Email Address -->
                        <x-splade-textarea id="message" type="text" name="message" :label="__('Message')" required
                            autofocus />
                        <x-splade-submit class="" :label="__('Send')" />
                    </x-splade-form>
                    @endauth


                </div>



            </div>
        </div>
    </div>

    @include('layouts.guest-footer')

</x-guest-layout>
