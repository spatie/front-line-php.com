@extends('front.layouts.article')

@section('title', 'Object Oriented Done Right')

@section('description', 'Object Oriented Done Right — Building modern applications with PHP 8')

@section('cta_description')
You've just read part of our upcoming book called <a href="https://front-line-php.com">Front Line PHP</a>, it'll arrive by the end of this year and be the best way to learn modern day PHP and PHP 8.
<br><br>
Interested? You can leave your email address here, and we'll notify you when it's done.
@endsection

@section('article')

<div class="text-lg">
    <p>Alan Kay, the inventor of the term “object-oriented programming”, told a story once during a talk more than 20 years ago. You can build a dog house using only a hammer, nails, planks, and just a little bit of skill. I figure even I would be able to build it given enough time. Once you've built it you've earned the skills and know-how, and could apply it to other projects. Next, you want to build a cathedral, using the same approach with your hammer, nails, and planks. It's a 100 times larger, but you've done this before — right? It'll only take a little longer.</p>

    <p>While the scale went up by a factor of 100, its mass went up by a factor of 1.000.000 and its strength only by 10.000. Inevitably, the building will collapse. Some people plaster over the rubble, make it into a pyramid and say it was the plan all along; but you and I know what really went on.</p>

    <p>Alan used this metaphor to explain a critical problem he saw with “modern OOP” 20 years ago. I think it still holds today: we've taken the solution to a problem — OO code — we've scaled it by a factor of 100, and expected it to work the same way. Today still, we don't think enough about architecture — which is rather crucial if you're building a cathedral — we use the OO solutions we learned without any extra thought. Most of us learned OO in isolation with small examples, and rarely at scale. In most real life projects, you cannot simply apply the patterns you've learned and expect everything to fall into place the same way it did with Animals, Cats, and Dogs.</p>
    <p>This reckless scaling of OO code is what cause many people to voice their disapproval of it in recent years. Personally I believe OOP is as good a tool as any other — functional programming being the modern-day popular contestant — <em>if</em> used correctly.</p>
    <p>My takeaway from Alan's vision is that each object is a little program on its own, with its own internal state. Objects send messages between each other — packages of immutable data — which other objects can interpret and react to. You can't write all code this way, and that's fine — it's fine to not blindly follow these rules.
        Still, I have experienced the positive impact of this mindset first hand. Thinking of objects as little standalone programs, I started writing parts of my code in a different style. I hope that, now that we're going to look at OOP, you'll keep Alan's ideas in mind. Don't blindly apply patterns and principles. Try to look at what you're building as a whole.</p>
    <h2 id="the-pitfall-of-inheritance"><a href="#the-pitfall-of-inheritance" class="markup-anchor">#</a> The pitfall of inheritance</h2>
    <p>I found it difficult to believe at first, but classes and inheritance have nothing to do with OOP the way Alan envisioned it. That doesn't mean they are bad things per se, but it <em>is</em> good to think about their purpose and how we can use, as well as abuse them.
        Alan's vision only described objects — it didn't describe how those objects were created. Classes were added later as a convenient way to manage objects, but they are only an implementation detail, not the core idea of OOP. With classes came inheritance, another a useful tool when used correctly. That hasn't been the case though: the problem Alan tried to address 20 years ago still exists today.</p>
    <p>One of the acclaimed strengths of OOP is that it models our code in ways humans think about the world. In reality though, we rarely think in terms of abstractions and inheritance. Instead of using inheritance in places where it actually makes sense, we've been abusing it as a way to share code, and to configure objects in an obscure way.
        I'm going to show you a great example that illustrates this problem, though I want to say up front that it isn't my own: it's Sandi Metz's, a great teacher on the subject of OOP. Let's take a look.</p>
    <p>There's a children's nursery rhyme called “The House That Jack Built” (it's also a horror movie but that's unrelated).
        It starts like this:</p>
    <pre><code class="language- hljs ">This is the house that Jack built.</code></pre>
    <p>Every iteration there's a sentence added to it:</p>
    <pre><code class="language- hljs ">This is the malt that lay in
        the house that Jack built.</code></pre>
    <p>And next:</p>
    <pre><code class="language- hljs ">This is the rat that ate
        the malt that lay in
        the house that Jack built.</code></pre>
    <p>Get it? This is the final poem:</p>
    <pre><code class="language- hljs ">This is the horse and the hound and the horn that belonged to
        the farmer sowing his corn that kept
        the rooster that crowed in the morn that woke
        the priest all shaven and shorn that married
        the man all tattered and torn that kissed
        the maiden all forlorn that milked
        the cow with the crumpled horn that tossed
        the dog that worried
        the cat that killed
        the rat that ate
        the malt that lay in
        the house that Jack built.</code></pre>
    <p>Let's code this together, I'll be using PHP. We're going to make a program that you can ask a given iteration, and it will produce the poem up until that point. Let's do it in an OO way. We start by adding all parts into a data array within a class; let's call that class <code><span class="hljs-highlight  type">PoemGenerator</span></code> — sounds very OO, right? Good.</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-keyword">private</span> <span class="hljs-keyword">static</span> <span class="hljs-keyword">array</span> <span class="hljs-highlight  prop">$data</span> = [
        <span class="hljs-string">'the horse and the hound and the horn that belonged to'</span>,
        <span class="hljs-string">'the farmer sowing his corn that kept'</span>,
        <span class="hljs-string">'the rooster that crowed in the morn that woke'</span>,
        <span class="hljs-string">'the priest all shaven and shorn that married'</span>,
        <span class="hljs-string">'the man all tattered and torn that kissed'</span>,
        <span class="hljs-string">'the maiden all forlorn that milked'</span>,
        <span class="hljs-string">'the cow with the crumpled horn that tossed'</span>,
        <span class="hljs-string">'the dog that worried'</span>,
        <span class="hljs-string">'the cat that killed'</span>,
        <span class="hljs-string">'the rat that ate'</span>,
        <span class="hljs-string">'the malt that lay in'</span>,
        <span class="hljs-string">'the house that Jack built'</span>,
    ];
}</code></pre>
    <p>Now let's add two methods <code><span class="hljs-highlight  prop">generate</span></code> and <code><span class="hljs-highlight  prop">phrase</span></code>. <code><span class="hljs-highlight  prop">generate</span></code> will return the end result, and <code><span class="hljs-highlight  prop">phrase</span></code> is an internal function that glues the parts together.</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-comment">// …</span>

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">generate</span><span class="hljs-params">(<span class="hljs-highlight  type">int</span> $number)</span>: <span class="hljs-title">string</span>
    </span>{
        <span class="hljs-keyword">return</span> <span class="hljs-string">"This is {$this-&gt;<span class="hljs-highlight  prop">phrase</span>($number)}."</span>;
    }

    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">phrase</span><span class="hljs-params">(<span class="hljs-highlight  type">int</span> $number)</span>: <span class="hljs-title">string</span>
    </span>{
        $parts = <span class="hljs-highlight  prop">array_slice</span>(<span class="hljs-keyword">self</span>::<span class="hljs-highlight  prop">$data</span>, -$number, $number);

        <span class="hljs-keyword">return</span> <span class="hljs-highlight  prop">implode</span>(<span class="hljs-string">"\n        "</span>, $parts);
    }
}</code></pre>
    <p>It seems like our solution works: we can use <code><span class="hljs-highlight  prop">phrase</span></code> to take x-amount of items from the end of our data array and implode those into one phrase; next we use <code><span class="hljs-highlight  prop">generate</span></code> to wrap the final result with <code>This is</code> and <code>.</code>. By the way, I implode on that spaced delimiter just to format the output a little nicer.</p>
    <pre><code class="language-php hljs php">$generator = <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">PoemGenerator</span>();

