<x-guest-layout>
    {{-- <header class="bg-white shadow">
        <div class="max-w-3xl px-4 py-6 mx-auto sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Home') }}
            </h2>
        </div>
    </header> --}}

    <div class="sm:pt-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="min-h-screen bg-white sm:rounded-lg overflow-hidden">
                <div class="p-4 bg-white sm:p-6">
                    <h1
                        class="mt-10 mb-2 text-4xl font-bold text-gray-800 underline capitalize sm:mt-0 decoration-sky-500 ">
                        Guestbook
                    </h1>
                    <p class="mt-4 text-gray-600">
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
                    </p>
                    @auth
                    @else
                    <p class="mt-4 text-red-400 dark:text-red-300">
                        Your information is only used to display your name and message.
                    </p>
                    @endauth
                    @auth
                    <x-splade-form action="{{ route('guestbook.store') }}" class="mt-5 space-y-4">
                        <x-splade-textarea id="message" maxlength="255"
                            placeholder="Your message here... (max length 255)" type="text" name="message"
                            :label="__('Message')" required rows="4" autofocus />
                        <x-splade-submit :label="__('Send')" />
                    </x-splade-form>
                    @endauth
                    <div class="mt-4 divide-y-2 divide-white rounded-lg bg-sky-50 ">
                        @forelse ($pinned_guestbooks as $guestbook)
                        <div class="flex p-4" x-data="{ showDropdown: false }">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <div>
                                            @if ($guestbook->user_id == Auth::id())
                                            <span class="text-base font-bold text-sky-500">
                                                {{$guestbook->user->name }}
                                            </span>
                                            @else
                                            <span class="text-base font-bold text-gray-500">
                                                {{$guestbook->user->name }}
                                            </span>
                                            @endif
                                        </div>
                                        <div>
                                            <small class="text-sm text-gray-400 sm:ml-2">
                                                {{ $guestbook->created_at->diffForHumans() }}
                                            </small>
                                            @unless ($guestbook->created_at == $guestbook->updated_at)
                                            <small class="text-sm text-gray-400"> &middot; {{
                                                __('edited')
                                                }}</small>
                                            @endunless
                                        </div>
                                    </div>

                                    @auth
                                    @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true)
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            @if (Auth::user()->is_admin)
                                            <x-dropdown-link :href="route('guestbook.unpin', $guestbook)"
                                                method="patch" preserve-scroll>
                                                {{ __('Unpin') }}
                                            </x-dropdown-link>
                                            @endif
                                            <button x-on:click="showDropdown = !showDropdown"
                                                class="flex w-full px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out"
                                                x-text="showDropdown ? 'Cancel Edit' : 'Edit'">
                                            </button>
                                            <x-dropdown-link :href="route('guestbook.destroy', $guestbook)"
                                                method="delete" confirm
                                                confirm="Are you sure want to delete your guestbook?"
                                                confirm-text="{{ $guestbook->message }}" confirm-button="Yes, Delete!"
                                                cancel-button="No, Cancel!" preserve-scroll>
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                    @endif
                                    @endauth
                                </div>
                                <p class="mt-2 text-gray-600 text-notmal">{{
                                    $guestbook->message }}
                                </p>
                                @auth
                                @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true)
                                <div x-cloak x-show="showDropdown">
                                    <x-splade-form :default="$guestbook"
                                        action="{{ route('guestbook.update', $guestbook) }}" method="PATCH"
                                        class="mt-5 space-y-4">

                                        <x-splade-textarea id="message" maxlength="255" type="text" name="message"
                                            :label="__('')" required autofocus rows="4" />
                                        <x-splade-submit class="" :label="__('Save')" :spinner="false" />
                                        <button prevent-default
                                            class="rounded-md shadow-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                                            x-on:click.prevent="showDropdown = !showDropdown">
                                            Cancel
                                        </button>
                                    </x-splade-form>
                                </div>
                                @endif
                                @endauth
                            </div>
                        </div>
                        @empty
                        <div class="flex p-4 ">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <p class="text-base font-normal text-gray-400">
                                            No pinned messages yet.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="mt-4 divide-y-2 divide-white rounded-lg bg-gray-50 ">
                        @forelse ($guestbooks as $guestbook)
                        <div class="flex p-4" x-data="{ showDropdown: false }">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <div>
                                            @if ($guestbook->user_id == Auth::id())
                                            <span class="text-base font-bold text-sky-500">
                                                {{$guestbook->user->name }}
                                            </span>
                                            @else
                                            <span class="text-base font-bold text-gray-500">
                                                {{$guestbook->user->name }}
                                            </span>
                                            @endif
                                        </div>
                                        <div>
                                            <small class="text-sm text-gray-400 sm:ml-2">
                                                {{ $guestbook->created_at->diffForHumans() }}
                                            </small>
                                            @unless ($guestbook->created_at == $guestbook->updated_at)
                                            <small class="text-sm text-gray-400"> &middot; {{
                                                __('edited')
                                                }}</small>
                                            @endunless
                                        </div>
                                    </div>
                                    @auth
                                    @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true)
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            @if (Auth::user()->is_admin)
                                            <x-dropdown-link :href="route('guestbook.pin', $guestbook)" method="patch" preserve-scroll>
                                                {{ __('Pin') }}
                                            </x-dropdown-link>
                                            @endif
                                            @if ($guestbook->user_id == Auth::id() && Auth::user()->is_admin == false)
                                            <x-dropdown-link preserve-scroll>
                                                {{ __('Request Pin (Pending Feature)') }}
                                            </x-dropdown-link>
                                            @endif
                                            <button x-on:click="showDropdown = !showDropdown"
                                                class="flex w-full px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out"
                                                x-text="showDropdown ? 'Cancel Edit' : 'Edit'">
                                            </button>
                                            <x-dropdown-link :href="route('guestbook.destroy', $guestbook)"
                                                method="delete" confirm
                                                confirm="Are you sure want to delete your guestbook?"
                                                confirm-text="{{ $guestbook->message }}" confirm-button="Yes, Delete!"
                                                cancel-button="No, Cancel!" preserve-scroll>
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                    @endif
                                    @endauth
                                </div>
                                <p class="mt-2 text-gray-600 text-notmal">{{
                                    $guestbook->message }}
                                </p>

                                @auth
                                @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true)
                                <div x-cloak x-show="showDropdown">
                                    <x-splade-form :default="$guestbook"
                                        action="{{ route('guestbook.update', $guestbook) }}" method="PATCH"
                                        class="mt-5 space-y-4">

                                        <x-splade-textarea id="message" maxlength="255" type="text" name="message"
                                            :label="__('')" required autofocus rows="4" />
                                        <x-splade-submit class="" :label="__('Save')" :spinner="false"/>
                                        <button prevent-default
                                            class="rounded-md shadow-sm bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                                            x-on:click.prevent="showDropdown = !showDropdown">
                                            Cancel
                                        </button>
                                    </x-splade-form>
                                </div>
                                @endif
                                @endauth
                            </div>
                        </div>
                        @empty
                        <div class="flex p-4 ">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <p class="text-base font-normal text-gray-400">
                                            No messages yet. Be the first to leave a message.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
