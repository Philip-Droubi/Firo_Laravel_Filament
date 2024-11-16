<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Administration\App\AppFeature;
use App\Models\Administration\App\Category;
use App\Models\Administration\App\SubCategory;
use App\Models\Administration\Article\Article;
use App\Models\System\Info\AboutUs;
use App\Models\System\Info\ContactUs;
use App\Models\System\Info\Country;
use App\Models\System\Info\FAQ;
use App\Models\System\Info\PrivacyPolicy;
use App\Models\System\Info\State;
use App\Models\System\Info\Tos;
use App\Models\System\Report\MainReport;
use App\Models\System\Roles\Role;
use App\Policies\Administration\App\AppFeaturePolicy;
use App\Policies\Administration\Article\ArticlePolicy;
use App\Policies\System\Info\SystemInfoPolicy;
use App\Policies\System\Roles\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        AppFeature::class => AppFeaturePolicy::class,
        Role::class => RolePolicy::class,
        //System Info Policies
        ContactUs::class => SystemInfoPolicy::class,
        AboutUs::class => SystemInfoPolicy::class,
        Tos::class => SystemInfoPolicy::class,
        PrivacyPolicy::class => SystemInfoPolicy::class,
        FAQ::class => SystemInfoPolicy::class,
        MainReport::class => SystemInfoPolicy::class,
        Country::class => SystemInfoPolicy::class,
        State::class => SystemInfoPolicy::class,
        Category::class => SystemInfoPolicy::class,
        SubCategory::class => SystemInfoPolicy::class,
        //End System Info Policies
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
