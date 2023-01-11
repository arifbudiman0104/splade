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
                        class="mt-10 sm:mt-0 mb-2 text-4xl font-bold text-gray-800 underline capitalize decoration-yellow-500 ">
                        Gear
                    </h1>
                    {{-- <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Arif Budiman Arrosyid</h1>
                    --}}
                    <p class="mt-4 text-gray-500">
                        Hope you enjoy the website, if you have something to say or request, or just say hello, please
                        leave a message.
                    </p>
                    {{-- <h1 class="text-gray-900 font-bold">Student | Web Developer</h1> --}}
                    {{-- <h1 class="mt-4 text-gray-600 ">Hi, my name is Arif, I am a Web Developer,
                        currently
                        studying at Muhammadiyah University of Yogyakarta. Interested in Laravel Web Development and
                        Tailwind CSS.</h1> --}}
                </div>


            </div>
        </div>
    </div>
    {{-- <div class="sm:pt-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-4 sm:p-6 bg-white">
                    <h1 class="mb-5 text-4xl font-bold text-gray-800 underline capitalize decoration-orange-500 ">
                        Featured Posts
                    </h1>
                    @if ( $featured->count())
                    <h1 class="mt-4 mb-5 text-gray-600 "> {{ $featured->count() }} latest featured posts.</h1>
                    @endif
                    <div class="flex flex-col w-full gap-5 ">
                        @forelse ( $featured as $post)

                        <Link href="{{ route('post', $post->slug) }}"
                            class="w-full p-4 bg-orange-50 hover:bg-orange-100 rounded-lg">
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, tempore.
                </div>
            </div>
        </div>
    </div> --}}
    @include('layouts.guest-footer')

</x-guest-layout>
