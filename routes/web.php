<?php

use Illuminate\Support\Facades\Route;
use App\Models\Home;
use App\Models\About;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    $home = Home::first()->toArray();
    return view('index',compact('home'));
})->name('index');

Route::get('/avulsos', function () {
    return view('avulsos');
})->name('avulsos');

Route::get('/contato', function () {
    return view('contato');
})->name('contato');

Route::get('/sobre', function () {
    $sobre = About::first()->toArray();
    return view('sobre',compact('sobre'));
})->name('sobre');

Route::get('/empreendimentos', function () {
    return view('empreendimentos');
})->name('empreendimentos');

Route::get('/reservas', function () {
    return view('reservas');
})->name('reservas');

Route::get('/depoimentos', function () {
    return view('depoimentos');
})->name('depoimentos');

Route::get('/servicos', function () {
    return view('servicos');
})->name('servicos');

Route::get('/simulador', function () {
    return view('simulador');
})->name('simulador');

Route::get('/empreendimento', function () {
    return view('empreendimento');
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
