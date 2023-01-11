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
            <div class="bg-white overflow-hidden min-h-screen sm:rounded-lg">
                <div class="p-4 sm:p-6 bg-white">
                    <h1
                        class="mt-10 sm:mt-0 mb-2 text-4xl font-bold text-gray-800 underline capitalize decoration-sky-500 ">
                        Edit Guestbook
                    </h1>
                    @auth
                    <x-splade-form :default="$guestbook" action="{{ route('guestbook.update', $guestbook) }}"
                        method="PATCH" class="mt-5 space-y-4">
                        <x-splade-textarea id="message" type="text" name="message" :label="__('Message')" required
                            autofocus />
                        <x-splade-submit class="" :label="__('Save')" />
                    </x-splade-form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
