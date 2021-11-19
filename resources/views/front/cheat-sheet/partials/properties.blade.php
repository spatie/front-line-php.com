<x-card id="properties" title="Properties" class="lg:col-span-2">

    <div class="grid lg:grid-cols-2 gap-6">

        <x-card id="property-promotion" title="Property Promotion" class="lg:row-span-3" php="8.0">
            <p>Prefix constructor arguments with <code><span class="hljs-highlight  keyword">public</span></code>,
                <code><span class="hljs-highlight  keyword">protected</span></code> or <code><span
                        class="hljs-highlight  keyword">private</span></code> to make them promoted:</p>

            <pre><code class="language-php hljs php"><span class="hljs-class"><span
                            class="hljs-keyword">class</span> <span class="hljs-title">CustomerDTO</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span
                            class="hljs-keyword">function</span> <span class="hljs-title">__construct</span><span
                            class="hljs-params">(
        <span class="hljs-highlight  keyword">public</span> <span class="hljs-highlight  type">string</span> <span
                                class="hljs-highlight  prop">$name</span>,
        <span class="hljs-highlight  keyword">public</span> <span class="hljs-highlight  type">string</span> <span
                                class="hljs-highlight  prop">$email</span>,
        <span class="hljs-highlight  keyword">public</span> <span class="hljs-highlight  type">DateTimeImmutable</span> <span
                                class="hljs-highlight  prop">$birth_date</span>,
    )</span> </span>{}
}</code></pre>

            <p>You can still add a constructor body, and combine both promoted and non-promoted properties:</p>

            <pre><code class="language-php hljs php"><span class="hljs-class"><span
                            class="hljs-keyword">class</span> <span class="hljs-title">MyClass</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-highlight  type">string</span> <span
                        class="hljs-highlight  prop">$b</span>;

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span
                            class="hljs-keyword">function</span> <span class="hljs-title">__construct</span><span
                            class="hljs-params">(
        <span class="hljs-highlight  keyword">public</span> <span class="hljs-highlight  type">string</span> <span
                                class="hljs-highlight  prop">$a</span>,
        <span class="hljs-highlight  type">string</span> $b,
    )</span> </span>{
        <span class="hljs-highlight  prop">assert</span>(<span class="hljs-keyword">$this</span>-&gt;<span
                        class="hljs-highlight  prop">a</span> !== <span class="hljs-string">'foo'</span>);

        <span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">b</span> = $b;
    }
}</code></pre>
        </x-card>
        <x-card id="read-only properties" title="Read only properties" class="lg:row-span-3" php="8.1">

            Properties can be marked readonly.
            <pre><code class="language-php hljs php"><span
                        class="hljs-keyword">class</span> Offer
 {
     public <span class="hljs-highlight  keyword">readonly</span> <span class="hljs-keyword type">?string</span> <span prop>$offerNumber</span> = null;
     public <span class="hljs-highlight  keyword">readonly</span> <span class="hljs-highlight  type">Money</span> <span class="hljs-highlight  prop">$totalPrice</span>;
                </code></pre>

            Once a readonly property is set, it cannot change ever again.
        </x-card>

    </div>
</x-card>
