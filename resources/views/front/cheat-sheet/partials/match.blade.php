<x-card id="match-expression" title="Match">
    <p>Similar to <code><span class="hljs-highlight  keyword">switch</span></code>, but with strong type checks, no
        <code><span class="hljs-highlight  keyword">break</span></code> keyword, combined arms and it returns a value:
    </p>

    <pre><code class="language-php hljs php">$message = <span class="hljs-highlight  keyword">match</span> ($statusCode) {
    <span class="hljs-number">200</span>, <span class="hljs-number">300</span> =&gt; <span class="hljs-keyword">null</span>,
    <span class="hljs-number">400</span> =&gt; <span class="hljs-string">'not found'</span>,
    <span class="hljs-number">500</span> =&gt; <span class="hljs-string">'server error'</span>,
    <span class="hljs-keyword">default</span> =&gt; <span class="hljs-string">'unknown status code'</span>,
};</code></pre>
</x-card>
