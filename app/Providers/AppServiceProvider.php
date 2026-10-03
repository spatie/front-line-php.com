<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Model::unguard();

        Blade::directive('markdown', function () {
            return "<?php echo (new \League\CommonMark\CommonMarkConverter())->convertToHtml(<<<HEREDOC";
        });

        Blade::directive('endmarkdown', function () {
            return 'HEREDOC); ?>';
        });
    }
}
