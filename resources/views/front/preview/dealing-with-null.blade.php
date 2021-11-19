@extends('front.layouts.article')

@section('title', 'Dealing with null')

@section('subtitle', 'Taken from Chapter "PHP\'s Type System"')

@section('description', 'Dealing with null — Building modern applications with PHP 8.1')

@section('footer_cta')
    @include('partials.cta-promo')
@endsection

@section('article')

<div class="text-lg">
    <p>Let's discuss <code>null</code> for a moment. Some have called the concept of <code>null</code> a "billion dollar mistake", arguing it allows for a range of edge cases that we have to take into account when writing code. It might seem strange to work in a programming language which doesn't support <code>null</code>, but there are in fact useful patterns to replace it, and get rid of its downsides.</p>
    <p>Let's illustrate those downsides first with an example. Here we have a <code><span class="hljs-highlight  type">Date</span></code> value object with a timestamp variable, format function and static constructor called <code><span class="hljs-highlight  prop">now</span></code>. Why we're not using <code><span class="hljs-highlight  type">DateTime</span></code> will become clear soon.</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">Date</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-highlight  type">int</span> <span class="hljs-highlight  prop">$timestamp</span>;

    <span class="hljs-keyword">public</span> <span class="hljs-keyword">static</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">now</span><span class="hljs-params">()</span>: <span class="hljs-title">self</span> </span>{ <span class="hljs-comment">/* … */</span> }

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">format</span><span class="hljs-params">()</span>: <span class="hljs-title">string</span> </span>{ <span class="hljs-comment">/* … */</span> }

    <span class="hljs-comment">// …</span>
}</code></pre>
    <p>Next we have an invoice with a payment date:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">Invoice</span>
