<?php
namespace App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
        $this->registerDomainRoutes();
    }
    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
    /** 
     * @Author: Chella 
     * @Date: 2022-08-30 09:56:26 
     * @Desc: Register all domain routes 
     */
    public function registerDomainRoutes()
    {
        if (!file_exists(base_path('app/Domains'))) {
            return;
        };
        $domains = array_diff(scandir(base_path('app/Domains')), array('.', '..'));
        foreach ($domains as $domain) {
            $dirPath = base_path('app/Domains/') . $domain;
            if (!is_dir($dirPath)) {
                continue;
            }
            $dirs = array_diff(scandir(base_path('app/Domains/' . $domain)), array('.', '..'));
            $routesDirExists = in_array('routes', $dirs);
            if (!$routesDirExists) {
                Log::info("$domain Domain missing routes directory. Can't register routes");
                continue;
            }
            $domainRouteFiles = array_diff(scandir(base_path('app/Domains/' . $domain . '/routes')), array('.', '..'));
            foreach ($domainRouteFiles as $file) {
                Route::namespace($this->namespace)
                    ->group(base_path('app/Domains/' . $domain . '/routes/' . $file));
            }
        }
    }
}