$generator-&gt;<span class="hljs-highlight  prop">generate</span>(<span class="hljs-number">4</span>);

<span class="hljs-comment">// This is the cat that killed</span>
<span class="hljs-comment">//         the rat that ate</span>
<span class="hljs-comment">//         the malt that lay in</span>
<span class="hljs-comment">//         the house that Jack built.</span></code></pre>
    <p>Exactly what we'd expect the result to be.</p>
    <hr>
    <p>Then comes along… a new feature request. Let's build a <em>random</em> poem generator: it will randomise the order of the phrases. How do we solve this in a clean way without copying and duplicating code? Inheritance to the rescue — right?
        First let's do a little refactor, let's add a protected <code><span class="hljs-highlight  prop">data</span></code> method, so that we have a little more flexibility in what it actually returns:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">phrase</span><span class="hljs-params">(<span class="hljs-highlight  type">int</span> $number)</span>: <span class="hljs-title">string</span>
    </span>{
        $parts = <span class="hljs-highlight  prop">array_slice</span>(<span class="hljs-highlight  yellow"><span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">data</span>()</span>, -$number, $number);

        <span class="hljs-keyword">return</span> <span class="hljs-highlight  prop">implode</span>(<span class="hljs-string">"\n        "</span>, $parts);
    }

<span class="hljs-highlight  yellow full">    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">data</span><span class="hljs-params">()</span>: <span class="hljs-title">array</span>
    </span>{
        <span class="hljs-keyword">return</span> [
            <span class="hljs-string">'the horse and the hound and the horn that belonged to'</span>,
            <span class="hljs-comment">// …</span>
            <span class="hljs-string">'the house that Jack built'</span>,
        ];
    }</span>}</code></pre>
    <p>Next we build our <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code>:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">RandomPoemGenerator</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">data</span><span class="hljs-params">()</span>: <span class="hljs-title">array</span>
    </span>{
        $data = <span class="hljs-keyword">parent</span>::<span class="hljs-highlight  prop">data</span>();

        <span class="hljs-highlight  prop">shuffle</span>($data);

        <span class="hljs-keyword">return</span> $data;
    }
}</code></pre>
    <p>How great is inheritance! We only needed to override a small part of our code, and everything works just as expected!</p>
    <pre><code class="language-php hljs php">$generator = <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">RandomPoemGenerator</span>();

