<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // User = Admin
        Gate::define('isAdmin', function(User $user) {
            return $user->userLevel === 0;
        });

        // User = Volunteer
        Gate::define('isVolunteer', function(User $user) {
            return $user->userLevel === 1;
        });

        // User = Admin or Volunteer
        Gate::define('isAdminOrVolunteer', function(User $user) {
            return $user->userLevel === 0 || $user->userLevel === 1;
        });

        // User account authorization status
        Gate::define('accountIsAuthorized', function(User $user) {
            return $user->accountStatus === "Authorized";
        });

        // Manage own account
        Gate::define('manageOwnAccount', function(User $user, User $targetUser) {
            return $user->id === $targetUser->id;
        });
    }
}
