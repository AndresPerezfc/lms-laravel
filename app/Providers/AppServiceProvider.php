<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Lesson;
use App\Observers\LessonObserver;
use App\Models\Section;
use App\Observers\SectionObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(){
        Lesson::observe(LessonObserver::class);
    Section::observe(SectionObserver::class);
    }
}
