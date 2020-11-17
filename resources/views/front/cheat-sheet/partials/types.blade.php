<x-card id="types" title="Types" class="col-span-2">
@markdown
During the PHP 7.x releases and with PHP 8, several new built-in types were added:

- <code type>void</code>: a return type indicating nothing's returned
- <code type>static</code>: a return type representing the current class or its children
- <code type>object</code>: anything that is an object
- <code type>mixed</code>: anything
@endmarkdown
    <div class="grid grid-cols-2 gap-6">
        <x-card id="typed-properties" title="Typed properties" level="2">
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
        </x-card>

        <x-card id="union-types" title="Union Types" level="2">
            Combine several types into one union, which means that whatever input must match on of the given types:

            ```php
            interface Repository
            {
            public function find(<code type>int|string</code> $id);
            }
            ```
        </x-card>
    </div>
</x-card>
