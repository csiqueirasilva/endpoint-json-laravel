<?php

namespace QuizJSON\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OptionService;
use App\Services\QuestionService;
use App\Services\QuizService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\OptionService', function ($app) {
			return new OptionService();
        });

		$this->app->bind('App\Services\QuestionService', function ($app) {
			return new QuestionService();
        });

		$this->app->bind('App\Services\QuizService', function ($app) {
			return new QuizService();
        });
    }
}