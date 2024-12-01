<?php //dd('rj');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FranchiseTempController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ZipCodeController;


use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\DesignTypeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CompositionController;
use App\Http\Controllers\SupplierCollectionController;
use App\Http\Controllers\SupplierCollectionDesignController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UsageController;








Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('config:cache');

    return response()->json(['message' => 'All caches cleared and optimized.']);
});
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('/appointments', function () {
    return view('frontend.schedule_appointment');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/terms_and_conditions', function () {
    return view('frontend.terms_and_conditions');
});
Route::get('/how', function () {
    return view('frontend.how');
});
Route::get('/privacy_policy', function () {
    return view('frontend.privacy_policy');
});
Route::get('/services', function () {
    return view('frontend.services');
});
Route::get('/our_products', function () {
    return view('frontend.our_products');
});
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/franchise_registration', function () {
return view('frontend.franchise_reg');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/franchise_approval', function () {
    return view('admin.franchise.approval');
});
Route::get('/user_create', function () {
    return view('admin.user.create');
})->name('user_create');
Auth::routes();
Route::get('appointments_list', [AppointmentController::class, 'index'])->name('appointments.list.index');
// web.php
Route::post('/appointments/assign', [AppointmentController::class, 'assign'])->name('appointments.assign');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('super.admin.dashboard');
});
Route::post('/get-location', [AdminController::class, 'getLocationByPincode']);
Route::middleware(['auth'])->group(function () {


    Route::get('franchise_approval', [FranchiseTempController::class, 'index'])->name('franchise.temp.index');
    Route::get('/franchise/details/{id}/{type}', [FranchiseTempController::class, 'getFranchiseDetails'])->name('franchise.details');

    // Route to approve franchise

    Route::put('/franchise/{franchise}/approve', [FranchiseTempController::class, 'approve'])->name('franchise.approve1');

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Help Desk'])->group(function () {
    Route::get('/help-desk/dashboard', [HelpDeskController::class, 'index'])->name('help.desk.dashboard');
});

Route::middleware(['auth', 'role:Fulfillment Desk'])->group(function () {
    Route::get('/fulfillment-desk/dashboard', [FulfillmentController::class, 'index'])->name('fulfillment.desk.dashboard');
});

// Add similar route groups for other roles...
Route::middleware(['auth', 'role:Franchise'])->group(function () {
    Route::get('franchise/team', [FranchiseTeamController::class, 'index'])->name('franchise.team.index');
    Route::get('franchise/team/create', [FranchiseTeamController::class, 'create'])->name('franchise.team.create');
    Route::post('franchise/team/store', [FranchiseTeamController::class, 'store'])->name('franchise.team.store');
});


Route::post('/franchise_temp/store', [FranchiseTempController::class, 'store'])->name('franchise_temp.store');
Route::post('/franchise_temp/store_admin', [FranchiseTempController::class, 'store_admin'])->name('franchise_temp.store_admin');
Route::get('franchise_approval', [FranchiseTempController::class, 'index'])->name('franchise.temp.index');

// Route to approve franchise
Route::get('franchise/{id}/approve', [FranchiseTempController::class, 'approve'])->name('franchise.approve');
// Route::get('franchise/{id}/reject', [FranchiseTempController::class, 'reject'])->name('franchise.reject');
Route::put('franchise/{id}/reject', [FranchiseTempController::class, 'reject'])->name('franchise.reject');


Route::post('/custom-register', [RegisterController::class, 'register'])
    ->name('custom.register.submit');

// User
Route::get('user_list', [RegisterController::class, 'user_list'])->name('user.list');
// Edit user (using a PUT method)
Route::put('/users/{user}', [RegisterController::class, 'updateUser'])->name('user.update');

// Delete user
Route::delete('/users/{user}', [RegisterController::class, 'deleteUser'])->name('user.delete');

// Change status (Active/Inactive)
Route::post('/users/{user}/status', [RegisterController::class, 'changeStatus'])->name('user.status');

// Change password
Route::put('/users/{user}/change-password', [RegisterController::class, 'changePassword'])->name('user.change-password');

//Product



// Route to store the product data
//Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
Route::resource('products', ProductController::class);
Route::get('products/download/csv', [ProductController::class, 'download_csv']);
Route::get('products/data/log', [ProductController::class, 'data_log']);
// Route to display the form
//Route::get('/product_create', [ProductController::class, 'create'])->name('products.create');
//Route::get('products_{id}', [ProductController::class, 'show'])->name('products.show');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
// web.php
Route::get('/product/{id}/details', [ProductController::class, 'getProductDetails'])->name('product.details');
Route::resource('zipcodes', ZipCodeController::class);
Route::post('zipcode/import', [ZipCodeController::class, 'import'])->name('zipcode.import');
Route::get('zipcode/export', [ZipCodeController::class, 'export'])->name('zipcode.export');
Route::resource('product-types', ProductTypeController::class);
Route::resource('design-types', DesignTypeController::class);
Route::resource('colors', ColorController::class);
Route::resource('compositions', CompositionController::class);
Route::resource('supplier-collections', SupplierCollectionController::class);
Route::resource('supplierCollectionDesigns', SupplierCollectionDesignController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('types', TypeController::class);
Route::resource('usages', UsageController::class);
Route::get('/supplier-collection/{supplierId}', [SupplierCollectionDesignController::class, 'getSupplierCollections']);

Route::get('/supplier-collection-designs/{supplierId}/{collectionId}', [SupplierCollectionDesignController::class, 'getSupplierCollectionDesigns']);


Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
