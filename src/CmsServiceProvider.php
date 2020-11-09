<?php
namespace Nextbyte\Cms;
use \Illuminate\Support\ServiceProvider;
class CmsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views/cms', 'cms');


        $this->loadRoutesFrom(__DIR__.'/routes/Cms/dashboard.php');
        $this->loadRoutesFrom(__DIR__.'/routes/Cms/blog.php');
        $this->loadRoutesFrom(__DIR__.'/routes/Cms/category.php');
        $this->loadRoutesFrom(__DIR__.'/routes/Cms/faq.php');
        $this->loadRoutesFrom(__DIR__.'/routes/Cms/client.php');
        $this->loadRoutesFrom(__DIR__.'/routes/Cms/testimonial.php');
//        $this->loadViewsFrom(__DIR__.'/views','cms');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');


    }

    public function register()
    {
        //publish from package to laravel project
        $this->publishes([
            __DIR__.'/Http/Controllers' => resource_path('Controllers'),
            __DIR__.'/Models' => resource_path('Models'),
            __DIR__.'/routes' => resource_path('routes'),
            __DIR__.'/views' => resource_path('views/vendor')
        ]);

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/assets/cms' => public_path('public'),
        ], 'public');
    }
}