$generator-&gt;<span class="hljs-highlight  prop">generate</span>(<span class="hljs-number">4</span>);</code></pre>
    <pre><code class="language- hljs ">This is the priest all shaven and shorn that married
        the cow with the crumpled horn that tossed
        the man all tattered and torn that kissed
        the rooster that crowed in the morn that woke.</code></pre>
    <p>Awesome!</p>
    <hr>
    <p>Once again… a new feature request: an echo generator: it repeats every line a second time. So you'd get this:</p>
    <pre><code class="language-php hljs php">This is the malt that lay in the malt that lay in
        the house that Jack built the house that Jack built.</code></pre>
    <p>We can solve this; inheritance — right?</p>
    <p>Let's again do a small refactor in <code><span class="hljs-highlight  type">PoemGenerator</span></code>, just to make sure our code stays clean! Let's extract the array slicing functionality in <code><span class="hljs-highlight  prop">phrase</span></code> to its own method, because that's a better separation of concerns — which we learned is a good thing!</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-comment">// …</span>

    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">phrase</span><span class="hljs-params">(int $number)</span>: <span class="hljs-title">string</span>
    </span>{
        $parts = <span class="hljs-highlight  yellow"><span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">parts</span>($number)</span>;

        <span class="hljs-keyword">return</span> <span class="hljs-highlight  prop">implode</span>(<span class="hljs-string">"\n        "</span>, $parts);
    }

