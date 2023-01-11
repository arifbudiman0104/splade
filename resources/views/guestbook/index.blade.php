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
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-4 bg-white sm:p-6">
                    <h1
                        class="mt-10 mb-2 text-4xl font-bold text-gray-800 underline capitalize sm:mt-0 decoration-sky-500 ">
                        Guestbook
                    </h1>
                    {{-- <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Arif Budiman Arrosyid</h1>
                    --}}
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
                        <!-- Email Address -->
                        <x-splade-textarea id="message" type="text" name="message" :label="__('Message')" required
                            autofocus />
                        <x-splade-submit class="" :label="__('Send')" />
                    </x-splade-form>

                    @endauth
                    <div class="mt-4 divide-y-2 divide-white rounded-lg bg-sky-50 ">

                        @forelse ($pinned_guestbooks as $guestbook)
                        <div class="flex p-4 ">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <div>
                                            @if ($guestbook->user_id == Auth::id())
                                            <span class="text-base text-yellow-500">
                                                {{$guestbook->user->name }}
                                            </span>
                                            @else
                                            <span class="text-base text-sky-500">
                                                {{$guestbook->user->name }}
                                            </span>
                                            @endif
                                        </div>
                                        <div>
                                            <small class="text-sm text-gray-400 sm:ml-2">
                                                {{ $guestbook->created_at->diffForHumans() }}
                                            </small>
                                            {{-- @unless ($guestbook->created_at->eq($guestbook->updated_at)) --}}
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
                                            {{-- <form method="POST"
                                                action="{{ route('guestbook.unpin', $guestbook) }}">
                                                @csrf
                                                @method('patch')
                                                <x-dropdown-link :href="route('guestbook.unpin', $guestbook)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Unpin') }}
                                                </x-dropdown-link>
                                            </form> --}}
                                            <form method="POST" action="{{ route('guestbook.unpin', $guestbook) }}">
                                                @csrf
                                                @method('patch')
                                                {{-- <x-dropdown-link :href="route('guestbook.unpin', $guestbook)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Unpin') }}
                                                </x-dropdown-link> --}}
                                                <Link method="patch" href="{{ route('guestbook.unpin', $guestbook) }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-white focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                    {{ __('Unpin') }}
                                                </Link>
                                                {{-- <Link class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-white focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Unpin</Link> --}}
                                                {{-- <x-splade-submit class="" :label="__('Unpin')"/> --}}
                                            </form>
                                            @endif

                                            <x-dropdown-link :href="route('guestbook.edit', $guestbook)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <x-splade-form method="delete" action="{{ route('guestbook.destroy', $guestbook) }}">
                                                <Link method="delete" href="{{ route('guestbook.destroy', $guestbook) }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-white focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                    {{ __('Delete') }}
                                                </Link>
                                            </x-splade-form>
                                        </x-slot>
                                    </x-dropdown>
                                    @endif
                                    @endauth
                                </div>
                                <p class="mt-2 text-gray-600 text-notmal">{{
                                    $guestbook->message }}
                                </p>
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
                        <div class="flex p-4 ">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <div>
                                            @if ($guestbook->user_id == Auth::id())
                                            <span class="text-base text-yellow-500">
                                                {{$guestbook->user->name }}
                                            </span>
                                            @else
                                            <span class="text-base text-sky-500">
                                                {{$guestbook->user->name }}
                                            </span>
                                            @endif
                                        </div>
                                        <div>
                                            <small class="text-sm text-gray-400 sm:ml-2">
                                                {{ $guestbook->created_at->diffForHumans() }}
                                            </small>
                                            {{-- @unless ($guestbook->created_at->eq($guestbook->updated_at)) --}}
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
                                            @if (Auth::user()->is_admin == true)
                                            <form method="POST" action="{{ route('guestbook.pin', $guestbook) }}">
                                                @csrf
                                                @method('patch')
                                                {{-- <x-dropdown-link :href="route('guestbook.pin', $guestbook)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Pin') }}
                                                </x-dropdown-link> --}}
                                                <Link method="patch" href="{{ route('guestbook.pin', $guestbook) }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-white focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                    {{ __('Pin') }}
                                                </Link>
                                            </form>
                                            @endif
                                            <x-dropdown-link :href="route('guestbook.edit', $guestbook)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('guestbook.destroy', $guestbook) }}">
                                                @csrf
                                                @method('delete')
                                                {{-- <x-dropdown-link :href="route('guestbook.destroy', $guestbook)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link> --}}
                                                <Link method="delete" href="{{ route('guestbook.destroy', $guestbook) }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-white focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                    {{ __('Delete') }}
                                                </Link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                    @endif
                                    @endauth
                                </div>
                                <p class="mt-2 text-gray-600 text-notmal">{{
                                    $guestbook->message }}
                                </p>
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
    {{-- <div class="sm:pt-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-4 bg-white sm:p-6">
                    <h1 class="mb-5 text-4xl font-bold text-gray-800 underline capitalize decoration-orange-500 ">
                        Featured Posts
                    </h1>
                    @if ( $featured->count())
                    <h1 class="mt-4 mb-5 text-gray-600 "> {{ $featured->count() }} latest featured posts.</h1>
                    @endif
                    <div class="flex flex-col w-full gap-5 ">
                        @forelse ( $featured as $post)

                        <Link href="{{ route('post', $post->slug) }}"
                            class="w-full p-4 rounded-lg bg-orange-50 hover:bg-orange-100">
                        <div class="flex justify-between ">

                            <h5 class="font-bold tracking-tight text-gray-400 ">
                                {{ $post->category->title }}
                            </h5>
                            <span class="inline-flex items-center text-xs font-medium text-gray-400 ">
                                <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p>{{ $post->published_at->diffForHumans()}}</p>
                            </span>

                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-500 ">
                            {{ $post->title }}
                        </h5>
                        <p class="font-normal text-gray-600 ">
                            {{ $post->excerpt }}
                        </p>
                        </Link>

                        @empty
                        <h1 class="mt-4 text-gray-600">No post found.</h1>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="sm:pt-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, tempore.
                </div>
            </div>
        </div>
    </div> --}}
    @include('layouts.guest-footer')

</x-guest-layout>
