<?php



use Whoops\Run;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\RevisorMiddleware;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;
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
Route::get('/announcements/index', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/announcements/search', [SearchController::class,'search'])->name('announcements.search');
Route::post('/contacts/{announcement}/contactSeller', [ContactController::class, 'contactSeller'])->name('contacts.contactSeller');
Route::post('/locale/{locale}', [HomeController::class, 'locale'])->name('locale');

 //ROTTE LOGGATE
Route::middleware([Authenticate::class])->group(function(){
Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::post('/announcements/store', [AnnouncementController::class, 'store'])->name('announcements.store');
Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImages'])->name('announcement.images.upload');
Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImages'])->name('announcement.images.remove');
Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('announcement.images');
Route::post('/contacts/workWithUs', [ContactController::class, 'workWithUs'])->name('contacts.workWithUs');
Route::get('/contacts/workWithUsPage', [ContactController::class, 'workWithUsPage'])->name('contacts.workWithUsPage');
Route::get('/users/profile', [HomeController::class, 'profile'])->name('users.profile');
Route::delete('/announcements/{announcement}/destroy', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
Route::get('/announcements/{announcement:title}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
Route::post('/announcements/{announcement}/update', [AnnouncementController::class, 'update'])->name('announcements.update');
Route::post('/announcements/{announcement}/addLiked', [AnnouncementController::class, 'addLiked'])->name('announcements.addLiked');
Route::post('/announcements/{announcement}/lessLiked', [AnnouncementController::class, 'lessLiked'])->name('announcements.lessLiked');
Route::delete('/announcement/images/{image}/destroyImage', [AnnouncementController::class, 'destroyImage'])->name('announcement.images.destroyImage');
});

//ROUTE REVISOR
Route::middleware([RevisorMiddleware::class])->group(function(){
    Route::get('/revisors/dashboard', [RevisorController::class, 'revisorDashboard'])->name('revisors.dashboard');
    Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
    Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
    });
    


    
//ROUTE ADMIN
Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users/{user}/toggle', [AdminController::class, 'toggleUser'])->name('users.toggle');
    Route::delete('/users/{user}/destroy', [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::get('/users/{user}/toggleUserDisable', [AdminController::class, 'toggleUserDisable'])->name('users.toggleUserDisable');

});