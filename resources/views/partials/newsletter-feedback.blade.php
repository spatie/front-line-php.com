<div x-data="{ open: true }" x-show="open">       
    @if(flash()->message)
        <div class="fixed z-50 fix-z top-0 left-0 h-16 w-full flex items-center justify-center py-8 bg-green-500 border-b border-black border-opacity-50 shadow-xl {{ flash()->class }} md:text-xl text-white text-center">
            <img src="/images/footer.jpg" class="absolute top-0 left-0 w-full h-full object-cover opacity-20">
            <span>{{ flash()->message }}</span>

            <button @click="open = false" class="p-4 opacity-50">&times;</button>
        </div>
    @endif
</div>

