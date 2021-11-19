<x-card id="enums" title="Enums" class="lg:col-span-2">

    <div class="grid lg:grid-cols-2 gap-6">
        <x-card id="declaring-enums" title="Declaring Enums" level="2" php="8.1">
            Enums are built-in in the language:

            <pre><code class="language-php hljs php"><span class="hljs-highlight keyword">enum</span> <span class="hljs-highlight type">Status</span>
 {
     case <span class="hljs-highlight prop">DRAFT</span>;
     case <span class="hljs-highlight prop">PUBLISHED</span>;
     case <span class="hljs-highlight prop">ARCHIVED</span>;
 }</code></pre>

        </x-card>

        <x-card id="enum-methods" title="Enum methods" level="2" php="8.1">
            Enums can have methods, as well as have a string or integer value per case:

            <pre><code class="language-php hljs php"><span class="hljs-highlight keyword">enum</span> <span class="hljs-highlight type">Status</span>: <span class="hljs-highlight type">int</span>
 {
     case <span class="hljs-highlight prop">DRAFT</span> = 1;
     case <span class="hljs-highlight prop">PUBLISHED</span> = 2;
     case <span class="hljs-highlight prop">ARCHIVED</span> = 3;

     public function color(): string
     {
         return <span class="hljs-highlight keyword">match</span>($this)
         {
             <span class="hljs-highlight type">Status</span>::<span class="hljs-highlight prop">DRAFT</span> => 'grey',
             <span class="hljs-highlight type">Status</span>::<span class="hljs-highlight prop">PUBLISHED</span> => 'green',
             <span class="hljs-highlight type">Status</span>::<span class="hljs-highlight prop">ARCHIVED</span> => 'red',
         };
     }
 }</code></pre>

        </x-card>
    </div>
</x-card>
