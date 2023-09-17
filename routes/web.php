<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/user/{id}', function ($id) {
    echo 'Este perfil é do usuario com ID: ' . $id;
})->name('user.profile');

Route::get('/post/{slug}', function ($slug) {
    echo "Post do Blog com Slug: ". $slug;
})->name('blog.post');

Route::get('/category/{category}', function ($category) {
    echo "Posts na Categoria: ". $category;
})->name('blog.category');

Route::get('/user/{id}/language/{lang?}', function ($id, $lang = null) {
    $language = $lang ? " com a linguagem: " . $lang : ' com a linguagem indefinida';
    echo "Perfil do Usuário com ID: " . $id . $language;
})->name('user.profile.language');

Route::get('/products/{category}/{minPrice?}', function ($category, $minPrice = null) {
    $priceFilter = $minPrice ? " com o preço minimo em: R$" . $minPrice : '';
    echo 'Produtos da categoria ' . $category . $priceFilter;
})->name('products.category.price');

Route::get('/page/{page}', function ($page) {
    echo "Página de número: $page";
})->name('page.number')->where('page', '[0-9]+');

Route::get('/convert/{money}', function ($money) {
    if (preg_match('/^\d+(\.\d{1,2})?$/', $money)) {
        $valueDolar = 0.21; 

        if (is_numeric($money) && $money >= 0) {
            $convertedValue = number_format($money * $valueDolar, 2, '.', '');

            echo "O valor R$" . $money. " em dólar é: $" . $convertedValue;
        } else {
            echo " valor inválido";
        }
    }
    else {
        echo " formato inválido";
    }
})->name('currency.converter');

Route::get('/sum/{num1}/{num2}', function ($num1, $num2) {
    $sum = $num1 + $num2;
    echo "A Soma de $num1 e $num2 é igual a $sum";
})->name('sum.numbers');

Route::get('/thanks/{name}', function ($name) {
    return "Obrigado, ". $name."!";
})->where('name', '[A-Za-z]+')->name('thanks');