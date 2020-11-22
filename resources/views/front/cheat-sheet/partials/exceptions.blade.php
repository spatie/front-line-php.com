<x-card id="exceptions" title="Exceptions">
    <p>Throwing an exception is an expression now, which means there are more places you can throw from, such as short closures or as a null coalescing fallback:</p>

<pre><code class="language-php hljs php">$error = <span class="hljs-highlight  keyword">fn</span>($message) =&gt; <span class="hljs-keyword">throw</span> <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">Error</span>($message);

$input = $data[<span class="hljs-string">'input'</span>] ?? <span class="hljs-keyword">throw</span> <span class="hljs-keyword">new</span> <span class="hljs-highlight  type"><span class="hljs-keyword">Exception</span></span>(<span class="hljs-string">'Input not set'</span>);</code></pre>

    <p>You also don't have to catch an exception with a variable anymore:</p>

<pre><code class="language-php hljs php"><span class="hljs-keyword">try</span> {
    <span class="hljs-comment">// …</span>
} <span class="hljs-keyword">catch</span> (<span class="hljs-highlight  type">SpecificException</span>) {
    <span class="hljs-keyword">throw</span> <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">OtherException</span>();
}</code></pre>
</x-card>
