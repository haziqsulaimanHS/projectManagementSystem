<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Project;
use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isManager', function ($user) {
            return $user->userLevel == 0;
        });
        Gate::define('isLeadDeveloper', function ($user) {
            return $user->userLevel == 3;
        });
        Gate::define('isDeveloper', function ($user) {
            return $user->userLevel == 5;
        });

    }
}