<span class="hljs-highlight  yellow full">    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-highlight  prop"><span class="hljs-title">parts</span></span><span class="hljs-params">(int $number)</span>: <span class="hljs-title">array</span>
    </span>{
        <span class="hljs-keyword">return</span> <span class="hljs-highlight  prop">array_slice</span>(<span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">data</span>(), -$number, $number);
    }</span>}</code></pre>
    <p>Having refactored this, implementing <code><span class="hljs-highlight  type">EchoPoemGenerator</span></code> is again very easy:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">EchoPoemGenerator</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">parts</span><span class="hljs-params">(<span class="hljs-highlight  type">int</span> $number)</span>: <span class="hljs-title">array</span>
    </span>{
        <span class="hljs-keyword">return</span> <span class="hljs-highlight  prop">array_reduce</span>(
            <span class="hljs-keyword">parent</span>::<span class="hljs-highlight  prop">parts</span>($number),
            <span class="hljs-highlight  keyword">fn</span> (<span class="hljs-highlight  type"><span class="hljs-keyword">array</span></span> $output, <span class="hljs-highlight  type">string</span> $line) =&gt; [...$output, <span class="hljs-string">"{$line} {$line}"</span>],
            []
        );
    }
}</code></pre>
    <p>Can we take a moment to appreciate the power of inheritance? We've created two different implementations of our original <code><span class="hljs-highlight  type">PoemGenerator</span></code>, and have <em>only</em> overridden the parts that differ from it in <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code> and <code><span class="hljs-highlight  type">EchoPoemGenerator</span></code>. We've even used SOLID principles to ensure that our code is decoupled so that it's easy to override specific parts. This is what great OOP is about — right?</p>
    <hr>
    <p>One more time… another feature request: please make one more implementation, one that combines both the random and echo behaviour: <code><span class="hljs-highlight  type">RandomEchoPoemGenerator</span></code>.</p>
    <p>Now what? Which class will that one extend?</p>
    <p>If we're extending <code><span class="hljs-highlight  type">PoemGenerator</span></code>, we'll have to override both our <code><span class="hljs-highlight  prop">data</span></code> and <code><span class="hljs-highlight  prop">parts</span></code> methods, essentially copying code from both <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code> and <code><span class="hljs-highlight  type">EchoPoemGenerator</span></code>. That's bad design, copying code around.
        What if we extend <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code>? We'd need to reimplement <code><span class="hljs-highlight  prop">parts</span></code> from <code><span class="hljs-highlight  type">EchoPoemGenerator</span></code>. If we'd implement <code><span class="hljs-highlight  type">EchoPoemGenerator</span></code> instead, it would be the other way around.</p>
    <p>To be honest, extending <code><span class="hljs-highlight  type">PoemGenerator</span></code> and copying both implementations seems like the best solution, since then we're at least making it clear to future programmers that this is a thing on its own, and we weren't able to solve it any other way.</p>
    <p>But let's be honest: whatever solution, it's all crap. We have fallen into the pitfall that is inheritance. And this, dear reader, happens <em>so</em> often in real life projects: we think of inheritance as the perfect solution to override and reuse behaviour, and it always seems to work great at the start. Next comes along a new feature that causes more abstractions, and causes our code to grow out of hand. We thought we mastered inheritance but it kicked our asses instead.</p>
    <p>So what's the problem — the <em>actual</em> problem — with our code? Doesn't it make sense that <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code> extends from <code><span class="hljs-highlight  type">PoemGenerator</span></code>? It <em>is a</em> poem generator, isn't it? That's indeed the way we think of inheritance: using "<em>is a</em>". And yes, <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code> <em>is a</em> <code><span class="hljs-highlight  type">PoemGenerator</span></code>, but <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code> isn't <em>only</em> generating a poem now, is it?</p>
    <p>Sandi Metz suggests the following question to identify the underlying problem: "what changed between the two — what changed during inheritance?". Well… In the case of <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code>, it's the <code><span class="hljs-highlight  prop">data</span></code> method; for <code><span class="hljs-highlight  type">EchoPoemGenerator</span></code>, it's the <code><span class="hljs-highlight  prop">parts</span></code> method. And it just so happens that having to combine those two parts is what made our inheritance solution blow up.</p>
    <p>Do you know what this means? It means that <code><span class="hljs-highlight  prop">parts</span></code> and <code><span class="hljs-highlight  prop">data</span></code> are something on their own. They are <em>more</em> than a protected implementation detail of our poem generator, they are what is valued by the client, they are the <em>essence</em> of our program.</p>
    <p>So let's treat them as such.</p>
    <p>With two separate concerns identified, we need to give them a proper name.
        The first one is about whether lines should be randomised or not. Let's call it the <code><span class="hljs-highlight  type">Orderer</span></code>, it will take an original array, and return a new version of it with its items sorted in a specific way.</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">interface</span> <span class="hljs-title">Orderer</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">order</span><span class="hljs-params">(<span class="hljs-highlight  type">array</span> $data)</span>: <span class="hljs-title">array</span></span>;
}</code></pre>
    <p>The second concern is about formatting the output, whether it should be echoed or not. Let's call this concept a <code><span class="hljs-highlight  type">Formatter</span></code>, its task is to receive the array of lines, and format all of those lines into one string.</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">interface</span> <span class="hljs-title">Formatter</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">format</span><span class="hljs-params">(<span class="hljs-highlight  type">array</span> $lines)</span>: <span class="hljs-title">string</span></span>;
}</code></pre>
    <p>And here comes the magic. We're extracting this logic <em>from</em> our <code><span class="hljs-highlight  type">PoemGenerator</span></code>, but we still need a way to access it from within. So let's <em>inject</em> both an orderer and formatter into the <code><span class="hljs-highlight  type">PoemGenerator</span></code>:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">__construct</span><span class="hljs-params">(
        <span class="hljs-highlight  keyword">public</span> <span class="hljs-highlight  type">Formatter</span> $formatter,
        <span class="hljs-highlight  keyword">public</span> <span class="hljs-highlight  type">Orderer</span> $orderer,
    )</span> </span>{}

    <span class="hljs-comment">// …</span>
}</code></pre>
    <p>With both available, let's change the implementation details of <code><span class="hljs-highlight  prop">phrase</span></code> and <code><span class="hljs-highlight  prop">data</span></code>:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-comment">// …</span>

    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">phrase</span><span class="hljs-params">(int $number)</span>: <span class="hljs-title">string</span>
    </span>{
        $parts = <span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">parts</span>($number);

        <span class="hljs-keyword">return</span> <span class="hljs-highlight  yellow"><span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">formatter</span>-&gt;<span class="hljs-highlight  prop">format</span></span>($parts);
    }

    <span class="hljs-keyword">protected</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">data</span><span class="hljs-params">()</span>: <span class="hljs-title">array</span>
    </span>{
        <span class="hljs-keyword">return</span> <span class="hljs-highlight  yellow"><span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">orderer</span>-&gt;<span class="hljs-highlight  prop">order</span></span>([
            <span class="hljs-string">'the horse and the hound and the horn that belonged to'</span>,
            <span class="hljs-comment">// …</span>
            <span class="hljs-string">'the house that Jack built'</span>,
        ]);
    }
}</code></pre>
    <p>And finally, let's implement <code><span class="hljs-highlight  type">Orderer</span></code>:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">SequentialOrderer</span> <span class="hljs-keyword">implements</span> <span class="hljs-title">Orderer</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">order</span><span class="hljs-params">(<span class="hljs-highlight  type">array</span> $data)</span>: <span class="hljs-title">array</span>
    </span>{
        <span class="hljs-keyword">return</span> $data;
    }
}

