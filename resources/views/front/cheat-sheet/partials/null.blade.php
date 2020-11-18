<x-card id="dealing-with-null" title="Dealing with null" class="col-span-2">
    <div class="grid grid-cols-2 items-start gap-6">
        <x-card id="null-coalescing-operator" title="Null Coalescing" level="2">
            <p>Use the null coalescing operator to provide a fallback when a property is <code>null</code>:</p>

            <pre><code class="language-php hljs php">$paymentDate = $invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span> ?? <span class="hljs-highlight  type">Date</span>::<span class="hljs-highlight  prop">now</span>();</code></pre>

            <p>It also works nested:</p>

            <pre><code class="language-php hljs php">$input = $data[<span class="hljs-string">'few'</span>][<span class="hljs-string">'levels'</span>][<span class="hljs-string">'deep'</span>] ?? <span class="hljs-string">'foo'</span>;</code></pre>

            <p>You can use the null coalescing
                <em>assignment</em> operator to write the value into the original variable when it's <code>null</code>:
            </p>

            <pre><code class="language-php hljs php">$temporaryPaymentDate = $invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span> ??= <span class="hljs-highlight  type">Date</span>::<span class="hljs-highlight  prop">now</span>();

<span class="hljs-comment">// $invoice-&gt;paymentDate is now also set</span></code></pre>
        </x-card>

        <x-card id="nullsafe-operator" title="Nullsafe Operator" level="2">
            <p>Chain methods that possibly return <code>null</code>:</p>

            <pre><code class="language-php hljs php">$invoice
    -&gt;<span class="hljs-highlight  prop">getPaymentDate</span>()
    ?-&gt;<span class="hljs-highlight  prop">format</span>(<span class="hljs-string">'Y-m-d'</span>);</code></pre>

            <p>The nullsafe operator can also be chained multiple times:</p>

            <pre><code class="language-php hljs php">$object
    ?-&gt;<span class="hljs-highlight  prop">methodA</span>()
    ?-&gt;<span class="hljs-highlight  prop">methodB</span>()
    ?-&gt;<span class="hljs-highlight  prop">methodC</span>();</code></pre>
        </x-card>
    </div>
</x-card>
