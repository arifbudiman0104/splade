@props(['width' => '48'])

@php
switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<x-splade-dropdown {{ $attributes->except('width') }}>
    <x-slot:trigger>
        {{ $trigger }}
    </x-slot:trigger>

    <div class="mt-2 {{ $width }} rounded-md overflow-hidden shadow-md bg-white">
        {{ $content }}
    </div>
</x-splade-dropdown>
