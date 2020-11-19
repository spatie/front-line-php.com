<x-card id="named-arguments" title="Named Arguments">
    <p>Pass in arguments by name instead of their position:</p>

    <pre><code class="language-php hljs php"><span class="hljs-highlight  prop">setcookie</span>(
    <span class="hljs-highlight  prop">name</span>: <span class="hljs-string">'test'</span>,
    <span class="hljs-highlight  prop">expires</span>: <span class="hljs-highlight  prop">time</span>() + <span class="hljs-number">60</span> * <span class="hljs-number">60</span> * <span class="hljs-number">2</span>,
);</code></pre>

    <p>Named arguments also support array spreading:</p>

    <pre><code class="language-php hljs php">$data = [
    <span class="hljs-string">'name'</span> =&gt; <span class="hljs-string">'test'</span>,
    <span class="hljs-string">'expires'</span> =&gt; <span class="hljs-highlight  prop">time</span>() + <span class="hljs-number">60</span> * <span class="hljs-number">60</span> * <span class="hljs-number">2</span>,
];

<span class="hljs-highlight  prop">setcookie</span>(...$data);</code></pre>
</x-card>
