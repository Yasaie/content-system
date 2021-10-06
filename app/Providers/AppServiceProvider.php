<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Service;
use App\Models\Team;
use App\Observers\BlogObserver;
use App\Observers\CategoryObserver;
use App\Observers\MenuObserver;
use App\Observers\PageObserver;
use App\Observers\ServiceObserver;
use App\Observers\TeamObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

		/* observers */
		Menu::observe(new MenuObserver());
		Category::observe(new CategoryObserver());
		Blog::observe(new BlogObserver());
		Page::observe(new PageObserver());
		Team::observe(new TeamObserver());
		Service::observe(new ServiceObserver());

		View::composer('layouts.front.header',function($view){
			$items 	= Menu::whereDoesntHave('parent')
						  ->whereNotNull('published_at')
						  ->orderByDesc('order')
						  ->with('children')
						  ->get();
			$menu 	= new Menu;
			return $view->with('menu', $menu->getMainMenu($items));
		});

		View::composer('layouts.front.footer',function($view){
			$randomBlogs=Blog::whereNotNull('published_at')->inRandomOrder()->limit(5)->get();
			return $view->with('randomBlogs', $randomBlogs);
		});

		View::composer('layouts.front.widget-cat',function($view){
			$categories=Category::whereNotNull('published_at')
				->withCount(['blogs' => function ($query) {
					$query->whereNotNull('published_at')
						  ->groupBy('nested_id');
			}])->get();

			return $view->with('categories', $categories);
		});


		View::composer('layouts.front.recent-posts',function($view){
			$randomBlogs=Blog::whereNotNull('published_at')->inRandomOrder()->limit(5)->get();
			return $view->with('randomBlogs', $randomBlogs);
		});

        View::composer('layouts.front.testimotional',function($view){
            $customers=Customer::whereNotNull('published_at')->inRandomOrder()->limit(5)->get();
            return $view->with('customers', $customers);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
