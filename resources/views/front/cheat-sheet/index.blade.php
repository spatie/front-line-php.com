@extends('front.layouts.master')

@section('title', 'PHP 8 Cheat Sheet')

@section('description', 'PHP 8 Cheat Sheet from the book Front Line PHP')

@section('content')
    <header>
        <div class="h-32">
            @include('partials.header')
            <div class="mx-auto max-w-5xl px-4 sm:px-16 h-32 flex items-center">
                <a href="/" class="font-display leading-none text-white text-xl">
                    <span>&larr;</span> Front Line PHP
                </a>
            </div>
        </div>

        <div class="mx-auto max-w-5xl px-4 sm:px-16 py-16">
            <h1 class="font-display text-4xl sm:text-5xl md:text-6xl leading-none">
                 @yield('title')
            </h1>
            <p>
               A to-the-point summary of all awesome PHP features
            </p>
        </div>
    </header>

    <div class="mx-auto max-w-5xl sm:px-16">
        @yield('header_cta')
    </div>

    <main class="mx-auto max-w-5xl px-4 sm:px-16">
        <article class="py-16 markup markup-links markup-lists markup-code markup-tables">
            
            <div class="bg-gray-100 p-6">
<h2 id="types"><a href="#types" class="markup-anchor">#</a> Types</h2>
@markdown
During the PHP 7.x releases and with PHP 8, several new built-in types were added:

- <code type>void</code>: a return type indicating nothing's returned
- <code type>static</code>: a return type representing the current class or its children 
- <code type>object</code>: anything that is an object
- <code type>mixed</code>: anything
@endmarkdown
            </div>

        </article>

        <div>
            @include('partials.cta-newsletter')
        </div>
    </main>

    @include('partials.footer')

@endsection


## Types

During the PHP 7.x releases and with PHP 8, several new built-in types were added:

- <code type>void</code>: a return type indicating nothing's returned
- <code type>static</code>: a return type representing the current class or its children 
- <code type>object</code>: anything that is an object
- <code type>mixed</code>: anything

### Typed properties

Add types to your class properties:

```php
class Offer 
{
    public <code type>?string</code> <code prop>$offerNumber</code> = null;

    public <code type>Money</code> <code prop>$totalPrice</code>;
}
```

Beware of the `uninitialized` state, which is only checked when reading a property, and not when constructing the class:

```php
$offer = new <code type>Offer</code>();

$offer-><code prop>totalPrice</code>; // Error
```

### Union types

Combine several types into one union, which means that whatever input must match on of the given types:

```php
interface Repository 
{
    public function find(<code type>int|string</code> $id);
}
```

---

## Named arguments

Pass in arguments by name instead of their position:

```php
<code prop>setcookie</code>(
    <code prop>name</code>: 'test',
    <code prop>expires</code>: <code prop>time</code>() + 60 * 60 * 2,
);
```

Named arguments also support array spreading:

```php
$data = [
    'name' => 'test',
    'expires' => <code prop>time</code>() + 60 * 60 * 2,
];

<code prop>setcookie</code>(...$data);
```

---

## Attributes

Make your own by tagging a class with <code comment>#[<code type>Attribute</code>]</code>

```php
#[<code type>Attribute</code>]
class ListensTo
{
    public <code type>string</code> <code prop>$event</code>;

    public function __construct(<code type>string</code> $event)
    {
        $this-><code prop>event</code> = $event;
    }
}
```

You can add them to properties, (anonymous) classes, functions, constants, closures, function arguments:

```php
#[
    <code type>Route</code>(<code type>Http</code>::<code prop>POST</code>, '/products/create')
    <code type>Autowire</code>
<code comment>]</code>
class ProductsCreateController
{
    public function __invoke() { /* … */ }
}
```

Use reflection to get them, you can pass in optional arguments to <code prop>getAttributes</code> in order to filter the result:

```php
$attributes = $reflectionClass-><code prop>getAttributes</code>(
    <code type>ContainerAttribute</code>::class, 
    <code type>ReflectionAttribute</code>::<code prop>IS_INSTANCEOF</code>
);
```

---

## Match expression

Similar to <code keyword>switch</code>, but with strong type checks, no <code keyword>break</code> keyword, combined arms and it returns a value:

```php
$message = <code keyword>match</code> ($statusCode) {
    200, 300 => null,
    400 => 'not found',
    500 => 'server error',
    default => 'unknown status code',
};
```

---

## Property promotion

Prefix constructor arguments with <code keyword>public</code>, <code keyword>protected</code> or <code keyword>private</code> to make them promoted:

