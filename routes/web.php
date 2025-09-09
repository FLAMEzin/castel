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

Route::get('/simulador', function () {
    return view('simulador');
})->name('simulador');


Route::get('/empreendimento', function () {
    return view('empreendimento');
})->name('empreendimento');