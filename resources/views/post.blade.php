<x-guest-layout>
    {{-- <header class="bg-white shadow">
        <div class="max-w-3xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
        </div>
    </header> --}}
    <div class="sm:pt-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  sm:rounded-lg">
                <div class="p-4 sm:p-6 bg-white">
                    <h1 class="mt-10 sm:mt-0 text-4xl font-bold text-gray-800 underline capitalize @if ($post->is_featured)
                        decoration-orange-500
                        @else
                        decoration-indigo-500
                        @endif ">
                        {{ $post->title }}
                    </h1>
                    <h5 class="mt-2 mb-5 font-bold @if ($post->is_featured)
                        text-orange-500
                        @else
                        text-indigo-500
                        @endif">
                        {{ $post->category->title }}
                    </h5>
                    <span
                        class="mt-2 bg-gray-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 ">
                        {{ $post->published_at->format('d M Y') }}
                    </span>
                    <span
                        class="mt-2 bg-gray-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 ">

                        {{ $post->published_at->diffForHumans() }}
                    </span>
                    {{-- @if ($post->thumbnail)
                    <img src="{{ asset('/storage/thumbnails/'.$post->thumbnail) }}" alt="image"
                        class="object-cover w-full mt-5 rounded-lg">
                    @endif --}}
                    {{-- <img src="{{ asset('/storage/thumbnails/'.$post->thumbnail) }}" alt="image"
                        class="object-cover w-full mt-5 h-96"> --}}
                    <div class="mt-6 overflow-auto prose max-w-none @if ($post->is_featured)
                        prose-orange prose-code:text-orange-400 prose-blockquote:text-orange-400
                        @else
                        prose-indigo prose-code:text-indigo-400 prose-blockquote:text-indigo-400
                        @endif
                        prose-img:rounded-lg">
                        {!! $post->content !!}
                    </div>
                    <h1 class="mb-5 mt-5 text-4xl font-bold text-gray-800 underline capitalize decoration-orange-500 ">
                        Recomendation Posts
                    </h1>
                    {{-- <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Arif Budiman Arrosyid</h1>
                    --}}
                    <div class="flex flex-col w-full gap-5 ">
                        @forelse ( $recomendation as $post)

                        <Link href="{{ route('post', $post->slug) }}" class="w-full p-4 @if ($post->is_featured)
                            bg-orange-50 hover:bg-orange-100
                            @else

                            bg-indigo-50 hover:bg-indigo-100
                            @endif rounded-lg">

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
    </div>
    {{-- <div class="sm:pt-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-4 sm:p-6 bg-white ">


                </div>
            </div>
        </div>
    </div> --}}
    @include('layouts.guest-footer')

</x-guest-layout>
