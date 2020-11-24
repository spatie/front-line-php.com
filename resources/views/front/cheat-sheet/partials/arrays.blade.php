<x-card id="arrays" title="Arrays" class="lg:col-span-2">

    <div class="grid lg:grid-cols-2 gap-6">
        <x-card id="destructuring" title="Destructuring" level="2" php="7.1">
            You can destructure arrays to pull out several elements into separate variables:

<pre><code class="language- hljs ">$array = [1, 2, 3];

// Using the list syntax:
<span class="hljs-highlight  keyword">list</span>($a, $b, $c) = $array;

// Or the shorthand syntax:
[$a, $b, $c] = $array;</code></pre>

You can skip elements:

<pre><code class="language-php hljs php">[, , $c] = $array;

<span class="hljs-comment">// $c = 3</span></code></pre>

As well as destructure based on keys:

<pre><code class="language-php hljs php">$array = [
    <span class="hljs-string">'a'</span> =&gt; <span class="hljs-number">1</span>,
    <span class="hljs-string">'b'</span> =&gt; <span class="hljs-number">2</span>,
    <span class="hljs-string">'c'</span> =&gt; <span class="hljs-number">3</span>,
];

[<span class="hljs-string">'c'</span> =&gt; $c, <span class="hljs-string">'a'</span> =&gt; $a] = $array;</code></pre>

        </x-card>
        <x-card id="rest-spread-operators" title="Rest and Spread Operators" level="2" php="5.6">
            Arrays can be spread into functions:

<pre><code class="language-php hljs php">$array = [<span class="hljs-number">1</span>, <span class="hljs-number">2</span>];

<span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">foo</span><span class="hljs-params">(<span class="hljs-highlight  type">int</span> $a, <span class="hljs-highlight  type">int</span> $b)</span> </span>{ <span class="hljs-comment">/* … */</span> }

<span class="hljs-highlight  prop">foo</span>(...$array);</code></pre>

Functions can automatically collect the rest of the variables using the same operator:


<pre><code class="language-php hljs php"><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">foo</span><span class="hljs-params">($first, ...$other)</span> </span>{ <span class="hljs-comment">/* … */</span> }

<span class="hljs-highlight  prop">foo</span>(<span class="hljs-string">'a'</span>, <span class="hljs-string">'b'</span>, <span class="hljs-string">'c'</span>, <span class="hljs-string">'d'</span>, …);</code></pre>

Rest parameters can even be type hinted:

<pre><code class="language-php hljs php"><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">foo</span><span class="hljs-params">($first, <span class="hljs-highlight  type">string</span> ...$other)</span> </span>{ <span class="hljs-comment">/* … */</span> }

<span class="hljs-highlight  prop">foo</span>(<span class="hljs-string">'a'</span>, <span class="hljs-string">'b'</span>, <span class="hljs-string">'c'</span>, <span class="hljs-string">'d'</span>, …);</code></pre>


            <div class="flex items-center">
                <x-tag class="mr-2">7.4</x-tag> Arrays with numerical keys can also be spread into a new array:
            </div>


            <pre><code class="language-php hljs php">$a = [<span class="hljs-number">1</span>, <span class="hljs-number">2</span>];
$b = [<span class="hljs-number">3</span>, <span class="hljs-number">4</span>];

$result = [...$a, ...$b]; <span class="hljs-comment">// [1, 2, 3, 4]</span></code></pre>
        </x-card>
    </div>
</x-card>
