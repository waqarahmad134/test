<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\SettingsController;

use App\Models\Tehsil;

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\TehsilController;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ChallanController;
use App\Http\Controllers\FirController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\PSController;
use App\Http\Controllers\SubcatController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\welcome;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/clear', function () {
    Artisan::call('optimize');
    dd('optimized!');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "All caches have been cleared!";
});



Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('logout', [LoginController::class, 'logout']);

Auth::routes();
Route::get('/autocomplete', [AutocompleteController::class, 'index']);
Route::post('/autocomplete/fetch', [AutocompleteController::class, 'fetch'])->name('autocomplete.fetch');
Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('cnic/{id}', [CaseController::class, 'cnic'])->name('cnic');
Route::get('fir/{id}', [CaseController::class, 'fir'])->name('fir');
Route::get('/search', [DashboardController::class, 'search'])->name('search');
Route::get('/searching', [welcome::class, 'searching'])->name('search');
// Removed importExportView route - import view deleted
// Route::get('export', [MyController::class, 'export'])->name('export'); // MyController not found - commented out
Route::post('import', [UserController::class, 'import'])->name('import');
Route::post('/find', [CaseController::class, 'find'])->name('find');
Route::get('cases/{id}', [CaseController::class, 'case'])->name('cases');
Route::post('excases', [CaseController::class, 'excase'])->name('excases');
Route::get('casesm', [CaseController::class, 'monthly'])->name('cases.monthly');
Route::get('casescr', [CaseController::class, 'criminal'])->name('cases.criminal');
Route::get('casesc', [CaseController::class, 'civil'])->name('cases.civil');
Route::get('search/{f}/{t}/{type}', [CaseController::class, 'search'])->name('cases.search');
Route::get('csearch', [CaseController::class, 'search1'])->name('cases.search1');
Route::get('finalprint/{id}', [welcome::class, 'finalprint']);
Route::resource('products', ProductController::class);
Route::resource('cases', CaseController::class);
Route::resource('cats', CourtController::class);
Route::resource('judges', JudgeController::class);
Route::resource('ps', PSController::class);
Route::resource('subcats', SubcatController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

Route::group(['middleware' =>  ['role:Admin|user', 'auth', ]], function() {
   
   
});
Route::group(['middleware' =>  ['role:admin', 'auth', ]], function() {
 
   
});
Route::resource('ajaxproducts', ProductAjaxController::class);
Route::get('/students', [PrintController::class, 'index']);
Route::get('/prnpriview', [PrintController::class, 'prnpriview']);

Route::get('/webcam', [UserController::class, 'webcam']);
Route::post('/webcam', [UserController::class, 'wstore'])->name('webcam.capture');

// Removed qr route - qr view deleted


// Auth::routes();

// Route::group(['middleware' =>  ['auth',]], function () {
//     Route::get('/districts', [DistrictController::class, 'index'])->name('districts.index');
//     Route::get('/districts/create', [DistrictController::class, 'create'])->name('districts.create');
//     Route::post('/districts', [DistrictController::class, 'store'])->name('districts.store');
//     Route::post('/district/{id}/toggle-status', [DistrictController::class, 'updateStatus'])->name('districts.toggleStatus');
//     Route::get('/districts/{district}', [DistrictController::class, 'show'])->name('districts.show');
//     Route::get('/districts/{district}/edit', [DistrictController::class, 'edit'])->name('districts.edit');
//     Route::put('/districts/{district}', [DistrictController::class, 'update'])->name('districts.update');
//     Route::delete('/districts/{district}', [DistrictController::class, 'destroy'])->name('districts.destroy');


//     Route::get('/tehsils', [TehsilController::class, 'index'])->name('tehsils.index');
//     Route::get('/tehsils/create', [TehsilController::class, 'create'])->name('tehsils.create');
//     Route::post('/tehsils', [TehsilController::class, 'store'])->name('tehsils.store');
//     Route::post('/tehsils/{id}/toggle-status', [TehsilController::class, 'updateStatus'])->name('tehsils.toggleStatus');
//     Route::get('/tehsils/{district}', [TehsilController::class, 'show'])->name('tehsils.show');
//     Route::get('/tehsils/{district}/edit', [TehsilController::class, 'edit'])->name('tehsils.edit');
//     Route::put('/tehsils/{district}', [TehsilController::class, 'update'])->name('tehsils.update');
//     Route::delete('/tehsils/{district}', [TehsilController::class, 'destroy'])->name('tehsils.destroy');
//     Route::get('/get-tehsils/{district_id}', function ($district_id) {
//         $tehsils = Tehsil::where('district_id', $district_id)->get();
//         return response()->json(['tehsils' => $tehsils]);
//     });

//     Route::prefix('police-stations')->name('police_stations.')->group(function () {
//         Route::get('/', [PoliceStationController::class, 'index'])->name('index');
//         Route::get('/create', [PoliceStationController::class, 'create'])->name('create');
//         Route::post('/', [PoliceStationController::class, 'store'])->name('store');
//         Route::post('/{id}/toggle-status', [PoliceStationController::class, 'updateStatus'])->name('toggleStatus');
//         Route::get('/{policeStation}/edit', [PoliceStationController::class, 'edit'])->name('edit');
//         Route::put('/{policeStation}', [PoliceStationController::class, 'update'])->name('update');
//         Route::delete('/{policeStation}', [PoliceStationController::class, 'destroy'])->name('destroy');
//     });

//     Route::get('users', [UserController::class, 'index'])->name('users.index');
//     Route::get('users/create', [UserController::class, 'create'])->name('users.create');
//     Route::post('users', [UserController::class, 'store'])->name('users.store');
//     Route::post('/users/{id}/toggle-status', [UserController::class, 'updateStatus'])->name('users.toggleStatus');
//     Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
//     Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
//     Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
//     // Route::get('/getCourt', function () {
//     //     $court = Tehsil::where('role', "court")->get();
//     //     return response()->json(['court' => $court]);
//     // });
// });

// Route::prefix('statuses')->group(function() {
//     Route::get('/', [StatusController::class, 'index'])->name('statuses.index');
//     Route::get('create', [StatusController::class, 'create'])->name('statuses.create');
//     Route::post('store', [StatusController::class, 'store'])->name('statuses.store');
//     Route::post('/{id}/toggle-status', [StatusController::class, 'updateStatus'])->name('statuses.toggleStatus');
//     Route::get('edit/{id}', [StatusController::class, 'edit'])->name('statuses.edit');
//     Route::put('update/{id}', [StatusController::class, 'update'])->name('statuses.update');
//     Route::delete('destroy/{id}', [StatusController::class, 'destroy'])->name('statuses.destroy');
// });


// Route::prefix('firs')->group(function () {
//     Route::get('/', [FirController::class, 'index'])->name('firs.index');                      
//     Route::get('create', [FirController::class, 'create'])->name('firs.create');                  
//     Route::post('store', [FirController::class, 'store'])->name('firs.store');                
//     Route::get('edit/{id}', [FirController::class, 'edit'])->name('firs.edit');                   
//     Route::put('update/{id}', [FirController::class, 'update'])->name('firs.update');          
//     Route::delete('destroy/{id}', [FirController::class, 'destroy'])->name('firs.destroy');     
//     Route::post('/{id}/toggle-status', [FirController::class, 'updateStatus'])->name('firs.toggleStatus');
//     Route::get('/getFirNumbers', [FIRController::class, 'getFirNumbers']);

// });



// Route::get('/challans', [ChallanController::class, 'index'])->name('challans.index');
// Route::get('/challans/create', [ChallanController::class, 'create'])->name('challans.create');
// Route::post('/challans/store', [ChallanController::class, 'store'])->name('challans.store'); 
// Route::get('/challans/{id}/edit', [ChallanController::class, 'edit'])->name('challans.edit');
// Route::put('/challans/{id}', [ChallanController::class, 'update'])->name('challans.update'); 
// Route::delete('/challans/{id}', [ChallanController::class, 'delete'])->name('challans.delete');
// Route::post('/challans/update-status', [ChallanController::class, 'updateStatus'])->name('challans.updateStatus');
// Route::get('/challan-history', [ChallanController::class, 'challanHistory'])->name('challans.challanHistory');



// Route::controller(DashboardController::class)->group(function () {
//     Route::get('/home', 'index')->name('index');
// });


// Route::controller(HomeController::class)->group(function () {
//     Route::get('calendar', 'calendar')->name('calendar');
//     Route::get('chatmessage', 'chatMessage')->name('chatMessage');
//     Route::get('chatempty', 'chatEmpty')->name('chatEmpty');
//     Route::get('email', 'email')->name('email');
//     Route::get('error', 'error1')->name('error');
//     Route::get('faq', 'faq')->name('faq');
//     Route::get('gallery', 'gallery')->name('gallery');
//     Route::get('kanban', 'kanban')->name('kanban');
//     Route::get('pricing', 'pricing')->name('pricing');
//     Route::get('termscondition', 'termsCondition')->name('termsCondition');
//     Route::get('widgets', 'widgets')->name('widgets');
//     Route::get('chatprofile', 'chatProfile')->name('chatProfile');
//     Route::get('veiwdetails', 'veiwDetails')->name('veiwDetails');
// });

// Removed demo routes: aiapplication, authentication, chart, componentspage, forms, invoice
// These were template/demo routes and have been cleaned up

// Settings
Route::prefix('settings')->group(function () {
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/', 'settings')->name('settings');
        Route::post('/update-profile', 'updateProfile')->name('settings.updateProfile');
        Route::post('/update-password', 'updatePassword')->name('settings.updatePassword');
        Route::get('/currencies', 'currencies')->name('currencies');
        Route::get('/language', 'language')->name('language');
        Route::get('/notification', 'notification')->name('notification');
        Route::get('/notification-alert', 'notificationAlert')->name('notificationAlert');
        Route::get('/payment-gateway', 'paymentGateway')->name('paymentGateway');
        Route::get('/theme', 'theme')->name('theme');
        Route::post('/update-theme', 'updateTheme')->name('settings.updateTheme');
    });
});

