<div id="{{ $attributes['id'] }}" class="{{ $attributes['class'] }} {{ $attributes['level'] == 2 ? 'bg-blue-300 bg-opacity-20' : 'bg-blue-200 bg-opacity-50' }} p-6 target:shadow-xl target:bg-yellow-100">
    <h{{ $attributes['level'] == 2 ? '3' : '2' }} class="marker-target flex items-center">
        <a href="#{{ $attributes['id'] }}"
            class="markup-anchor">#
        </a>

        {{ $attributes['title'] }}

        @if($attributes['php'] ?? null)
            <x-tag class="ml-2">PHP {{ $attributes['php'] }}</x-tag>
        @endif
    </h{{ $attributes['level'] == 2 ? '3' : '2' }}>

    {{ $slot}}
</div>
