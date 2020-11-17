<div id="{{ $attributes['id'] }}" class="{{ $attributes['class'] }} {{ $attributes['level'] == 2 ? 'bg-blue-300 bg-opacity-25' : 'bg-blue-200 bg-opacity-25' }} p-6 target:shadow-xl target:bg-blue-200 target:bg-opacity-75">
    <h{{ $attributes['level'] == 2 ? '3' : '2' }}>
        <a href="#{{ $attributes['id'] }}" class="markup-anchor">#</a> 
        {{ $attributes['title'] }}
    </h{{ $attributes['level'] == 2 ? '3' : '2' }}>
 
    {{ $slot}}
</div>