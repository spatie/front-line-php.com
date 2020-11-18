<button class="h-12 inline-flex items-center px-6 font-display text-xl {{ $attributes['primary'] ? 'text-black bg-yellow-500 shadow-md' : 'text-white bg-purple-500' }} text-opacity-90">
    {{ $slot }} <i class="ml-4 {{$attributes['icon']}} text-xs {{ $attributes['primary'] ? 'text-black' : 'text-white' }}"></i>
</button>