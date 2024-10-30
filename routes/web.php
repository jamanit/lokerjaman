<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home.index_home');
// });

Route::match(['get', 'post'], '/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('show/{id}/{company_name}', [App\Http\Controllers\HomeController::class, 'show'])->name('home.show');
Route::get('detail/{id}/{company_name}', [App\Http\Controllers\HomeController::class, 'detail'])->name('home.detail');
Route::post('visit/{id}/{model}', [App\Http\Controllers\C_visit::class, 'index'])->name('visit.index');
Route::get('about', [App\Http\Controllers\C_brand_profile::class, 'about'])->name('brand_profile.about');
Route::get('contact', [App\Http\Controllers\C_brand_profile::class, 'contact'])->name('brand_profile.contact');
Route::get('post_vacancy', [App\Http\Controllers\C_brand_profile::class, 'post_vacancy'])->name('brand_profile.post_vacancy');

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('menus', App\Http\Controllers\C_menu::class);

    Route::resource('menu_firsts', App\Http\Controllers\C_menu_first::class)->parameters([
        'menu_firsts' => 'menu_first:uuid'
    ]);

    Route::resource('menu_seconds', App\Http\Controllers\C_menu_second::class)->parameters([
        'menu_seconds' => 'menu_second:uuid'
    ]);

    Route::resource('roles', App\Http\Controllers\C_role::class)->parameters([
        'roles' => 'role:uuid'
    ]);

    Route::resource('menu_accesses', App\Http\Controllers\C_menu_access::class)->parameters([
        'menu_accesses' => 'menu_access:uuid'
    ]);

    Route::resource('users', App\Http\Controllers\C_user::class)->parameters([
        'users' => 'user:uuid'
    ]);

    Route::resource('profiles', App\Http\Controllers\C_profile::class)->parameters([
        'profiles' => 'profile:uuid'
    ]);

    Route::resource('companies', App\Http\Controllers\C_company::class)->parameters([
        'companies' => 'company:uuid'
    ]);

    Route::resource('locations', App\Http\Controllers\C_location::class)->parameters([
        'locations' => 'location:uuid'
    ]);

    Route::resource('vacancies', App\Http\Controllers\C_vacancy::class)->parameters([
        'vacancies' => 'vacancy:uuid'
    ]);

    Route::resource('brand_profiles', App\Http\Controllers\C_brand_profile::class)->parameters([
        'brand_profiles' => 'brand_profile:uuid'
    ]);
});
