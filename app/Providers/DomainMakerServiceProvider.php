<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\DomainMakeCommand;
use App\Console\Commands\DomainJobMakeCommand;
use App\Console\Commands\DomainEnumMakeCommand;
use App\Console\Commands\DomainModelMakeCommand;
use App\Console\Commands\DomainRouteMakeCommand;
use App\Console\Commands\DomainFactoryMakeCommand;
use App\Console\Commands\DomainRequestMakeCommand;
use App\Console\Commands\DomainServiceMakeCommand;
use App\Console\Commands\DomainResourceMakeCommand;
use App\Console\Commands\DomainExceptionMakeCommand;
use App\Console\Commands\DomainControllerMakeCommand;
use App\Console\Commands\DomainMigrateCommand;
use App\Console\Commands\DomainRepositoryMakeCommand;

class DomainMakerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DomainMakeCommand::class,
                DomainControllerMakeCommand::class,
                DomainRouteMakeCommand::class,
                DomainModelMakeCommand::class,
                DomainFactoryMakeCommand::class,
                DomainRequestMakeCommand::class,
                DomainJobMakeCommand::class,
                DomainResourceMakeCommand::class,
                DomainExceptionMakeCommand::class,
                DomainServiceMakeCommand::class,
                DomainRepositoryMakeCommand::class,
                DomainEnumMakeCommand::class,
            ]);
        }

    }
}
