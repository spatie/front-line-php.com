<x-card id="performance" title="Performance" class="lg:row-span-2">
    <div class="space-y-6">
        <x-card id="jit" title="The JIT" level="2" php="8.0">
            <p>Enable the JIT by specifying a buffer size in your ini settings; you can switch the jit mode between
                <code>function</code> or <code>tracing</code>:</p>

            <pre><code class="language-ini hljs ini"><span class="hljs-highlight  prop">opcache.jit_buffer_size</span>=100M

<span class="hljs-highlight  prop">opcache.jit</span>=function
<span class="hljs-comment">; opcache.jit=tracing</span></code></pre>
        </x-card>

        <x-card id="preloading" title="Preloading" level="2" php="7.4">
            <p>Add <code><span class="hljs-highlight  prop">opcache.preload</span></code> to your ini settings:</p>

            <pre><code class="language-ini hljs ini"><span class="hljs-highlight  prop">opcache.preload</span>=/path&#8203;/to&#8203;/project&#8203;/preload.php</code></pre>

            <p>Every file that's loaded in the preload script will be preloaded into memory until server restart.</p>
        </x-card>
    </div>
</x-card>
