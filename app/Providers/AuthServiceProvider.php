<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductPhoto;
use App\Models\Site;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\NewsPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProductDetailPolicy;
use App\Policies\ProductPhotoPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\SitePolicy;
use App\Policies\SliderPolicy;
use App\Policies\TestimonialPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//         'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        Site::class => SitePolicy::class,
        Category::class => CategoryPolicy::class,
        Product::class => ProductPolicy::class,
        ProductDetail::class => ProductDetailPolicy::class,
        ProductPhoto::class => ProductPhotoPolicy::class,
        Slider::class => SliderPolicy::class,
        News::class => NewsPolicy::class,
        Testimonial::class => TestimonialPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
    }
}
