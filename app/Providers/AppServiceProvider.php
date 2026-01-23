<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Home;

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
    public function boot(): void
    {
        try {
            View::composer('*', function ($view) {
                $home = Home::first();

                if (!$home) {
                    $home = new Home([
                        'email' => 'contato@castel.com.br',
                        'phone' => '(84) 98800-4885',
                        'endereco' => 'Rua Seis de Janeiro, 1837, Santo Antonio, Mossoró, RN',
                        'whatsapp_business' => '5584994618126',
                        'title' => 'Bem-vindo à Castel',
                        'sub_title' => 'Realizando sonhos, construindo futuros.',
                        'horario_atendimento' => 'Seg a Sex, 8h às 18h • Sáb, 8h às 12h',
                        'card_title' => 'Título do Cartão Padrão',
                        'card_text' => 'Texto do cartão padrão.',
                        'contato_text' => 'Diga como podemos ajudar. Respondemos rapidinho 🙂',
                        'contato_phone' => '(84) 98800-4885',
                        'contato_email' => 'contato@castel.com.br',
                        'contato_address' => 'Rua Seis de Janeiro, 1837, Santo Antonio, Mossoró, RN',
                    ]);
                }

                $view->with('home', $home);
            });
        } catch (\Exception $e) {
            // In case the table doesn't exist yet during migrations
        }
    }
}
