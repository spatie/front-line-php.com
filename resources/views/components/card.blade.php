<div id="{{ $attributes['id'] }}" class="{{ $attributes['class'] }} {{ $attributes['level'] == 2 ? 'bg-blue-300 bg-opacity-20' : 'bg-blue-200 bg-opacity-50' }} p-6 target:shadow-xl target:bg-yellow-100">
    <h{{ $attributes['level'] == 2 ? '3' : '2' }} class="marker-target">
        <a href="#{{ $attributes['id'] }}" 
            class="markup-anchor">#
        </a> 
        {{ $attributes['title'] }}
    </h{{ $attributes['level'] == 2 ? '3' : '2' }}>
 
    {{ $slot}}
</div>