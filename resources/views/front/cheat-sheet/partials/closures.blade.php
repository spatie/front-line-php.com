<x-card id="closures" title="Closures" class="lg:col-span-2">

    <div class="grid lg:grid-cols-2 gap-6">

<x-card id="short-closures" title="Short Closures" class="lg:row-span-2" php="7.4">
    <p>Short closures have automatic access to the outer scope, and only allow a single expression which is automatically returned:</p>

    <pre><code class="language-php hljs php"><span class="hljs-highlight  prop">array_map</span>(
    <span class="hljs-highlight  keyword">fn</span>($x) =&gt; $x * <span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">modifier</span>,
    $numbers
);</code></pre>
</x-card>

        <x-card id="first-class-callables" title="First class callables" class="lg:row-span-2" php="8.1">
            <p>You can now make a closure from a callable by calling that callable and passing it '...' as its argument</p>

            <pre><code class="language-php hljs php">function foo(<span class="hljs-highlight type">int</span> $a, <span class="hljs-highlight type">int</span> $b) { /* … */ }
 $foo = <span class="hljs-highlight prop">foo</span>(...);
 $foo(<span class="hljs-highlight prop">a:</span> 1, <span class="hljs-highlight prop">b:</span> 2);</code></pre>
        </x-card>
    </div>
</x-card>
