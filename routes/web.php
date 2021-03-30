<?php



use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnouncementController;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}/index', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/announcements/{announcement}/show', [AnnouncementController::class, 'show'])->name('announcements.show');

 //ROTTE LOGGATE
Route::middleware([Authenticate::class])->group(function(){
Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::post('/announcements/store', [AnnouncementController::class, 'store'])->name('announcements.store');
});