</span>{
    <span class="hljs-keyword">public</span> ?<span class="hljs-highlight  type">Date</span> <span class="hljs-highlight  prop">$paymentDate</span> = <span class="hljs-keyword">null</span>;

    <span class="hljs-comment">// …</span>
}</code></pre>
    <p>The payment date is nullable because invoices can be pending, and hence not yet have a payment date.</p>
    <p>As a side note: take a look at the nullable notation: we've prefixed <code><span class="hljs-highlight  type">Date</span></code> with a question mark, indicating that it can either be <code><span class="hljs-highlight  type">Date</span></code> or <code>null</code>. We've also added a default <code>= null</code> value, to make sure the value is never uninitialized; you know, to prevent all those runtime errors you might encounter.</p>
    <p>Back to our example: what if we want to do something with our payment date's timestamp:</p>
    <pre><code class="language-php hljs php">$invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span>-&gt;<span class="hljs-highlight  prop">timestamp</span>;</code></pre>
    <p>Since we're not sure <code>$invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span></code> is a <code><span class="hljs-highlight  type">Date</span></code> or <code>null</code>, we risk running into runtime errors:</p>
    <pre><code class="language-php hljs php"><span class="hljs-highlight  error full">Trying to get property <span class="hljs-string">'timestamp'</span> of non-object</span></code></pre>
    <p>Before PHP 7.0, you'd use <code>isset</code> to prevent those kinds of errors:</p>
    <pre><code class="language-php hljs php"><span class="hljs-keyword">isset</span>($invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span>)
    ? $invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span>-&gt;<span class="hljs-highlight  prop">timestamp</span>
    : <span class="hljs-keyword">null</span>;</code></pre>
    <p>That's rather verbose though and is why a new operator was introduced: the null coalescing operator.</p>
    <pre><code class="language-php hljs php">$invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span>-&gt;<span class="hljs-highlight  prop">timestamp</span> ?? <span class="hljs-keyword">null</span>;</code></pre>
    <p>This operator will automatically perform an <code><span class="hljs-highlight  keyword">isset</span></code> check on its lefthand operand. If that returns <code>false</code>, it will return the fallback provided by its righthand operand. In this case: the payment date's timestamp or <code>null</code>. A nice addition that reduces the complexity of our code.</p>
    <p>PHP 7.4 added another null coalescing shorthand: the null coalescing assignment operator. This one not only supports the default value fallback, but will also write it directly to the lefthand operand. It looks like this:</p>
    <pre><code class="language-php hljs php">$temporaryPaymentDate = $invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span> ??= <span class="hljs-highlight  type">Date</span>::<span class="hljs-highlight  prop">now</span>();</code></pre>
    <p>So if the payment date is already set, we'll use that one in <code>$temporaryPaymentDate</code>, otherwise we'll use <code><span class="hljs-highlight  type">Date</span>::<span class="hljs-highlight  prop">now</span>()</code> as the fallback for <code>$temporaryPaymentDate</code> and also write it to <code>$invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span></code> immediately.</p>
    <p>A more common use case for the null coalescing assignment operator is a memoization function: a function that stores the result once it's calculated:</p>
    <pre><code class="language-php hljs php"><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-highlight  prop"><span class="hljs-title">match_pattern</span></span><span class="hljs-params">(<span class="hljs-highlight  type">string</span> $input, <span class="hljs-highlight  type">string</span> $pattern)</span> </span>{
    <span class="hljs-keyword">static</span> $cache = [];

    $key = $input . $pattern;

    <span class="hljs-keyword">return</span> $cache[$key] ??= (<span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(<span class="hljs-highlight  type">string</span> $input, <span class="hljs-highlight  type">string</span> $pattern)</span> </span>{
        <span class="hljs-highlight  prop">preg_match</span>($pattern, $input, $matches);

        <span class="hljs-keyword">return</span> $matches[<span class="hljs-number">0</span>];
    })($input, $pattern);
}</code></pre>
    <p>This function will perform a regex match on a string with a pattern, but if the same string and same pattern are provided, it will simply return the cached result. Before we had the null coalescing operator assignment, we'd need to write it like so:</p>
    <pre><code class="language-php hljs php"><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-highlight  prop"><span class="hljs-title">match_pattern</span></span><span class="hljs-params">(<span class="hljs-highlight  type">string</span> $input, <span class="hljs-highlight  type">string</span> $pattern)</span> </span>{
    <span class="hljs-keyword">static</span> $cache = [];

    $key = $input . $pattern;

    <span class="hljs-keyword">if</span> (! <span class="hljs-keyword">isset</span>($cache[$key])) {
        $cache[$key] = (<span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(<span class="hljs-highlight  type">string</span> $input, <span class="hljs-highlight  type">string</span> $pattern)</span> </span>{
            <span class="hljs-highlight  prop">preg_match</span>($pattern, $input, $matches);

            <span class="hljs-keyword">return</span> $matches[<span class="hljs-number">0</span>];
        })($input, $pattern);
    }

    <span class="hljs-keyword">return</span> $cache[$key];
}</code></pre>
    <p>There's one more null-oriented feature in PHP added in PHP 8: the nullsafe operator. Take a look at this example:</p>
    <pre><code class="language-php hljs php">$invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span>-&gt;<span class="hljs-highlight  prop">format</span>();</code></pre>
    <p>What happens if our payment date is <code>null</code>? You'd again get an error:</p>
    <pre><code class="language-txt"><span class="hljs-highlight  error full">Call to a member function format() on null</span></code></pre>
    <p>Your first thought might be to use the null coalescing operator, but that wouldn't work:</p>
    <pre><code class="language-php hljs php">$invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span>-&gt;<span class="hljs-highlight  prop">format</span>(<span class="hljs-string">'Y-m-d'</span>) <span class="hljs-highlight  striped">?? <span class="hljs-keyword">null</span></span>;</code></pre>
    <p>You see, the null coalescing operator doesn't work with method calls on <code>null</code>. So before PHP 8, you'd need to do this:</p>
    <pre><code class="language-php hljs php">$paymentDate = $invoice-&gt;<span class="hljs-highlight  prop">paymentDate</span>;