<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">RandomOrderer</span> <span class="hljs-keyword">implements</span> <span class="hljs-title">Orderer</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">order</span><span class="hljs-params">(<span class="hljs-highlight  type">array</span> $data)</span>: <span class="hljs-title">array</span>
    </span>{
        <span class="hljs-highlight  prop">shuffle</span>($data);

        <span class="hljs-keyword">return</span> $data;
    }
}</code></pre>
    <p>As well as <code><span class="hljs-highlight  type">Formatter</span></code>:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">DefaultFormatter</span> <span class="hljs-keyword">implements</span> <span class="hljs-title">Formatter</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">format</span><span class="hljs-params">(<span class="hljs-highlight  type">array</span> $lines)</span>: <span class="hljs-title">string</span>
    </span>{
        <span class="hljs-keyword">return</span> <span class="hljs-highlight  prop">implode</span>(<span class="hljs-string">"\n        "</span>, $lines);
    }
}

<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">EchoFormatter</span> <span class="hljs-keyword">implements</span> <span class="hljs-title">Formatter</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">format</span><span class="hljs-params">(<span class="hljs-highlight  type">array</span> $lines)</span>: <span class="hljs-title">string</span>
    </span>{
        $lines = <span class="hljs-highlight  prop">array_reduce</span>(
            $lines,
            <span class="hljs-highlight  keyword">fn</span> (<span class="hljs-highlight  type"><span class="hljs-keyword">array</span></span> $output, <span class="hljs-highlight  type">string</span> $line) =&gt; [...$output, <span class="hljs-string">"{$line} {$line}"</span>],
            []
        );

        <span class="hljs-keyword">return</span> <span class="hljs-highlight  prop">implode</span>(<span class="hljs-string">"\n        "</span>, $lines);
    }
}</code></pre>
    <p>The default implementations, <code><span class="hljs-highlight  type">DefaultFormatter</span></code> and <code><span class="hljs-highlight  type">SequentialOrderer</span></code> might not do any complex operations, though still they are a valid business concern: a "sequential order" and "default format" are two valid cases needed to create the poem as we know it in its normal form.</p>
    <p>Do you realise what just happened? You might be thinking that we're writing more code, but you're forgetting something… we can remove our <code><span class="hljs-highlight  type">RandomPoemGenerator</span></code> and <code><span class="hljs-highlight  type">EchoPoemGenerator</span></code> altogether, we don't need them anymore, we can solve all of our cases, with only the <code><span class="hljs-highlight  type">PoemGenerator</span></code>:</p>
    <pre><code class="language-php hljs php">$generator = <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">PoemGenerator</span>(
    <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">EchoFormatter</span>(),
    <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">RandomOrderer</span>(),
);</code></pre>
    <p>We can make our lives a little more easy still, by providing proper defaults:</p>
    <pre><code class="language-php hljs php"><span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">PoemGenerator</span>
