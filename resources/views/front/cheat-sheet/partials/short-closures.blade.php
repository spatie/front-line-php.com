<x-card id="short-closures" title="Short Closures" class="lg:row-span-2">
    <p>Short closures have automatic access to the outer scope, and only allow a single expression which is automatically returned:</p>

    <pre><code class="language-php hljs php"><span class="hljs-highlight  prop">array_map</span>(
    <span class="hljs-highlight  keyword">fn</span>($x) =&gt; $x * <span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">modifier</span>,
    $numbers
);</code></pre>
</x-card>
