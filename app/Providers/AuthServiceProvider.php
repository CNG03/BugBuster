<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\BugType;
use App\Models\Project;
use App\Models\TestType;
use App\Policies\BugTypePolicy;
use App\Policies\ProjectPolicy;
use App\Policies\TestTypePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        TestType::class => TestTypePolicy::class,
        BugType::class => BugTypePolicy::class,
        Project::class => ProjectPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}