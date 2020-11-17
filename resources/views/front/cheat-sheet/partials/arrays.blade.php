<x-card id="arrays" title="Arrays" class="col-span-2">

    <div class="grid grid-cols-2 gap-6">
        <x-card id="destructuring" title="Destructuring" level="2">
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
        </x-card>
        <x-card id="rest-spread-operators" title="Rest and Spread Operators" level="2">
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
        </x-card>
    </div>
</x-card>