```php
class CustomerDTO
{
    public function __construct(
        <code keyword>public</code> <code type>string</code> <code prop>$name</code>, 
        <code keyword>public</code> <code type>string</code> <code prop>$email</code>, 
        <code keyword>public</code> <code type>DateTimeImmutable</code> <code prop>$birth_date</code>,
    ) {}
}
```

You can still add a constructor body, and combine both promoted and non-promoted properties:

```php
class MyClass
{
    public <code type>string</code> <code prop>$b</code>;

    public function __construct(
        <code keyword>public</code> <code type>string</code> <code prop>$a</code>,
        <code type>string</code> $b,
    ) {
        <code prop>assert</code>($this-><code prop>a</code> !== 'foo');

        $this-><code prop>b</code> = $b;
    }
}
```

---

## Short Closures

Short closures have automatic access to the outer scope, and only allow a single expression which is automatically returned:

```php
<code prop>array_map</code>(
    <code keyword>fn</code>($x) => $x * $this-><code prop>modifier</code>, 
    $numbers
);
```

---

## Dealing with `null`

Use the null coalescing operator to provide a fallback when a property is `null`:

```php
$paymentDate = $invoice-><code prop>paymentDate</code> ?? <code type>Date</code>::<code prop>now</code>();
```

It also works nested:

```php
$input = $data['few']['levels']['deep'] ?? 'foo';
```

You can use the null coalescing _assignment_ operator to write the value into the original variable when it's `null`:

```php
$temporaryPaymentDate = $invoice-><code prop>paymentDate</code> ??= <code type>Date</code>::<code prop>now</code>();

// $invoice->paymentDate is now also set
```

### Nullsafe operator

Chain methods that possibly return `null`:

```php
$invoice
    -><code prop>getPaymentDate</code>()
    ?-><code prop>format</code>('Y-m-d');
```

The nullsafe operator can also be chained multiple times:

```php
$object
    ?-><code prop>methodA</code>()
    ?-><code prop>methodB</code>()
    ?-><code prop>methodC</code>();
```

---

## Arrays

### Rest- and spread operators

Arrays can be spread into functions:

```php
$array = [1, 2];

function foo(<code type>int</code> $a, <code type>int</code> $b) { /* … */ }

<code prop>foo</code>(...$array);
```

Arrays with numerical keys can also be spread into a new array:

```php
$a = [1, 2];
$b = [3, 4];

$result = [...$a, ...$b]; // [1, 2, 3, 4]
```

Functions can automatically collect the rest of the variables using the same operator:

```php
function foo($first, ...$other) { /* … */ }

<code prop>foo</code>('a', 'b', 'c', 'd', …);
```

Rest parameters can even be type hinted:

```php
function foo($first, <code type>string</code> ...$other) { /* … */ }

<code prop>foo</code>('a', 'b', 'c', 'd', …);
```

### Destructuring

You can destructure arrays to pull out several elements into separate variables:

```
$array = [1, 2, 3]; 

// Using the list syntax:
<code keyword>list</code>($a, $b, $c) = $array;

// Or the shorthand syntax:
[$a, $b, $c] = $array;
```

You can skip elements:

```php
[, , $c] = $array;

// $c = 3
```

As well as destructure based on keys:

```php
$array = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
];

['c' => $c, 'a' => $a] = $array;
```

---

## Cosmetics

### Trailing commas

Trailing commas are allowed in several places:

- Arrays
- Function calls
- Function definitions
- Closure `use` statements

## Format numeric values

Use the `_` operator to format numeric values:

```php
$price = 100_00; // $100 and 10 cents
```

## Class names

As of PHP 8, you can use `::class` on objects as well:

```php
<code type>Order</code>::class;

$object::class;
```

---

## Preloading

Add <code prop>opcache.preload</code> to your ini settings:

```ini
<code prop>opcache.preload</code>=/path/to/project/preload.php
```

Every file that's loaded in the preload script will be preloaded into memory until server restart.

---

## JIT

Enable the JIT by specifying a buffer size in your ini settings; you can switch the jit mode between `function` or `tracing`:

```ini
<code prop>opcache.jit_buffer_size</code>=100M

<code prop>opcache.jit</code>=function
; opcache.jit=tracing
```

---

## Dealing with exceptions

Throwing an exception is an expression now, which means there are more places you can throw from, such a short closures or as a null coalescing fallback:

```php
$error = <code keyword>fn</code>($message) => throw new <code type>Error</code>($message);

$input = $data['input'] ?? throw new <code type>Exception</code>('Input not set');
```

You also don't have to catch an exception with a variable anymore:

```php
try {
    // …
} catch (<code type>SpecificException</code>) {
    throw new <code type>OtherException</code>();
}
```

