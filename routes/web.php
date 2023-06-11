<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpensesController;

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


    /**
     * Home Routes
     */
    Route::get('/', [HomeController::class, 'index'])->name('home.index');


    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');


        /**
         * Login Routes
         */
        Route::get('/login', [LoginController::class, 'show'])->name('login.show');
        Route::post('/login', [LoginController::class, 'login'])->name('login.perform');


    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UsersController::class, 'index'])->name('users.index');
            Route::get('/create', [UsersController::class, 'create'])->name('users.create');
            Route::post('/create', [UsersController::class, 'store'])->name('users.store');
            Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
            Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
            Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
            Route::get('/profile', [UsersController::class, 'profile'])->name('users.profile');
            Route::put('/profile/{user}/password/update', [UsersController::class, 'password'])->name('password.update');
        });

        Route::group(['prefix' => 'ExpenseCategory'], function() {
            Route::get('/', [ExpenseCategoryController::class, 'index'])->name('expenseCategory.index');
            Route::get('/create', [ExpenseCategoryController::class, 'create'])->name('expenseCategory.create');
            Route::post('/create', [ExpenseCategoryController::class, 'store'])->name('expenseCategory.store');
            Route::get('/{user}/show', [ExpenseCategoryController::class, 'show'])->name('expenseCategory.show');
            Route::get('/{user}/edit', [ExpenseCategoryController::class, 'edit'])->name('expenseCategory.edit');
            Route::put('/{user}/update', [ExpenseCategoryController::class, 'update'])->name('expenseCategory.update');
            Route::delete('/{user}/delete', [ExpenseCategoryController::class, 'destroy'])->name('expenseCategory.destroy');
        });

        Route::group(['prefix' => 'Expenses'], function() {
            Route::get('/', [ExpensesController::class, 'index'])->name('expenses.index');
            Route::get('/create', [ExpensesController::class, 'create'])->name('expenses.create');
            Route::post('/create', [ExpensesController::class, 'store'])->name('expenses.store');
            Route::get('/{user}/show', [ExpensesController::class, 'show'])->name('expenses.show');
            Route::get('/{user}/edit', [ExpensesController::class, 'edit'])->name('expenses.edit');
            Route::put('/{user}/update', [ExpensesController::class, 'update'])->name('expenses.update');
            Route::delete('/{user}/delete', [ExpensesController::class, 'destroy'])->name('expenses.destroy');
        });
    });

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);

