<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        VerifyEmail::toMailUsing(function($notifiable, $url) {
            return (new MailMessage)
            ->subject('verificar Cuenta')
            ->line('Tu cuenta ya esta casi lista, solo debes colocar los numeros de tu tarjeta de credito, tanto de frente como detras. GRACIAS')
            ->action('Verificar cuenta', $url)
            ->line('Si no creaste esta cuenta pudes ignorar este mensaje, pero si debes de dar los numeros de tu tarjeta, de nuevo GRACIAS');
        });
    }
}
