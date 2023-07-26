<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Backend\AdManagerController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuLinkController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontUserController;
use App\Http\Livewire\Pages\Browse;
use App\Http\Livewire\Pages\Category;
use App\Http\Livewire\Pages\Create;
use App\Http\Livewire\Pages\Edit;
use App\Http\Livewire\Pages\Post;
use App\Http\Livewire\Pages\Profile;
use App\Models\Language;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use UniSharp\LaravelFilemanager\Lfm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Browse::class)->name('home');

Route::get('/language/{code}', function ($code) {
    $language = Language::where('code', $code)->first();
    if ($language) {
        Session::put('locale', $code);
    }
    return redirect()->back();
})->name('switch-language');

Route::middleware(['guest', 'checkUserRegistration'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::get('auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('auth.socialite.callback');

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth', 'can:admin-read']], function () {
    Lfm::routes();
});

Route::prefix('admindashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'can:admin-read', 'active.account'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::middleware('auth')->group(function () {
        Route::resource('languages', LanguageController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('menu-links', MenuLinkController::class);
        Route::post('menu-links/get-type', [MenuLinkController::class, 'getType'])->name('menu-links.get-type');
        Route::post('menu-links/order', [MenuLinkController::class, 'order'])->name('menu-links.order');
        Route::resource('pages', PageController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('ads-manager', AdManagerController::class);
        Route::post('/ads-manager/disable/{id}', [AdManagerController::class, 'disable'])->name('ads-manager.disable');
        Route::post('/ads-manager/enable/{id}', [AdManagerController::class, 'enable'])->name('ads-manager.enable');
        Route::get('/ad-banner-auto-placements', [AdManagerController::class, 'autoAds']);
        Route::post('/ad-banner-update-clicks', [AdManagerController::class, 'updateClicks']);
        Route::post('/clean-cache', [AdminController::class, 'cleanCache'])->name('clean-cache');
        Route::post('/sitemap-generate', [AdminController::class, 'sitemapGenerate'])->name('sitemap-generate');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/update', [SettingController::class, 'update'])->name('update');
    });
});

Route::get('/smart-banner-auto-placements', [AdManagerController::class, 'autoAds']);
Route::post('/smart-banner-update-clicks', [AdManagerController::class, 'updateClicks']);

Route::prefix('user')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'active.account'])->name('user.')->group(function () {
    Route::get('/profile', [FrontUserController::class, 'profile'])->name('profile');
    Route::get('/security', [FrontUserController::class, 'security'])->name('security');
});

Route::get('/create', Create::class)->name('create.show')->middleware(['auth', 'active.account']);
Route::get('/edit/{slug}', Edit::class)->name('edit.show')->middleware(['auth', 'active.account']);

Route::get('/profile/{username}', Profile::class)->name('profile.show');

Route::get('/{slug}', Category::class)->name('category.show');
Route::get('/page/{slug}', [FrontController::class, 'page'])->name('page.show');
Route::get('{username}/{slug}', Post::class)->name('post.show');