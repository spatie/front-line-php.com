<x-card id="enums" title="Enums" class="lg:col-span-2">

    <div class="grid lg:grid-cols-2 gap-6">
        <x-card id="declaring-enums" title="Enums" level="2" php="8.1">
            Enums are built-in in the language:

            <pre><code class="language-php hljs php"><hljs keyword>enum</hljs> <hljs type>Status</hljs>
 {
     case <hljs prop>DRAFT</hljs>;
     case <hljs prop>PUBLISHED</hljs>;
     case <hljs prop>ARCHIVED</hljs>;
 }</code></pre>

        </x-card>

        <x-card id="enums-methods" title="Enums methods" level="2" php="8.1">
            Enums can have methods, as well as have a string or integer value per case:

            <pre><code class="language-php hljs php"><hljs keyword>enum</hljs> <hljs type>Status</hljs>: <hljs type>int</hljs>
 {
     case <hljs prop>DRAFT</hljs> = 1;
     case <hljs prop>PUBLISHED</hljs> = 2;
     case <hljs prop>ARCHIVED</hljs> = 3;

     public function color(): string
     {
         return <hljs keyword>match</hljs>($this)
         {
             <hljs type>Status</hljs>::<hljs prop>DRAFT</hljs> => 'grey',
             <hljs type>Status</hljs>::<hljs prop>PUBLISHED</hljs> => 'green',
             <hljs type>Status</hljs>::<hljs prop>ARCHIVED</hljs> => 'red',
         };
     }
 }</code></pre>

        </x-card>
    </div>
</x-card>
