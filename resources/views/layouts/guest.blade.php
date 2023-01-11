<div class="min-h-screen bg-gray-100">
    @if (Route::currentRouteName() == 'home' && Auth::check()===false)
    <div class="hidden text-gray-500 bg-gray-50  md:block">
        <div class="flex flex-col items-center justify-center max-w-3xl p-3 mx-auto text-sm" role="alert">
            <p class="text-center">If you're a first-time visitor to my website, I invite you to leave your mark by
                signing my <Link href="{{ route("guestbook.index") }}"
                    class="text-orange-400 dark:text-orange-500">guestbook</Link>.
            <p>I appreciate your feedback and thoughts,
                and hope that you enjoy your visit to my
                website.</p>
            </p>
        </div>
    </div>
    @endif
    @include('layouts.guest-navigation')

    <!-- Page Heading -->
    {{-- <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header> --}}

    <!-- Page Content -->
    <main class="sm:pb-5">
        {{ $slot }}
        @include('layouts.guest-footer')
    </main>
</div>