$paymentDate ? $paymentDate-&gt;<span class="hljs-highlight  prop">format</span>(<span class="hljs-string">'Y-m-d'</span>) : <span class="hljs-keyword">null</span>;</code></pre>
    <p>Fortunately there's the nullsafe operator: it will only perform method calls when possible and otherwise return <code>null</code> instead:</p>
    <pre><code class="language-php hljs php">$invoice-&gt;<span class="hljs-highlight  prop">getPaymentDate</span>()<span class="hljs-highlight  green">?-&gt;</span><span class="hljs-highlight  prop">format</span>(<span class="hljs-string">'Y-m-d'</span>);</code></pre>
    <h2 id="dealing-with-null-—-there's-another-way"><a href="#dealing-with-null-—-there's-another-way" class="markup-anchor">#</a> Dealing with null — there's another way</h2>
    <p>I started this section saying <code>null</code> is called a "billion dollar mistake" but next I showed you three ways PHP is embracing <code>null</code> with fancy syntax. The reality is that <code>null</code> is a frequent occurrence in PHP. It's a good thing we have syntax to deal with it in a sane way. However, it's also good to look at alternatives to using <code>null</code> altogether. One such alternative is the null object pattern.</p>
    <p>Instead of one <code><span class="hljs-highlight  type">Invoice</span></code> class that manages internal state about whether it's paid or not; let's have two classes: <code><span class="hljs-highlight  type">PendingInvoice</span></code> and <code><span class="hljs-highlight  type">PaidInvoice</span></code>. The <code><span class="hljs-highlight  type">PendingInvoice</span></code> implementation looks like this:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PendingInvoice</span> <span class="hljs-keyword">implements</span> <span class="hljs-title">Invoice</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">getPaymentDate</span><span class="hljs-params">()</span>: <span class="hljs-title">UnknownDate</span>
    </span>{
        <span class="hljs-keyword">return</span> <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">UnknownDate</span>();
    }
}</code></pre>
    <p><code><span class="hljs-highlight  type">PaidInvoice</span></code> looks like this:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PaidInvoice</span> <span class="hljs-keyword">implements</span> <span class="hljs-title">Invoice</span>
</span>{
    <span class="hljs-comment">// …</span>

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">getPaymentDate</span><span class="hljs-params">()</span>: <span class="hljs-title">Date</span>
    </span>{
        <span class="hljs-keyword">return</span> <span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">date</span>;
    }
}</code></pre>
    <p>Next, there's an <code><span class="hljs-highlight  type">Invoice</span></code> interface:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">interface</span> <span class="hljs-title">Invoice</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">getPaymentDate</span><span class="hljs-params">()</span>: <span class="hljs-title">Date</span></span>;
}</code></pre>
    <p>Finally, here are the two date classes:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">Date</span>
</span>{
    <span class="hljs-comment">// …</span>
}</code></pre>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">UnknownDate</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Date</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">format</span><span class="hljs-params">()</span>: <span class="hljs-title">string</span>
    </span>{
        <span class="hljs-keyword">return</span> <span class="hljs-string">'/'</span>;
    }
}</code></pre>
    <p>The null object pattern aims to replace <code>null</code> with actual objects; objects that behave differently because they represent the "absence" of the real object. Another benefit of using this pattern is that classes become more representative of the real world: instead of a "date or null", it's a "date or unknown date", instead of an "invoice with a state" it's a "paid invoice or pending invoice". You wouldn't need to worry about <code>null</code> anymore.</p>
    <pre><code class="language-php hljs php">$invoice-&gt;<span class="hljs-highlight  prop">getPaymentDate</span>()-&gt;<span class="hljs-highlight  prop">format</span>(); <span class="hljs-comment">// A date or '/'</span></code></pre>


</div>

@endsection
