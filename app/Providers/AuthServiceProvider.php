<?php

namespace App\Providers;

use App\Models\Form;
use App\Models\Question;
use App\Models\Response;
use App\Policies\FormPolicy;
use App\Policies\QuestionPolicy;
use App\Policies\ResponsePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Form::class => FormPolicy::class,
        Question::class => QuestionPolicy::class,
        Response::class => ResponsePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Optional: Additional authorization rules can be defined here
        // Gate::define('export-responses', fn(User $user, Form $form) => 
        //     $user->id === $form->user_id || $user->is_admin);
    }
}