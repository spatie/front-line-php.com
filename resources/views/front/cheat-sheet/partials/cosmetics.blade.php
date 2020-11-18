<x-card id="cosmetics" title="Cosmetics" class="col-span-2">
    <div class="grid grid-cols-2 gap-6">
        <x-card id="class-names" title="Class names" level="2">
            <p>As of PHP 8, you can use <code><span class="hljs-keyword">::class</span></code> on objects as well:</p>

<pre><code class="language-php hljs php"><span class="hljs-highlight  type">Order</span><span class="hljs-keyword">::class</span>;

$object<span class="hljs-keyword">::class</span>;</code></pre>
        </x-card>

        <x-card id="format-numeric-values" title="Numeric values" level="2">
            <p>Use the <code>_</code> operator to format numeric values:</p>

<pre><code class="language-php hljs php">$price = <span class="hljs-number">100</span>_00; <span class="hljs-comment">// $100 and 10 cents</span></code></pre>
        </x-card>

        <x-card id="trailing-commas" title="Trailing commas" level="2">
            <p>Trailing commas are allowed in several places:</p>

            <ul>
                <li>Arrays</li>
                <li>Function calls</li>
                <li>Function definitions</li>
                <li>Closure <code>use</code> statements</li>
            </ul>
        </x-card>
    </div>
</x-card>
