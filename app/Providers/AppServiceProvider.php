<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        // Gate para administradores
        Gate::define('admin-only', function(User $user) {
            return $user->role === 'admin';
        });

        // Gate para editores (incluye admins si quieres)
        Gate::define('editor-only', function(User $user) {
            return in_array($user->role, ['editor','admin']);
        });
    }
}
