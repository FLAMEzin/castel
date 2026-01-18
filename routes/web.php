<?php

use Illuminate\Support\Facades\Route;
use App\Models\About;
use App\Models\Home;
use App\Models\Servico;
use App\Models\Empreendimento;

Route::get('/', function () {
    $home = Home::first();
    if (!$home) {
        $home = new Home([
            'card_title' => 'Bem-vindo',
            'card_text' => 'Este é um texto padrão.',
            'contato_text' => 'Entre em contato conosco.',
            'contato_phone' => '(00) 0000-0000',
            'contato_email' => 'contato@exemplo.com',
            'contato_address' => 'Endereço de exemplo',
        ]);
    }
    return view('index', ['home' => $home]);
});

Route::get('/index', function () {
    $home = Home::first();
    if (!$home) {
        $home = new Home([
            'card_title' => 'Bem-vindo',
            'card_text' => 'Este é um texto padrão.',
            'contato_text' => 'Entre em contato conosco.',
            'contato_phone' => '(00) 0000-0000',
            'contato_email' => 'contato@exemplo.com',
            'contato_address' => 'Endereço de exemplo',
        ]);
    }
    return view('index', ['home' => $home]);
})->name('index');

Route::get('/avulsos', function () {
    return view('avulsos');
})->name('avulsos');

Route::get('/contato', function () {
    $home = Home::first();
    if (!$home) {
        $home = new Home([
            'card_title' => 'Bem-vindo',
            'card_text' => 'Este é um texto padrão.',
            'contato_text' => 'Entre em contato conosco.',
            'contato_phone' => '(00) 0000-0000',
            'contato_email' => 'contato@exemplo.com',
            'contato_address' => 'Endereço de exemplo',
        ]);
    }
    return view('contato', ['home' => $home]);
})->name('contato');

Route::get('/sobre', function () {
    $sobre = About::first();
    if (!$sobre) {
        // Provide default values if no record is found
        $sobre = new About([
            'title' => 'Nossa História',
            'sub_title' => 'Conheça a história da nossa empresa.',
            'anos_historia' => 0,
            'obras_entregues' => 0,
            'text_about' => 'Em breve, compartilharemos a nossa trajetória com você.',
        ]);
    }
    return view('sobre', ['sobre' => $sobre]);
})->name('sobre');

Route::get('/empreendimentos', function () {
    $empreendimentos = Empreendimento::all();
    return view('empreendimentos', ['empreendimentos' => $empreendimentos]);
})->name('empreendimentos');

Route::get('/reservas', function () {
    return view('reservas');
})->name('reservas');

Route::get('/depoimentos', function () {
    return view('depoimentos');
})->name('depoimentos');

Route::get('/servicos', function () {
    $servicos = Servico::all();
    return view('servicos', ['servicos' => $servicos]);
})->name('servicos');

Route::get('/simulador', function () {
    return view('simulador');
})->name('simulador');

Route::get('/empreendimento/{id}', function ($id) {
    $empreendimento = Empreendimento::findOrFail($id);
    return view('empreendimento', ['empreendimento' => $empreendimento]);
})->name('empreendimento');

// Rotas do Simulador
Route::get('/simulador/dados-adicionais', function () {
    return view('simulador-dados-adicionais');
})->name('simulador.dados-adicionais');

Route::get('/simulador/dados-pessoais', function () {
    return view('simulador-dados-pessoais');
})->name('simulador.dados-pessoais');

Route::get('/simulador/resultado', function () {
    return view('simulador-resultado');
})->name('simulador.resultado');
