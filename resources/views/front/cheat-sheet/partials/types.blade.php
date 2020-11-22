<x-card id="types" title="Types" class="lg:col-span-2">

    <div class="grid lg:grid-cols-2 gap-6">
        <x-card id="built-in-types" title="Built-in Types" level="2">
            <p>During the PHP 7.x releases and with PHP 8, several new built-in types were added:</p>

            <ul>
                <li>
                    <code><span class="hljs-highlight  type">void</span></code>: a return type indicating nothing's returned</li>
                <li>
                    <code><span class="hljs-highlight  type">static</span></code>: a return type representing the current class or its children</li>
                <li>
                    <code><span class="hljs-highlight  type">object</span></code>: anything that is an object</li>
                <li>
                    <code><span class="hljs-highlight  type">mixed</span></code>: anything</li>
            </ul>
        </x-card>

        <x-card id="typed-properties" title="Typed properties" level="2" class="row-span-2">
            <p>Add types to your class properties:</p>

            <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">Offer</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-highlight  type">?string</span> <span class="hljs-highlight  prop">$offerNumber</span> = <span class="hljs-keyword">null</span>;

    <span class="hljs-keyword">public</span> <span class="hljs-highlight  type">Money</span> <span class="hljs-highlight  prop">$totalPrice</span>;
}</code></pre>

            <p>Beware of the <code>uninitialized</code> state, which is only checked when reading a property, and not when constructing the class:</p>

            <pre><code class="language-php hljs php">$offer = <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">Offer</span>();

$offer-&gt;<span class="hljs-highlight  prop">totalPrice</span>; <span class="hljs-comment">// Error</span></code></pre>
        </x-card>

        <x-card id="union-types" title="Union Types" level="2">
            <p>Combine several types into one union, which means that whatever input must match one of the given types:</p>

            <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">interface</span> <span class="hljs-title">Repository</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">find</span><span class="hljs-params">(<span class="hljs-highlight  type">int|string</span> $id)</span></span>;
}</code></pre>
        </x-card>
    </div>
</x-card>
