<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('d-m-Y H:i'); ?>";
        });

        Blade::directive('currency', function ($expression) {
            return "Rp.<?php echo number_format($expression,0,',','.'); ?>,00";
        });
    }
}
