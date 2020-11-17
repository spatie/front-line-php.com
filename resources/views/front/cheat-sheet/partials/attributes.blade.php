<x-card id="attributes" title="Attributes">

    Make your own by tagging a class with `<hljs comment>#[<hljs type>Attribute</hljs>]</hljs>`

```php
#[<hljs type>Attribute</hljs>]
class ListensTo
{
    public <hljs type>string</hljs> <hljs prop>$event</hljs>;

    public function __construct(<hljs type>string</hljs> $event)
    {
        $this-><hljs prop>event</hljs> = $event;
    }
}
```

You can add them to properties, (anonymous) classes, functions, constants, closures, function arguments:

```php
#[
    <hljs type>Route</hljs>(<hljs type>Http</hljs>::<hljs prop>POST</hljs>, '/products/create')
    <hljs type>Autowire</hljs>
<hljs comment>]</hljs>
class ProductsCreateController
{
    public function __invoke() { /* … */ }
}
```

Use reflection to get them, you can pass in optional arguments to `<hljs prop>getAttributes</hljs>` in order to filter the result:

```php
$attributes = $reflectionClass-><hljs prop>getAttributes</hljs>(
    <hljs type>ContainerAttribute</hljs>::class, 
    <hljs type>ReflectionAttribute</hljs>::<hljs prop>IS_INSTANCEOF</hljs>
);
```
   
</x-card>