</span>{
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">__construct</span><span class="hljs-params">(
        <span class="hljs-highlight  keyword">public</span> <span class="hljs-highlight  type">?Formatter</span> $formatter = null,
        <span class="hljs-highlight  keyword">public</span> <span class="hljs-highlight  type">?Orderer</span> $orderer = null,
    )</span> </span>{
        <span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">formatter</span> ??= <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">DefaultFormatter</span>();
        <span class="hljs-keyword">$this</span>-&gt;<span class="hljs-highlight  prop">orderer</span> ??= <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">SequentialOrderer</span>();
    }
}</code></pre>
    <p>And using named properties, we can construct a <code><span class="hljs-highlight  type">PoemGenerator</span></code> whatever way we want:</p>
    <pre><code class="language-php hljs php">$generator = <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">PoemGenerator</span>(
    <span class="hljs-highlight  prop">formatter</span>: <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">EchoFormatter</span>(),
);

$generator = <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">PoemGenerator</span>(
    <span class="hljs-highlight  prop">orderer</span>: <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">RandomOrderer</span>(),
);

$generator = <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">PoemGenerator</span>(
    <span class="hljs-highlight  prop">formatter</span>: <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">EchoFormatter</span>(),
    <span class="hljs-highlight  prop">orderer</span>: <span class="hljs-keyword">new</span> <span class="hljs-highlight  type">RandomOrderer</span>(),
);</code></pre>
    <p>No more need for a third abstraction!</p>
    <hr>
    <p>This is <em>real</em> object oriented programming. I told you that OOP isn't about inheritance and this example shows its true power. By composing objects out of other objects, we're able to make a flexible and durable solution, one that solves all of our problems in a clean way. This is what composition over inheritance is about and it's one of the most fundamental pillars in OO.</p>
    <p>I'll admit: I don't <em>always</em> use this approach when I start writing code. It's often easier to start simple during the development process and not think about abstracts or composition. I'd even say it's a great rule to follow: don't abstract too soon. The important lesson isn't that you should always use composition, rather it's about being able to identify the problem when you encounter it, and using the right solution to solve it.</p>
    <h2 id="what-about-traits?"><a href="#what-about-traits?" class="markup-anchor">#</a> What about traits?</h2>
    <p>You might be thinking about traits to solve our poem problem. You could make a <code><span class="hljs-highlight  type">RandomPoemTrait</span></code> and <code><span class="hljs-highlight  type">EchoPoemTrait</span></code>, implementing <code><span class="hljs-highlight  prop">data</span></code> and <code><span class="hljs-highlight  prop">phrase</span></code>.
        Well, using traits wouldn't be a better solution than composition. Why? That question will be answered in-depth in <a href="https://front-line-php.com/">the book</a>, make sure to leave your email address to know when it's available!</p>

</div>

@endsection
