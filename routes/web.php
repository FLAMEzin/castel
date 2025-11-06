<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/avulsos', function () {
    return view('avulsos');
})->name('avulsos');

Route::get('/contato', function () {
    return view('contato');
})->name('contato');

Route::get('/sobre', function () {
    return view('sobre');
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

Route::get('/terraplenagem', function () {
    return view('terraplenagem');
})->name('terraplenagem');

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
