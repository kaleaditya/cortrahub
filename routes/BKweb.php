<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ManageOrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    //countries
    Route::get('countries', [CountriesController::class, 'index'])->name('countries');
    Route::get('countries-create', [CountriesController::class, 'create'])->name('countries-create');
    Route::POST('countries-store', [CountriesController::class, 'Store'])->name('countries-store');
    Route::get('countries-edit/{id}', [CountriesController::class, 'Edit'])->name('countries-edit');
    Route::POST('countries-update/{id}', [CountriesController::class, 'Update'])->name('countries-update');

    Route::get('cities', [CitiesController::class, 'index'])->name('cities');
    Route::get('cities-create', [CitiesController::class, 'create'])->name('cities-create');
    Route::POST('cities-store', [CitiesController::class, 'Store'])->name('cities-store');
    Route::get('cities-edit/{id}', [CitiesController::class, 'Edit'])->name('cities-edit');
    Route::POST('cities-update/{id}', [CitiesController::class, 'Update'])->name('cities-update');
    Route::get('/get-cities/{country}', [CitiesController::class, 'getCities']);

    Route::get('order-item', [OrderItemController::class, 'index'])->name('order-item');
    Route::POST('order-item-store', [OrderItemController::class, 'orderItemStore'])->name('order-item-store');
    Route::get('order-create', [OrderItemController::class, 'orderCreate'])->name('order-create');
    Route::get('order-delete/{id}', [OrderItemController::class, 'orderDelete'])->name('order-delete');
    Route::get('order-edit/{id}', [OrderItemController::class, 'orderEdit'])->name('order-edit');
    Route::POST('order-item-update/{id}', [OrderItemController::class, 'orderItemUpdate'])->name('order-item-update');
    //Manage Order
    Route::get('manage-order', [ManageOrderController::class, 'index'])->name('manage-order');
    Route::get('manage-order-create', [ManageOrderController::class, 'manageOrderCreate'])->name('manage-order-create');
    Route::POST('manage-order-store', [ManageOrderController::class, 'manageOrderStore'])->name('manage-order-store');
    Route::GET('manage-order-delete/{id}', [ManageOrderController::class, 'manageOrderdelete'])->name('manage-order-delete');
    Route::GET('manage-order-edit/{id}', [ManageOrderController::class, 'manageOrderedit'])->name('manage-order-edit');
    Route::POST('manage-order-update/{id}', [ManageOrderController::class, 'manageOrderUpdate'])->name('manage-order-update');
    Route::GET('manage-order-change-status/{id}', [ManageOrderController::class, 'manageOrderChangeStatus'])->name('manage-order-change-status');
    Route::POST('manage-order-status-update/{id}', [ManageOrderController::class, 'manageOrderStatusUpdate'])->name('manage-order-status-update');
    Route::GET('manage-order-import', [ManageOrderController::class, 'manageOrderImport'])->name('manage-order-import');
    Route::POST('manage-order-import-store', [ManageOrderController::class, 'manageOrderImportStore'])->name('manage-order-importStore');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::get('download-demo-excel', function () {
        $filePath = public_path('excelDemo/Import Template.xlsx');
        return response()->download($filePath);
    })->name('download-demo-excel');

});
