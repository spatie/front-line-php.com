<x-card id="attributes" title="Attributes">

    Make your own by tagging a class with <code><span class="hljs-highlight  comment">#[<span class="hljs-highlight  type">Attribute</span>]</span></code>


<pre><code class="language-php hljs php"><span class="hljs-comment">#[<span class="hljs-highlight  type">Attribute</span>]</span>
<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">ListensTo</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-highlight  type">string</span> <span class="hljs-highlight  prop">$event</span>;

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">__construct</span><span class="hljs-params">(<span class="hljs-highlight  type">string</span> $event)</span>
    </span>{
        <span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">event</span> = $event;
    }
}</code></pre>

You can add them to properties, (anonymous) classes, functions, constants, closures, function arguments:

<pre><code class="language-php hljs php"><span class="hljs-comment">#[</span>
    <span class="hljs-highlight  type">Route</span>(<span class="hljs-highlight  type">Http</span>::<span class="hljs-highlight  prop">POST</span>, <span class="hljs-string">'/products/create'</span>)
    <span class="hljs-highlight  type">Autowire</span>
<span class="hljs-highlight  comment">]</span>
<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">ProductsCreateController</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">__invoke</span><span class="hljs-params">()</span> </span>{ <span class="hljs-comment">/* … */</span> }
}</code></pre>

Use reflection to get them, you can pass in optional arguments to `<hljs prop>getAttributes</hljs>` in order to filter the result:

<pre><code class="language-php hljs php">$attributes = $reflectionClass-&gt;<span class="hljs-highlight  prop">getAttributes</span>(
    <span class="hljs-highlight  type">ContainerAttribute</span>::class,
    <span class="hljs-highlight  type">ReflectionAttribute</span>::<span class="hljs-highlight  prop">IS_INSTANCEOF</span>
);</code></pre>

</x-card>
