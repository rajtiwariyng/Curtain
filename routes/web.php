<?php 
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
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SupplierCollectionController;
use App\Http\Controllers\SupplierCollectionDesignController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\OrderController;
use PHPUnit\Framework\Attributes\Group;

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
Route::get('/appointments', function () { return view('frontend.schedule_appointment'); });
Route::get('/contact', function () { return view('frontend.contact'); });
Route::get('/terms-and-conditions', function () { return view('frontend.terms_and_conditions'); });
Route::get('/how', function () { return view('frontend.how'); });
Route::get('/privacy-policy', function () { return view('frontend.privacy_policy');});
Route::get('/faq', function () { return view('frontend.faq');});
Route::get('/services', function () { return view('frontend.services');});
Route::get('/our-products', function () { return view('frontend.our_products');});
Route::get('/about', function () { return view('frontend.about'); });
Route::get('/', function () { return view('frontend.index'); });
Route::get('/franchise-registration', [FranchiseTempController::class, 'frontend_view']);
Route::get('/login', function () { return view('auth.login');});
Route::get('/dashboard', function () { return view('admin.dashboard');});
Route::get('/franchise_approval', function () { return view('admin.franchise.approval');});
Route::get('/user_create', function () { return view('admin.user.create');})->name('user_create');
Route::get('/emailview', function () { return view('emails.franchise_information');})->name('emails.view');

Auth::routes();
Route::get('appointments_list', [AppointmentController::class, 'index'])->name('appointments.list.index');
Route::get('querybooked', [AppointmentController::class, 'querybooked'])->name('querybooked.list');
Route::get('/export/book-query', [AppointmentController::class, 'exportBookQuery'])->name('export.book.query');
Route::get('/appointment/data', [AppointmentController::class, 'getAppointmentData']);
Route::get('/appointment/details/{id}/{type}', [AppointmentController::class, 'getAppointmentDetails'])->name('appointment.details');
Route::get('appointment/{id}/assign', [AppointmentController::class, 'assign'])->name('appointment.assign');
Route::get('getFranchiseList/{apnt_id}', [AppointmentController::class, 'getFranchiseList']);
Route::put('appointment/{id}/reject', [AppointmentController::class, 'reject'])->name('appointment.reject');

// web.php
Route::post('/appointments/assign', [AppointmentController::class, 'assign'])->name('appointments.assign');
Route::post('/appointments/reassign', [AppointmentController::class, 'reassign'])->name('appointments.reassign');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('super.admin.dashboard');
});
Route::post('/get-location', [AdminController::class, 'getLocationByPincode']);
Route::middleware(['auth'])->group(function () {

    Route::get('franchise_approval', [FranchiseTempController::class, 'index'])->name('franchise.temp.index');
    Route::get('/franchise/details/{id}/{type}', [FranchiseTempController::class, 'getFranchiseDetails'])->name('franchise.details');
    Route::put('/franchise/{franchise}/approve', [FranchiseTempController::class, 'approve'])->name('franchise.approve1');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});

Route::middleware(['auth', 'role:Help Desk'])->group(function () {
    Route::get('/help-desk/dashboard', [HelpDeskController::class, 'index'])->name('help.desk.dashboard');
});

Route::middleware(['auth', 'role:Fulfillment Desk'])->group(function () {
    Route::get('/fulfillment-desk/dashboard', [FulfillmentController::class, 'index'])->name('fulfillment.desk.dashboard');
});

Route::post('/franchise_temp/store', [FranchiseTempController::class, 'store'])->name('franchise_temp.store');
Route::post('/franchise_temp/store_admin', [FranchiseTempController::class, 'store_admin'])->name('franchise_temp.store_admin');
Route::get('franchise_approval', [FranchiseTempController::class, 'index'])->name('franchise.temp.index');

// Route to approve franchise
Route::get('franchise/{id}/approve', [FranchiseTempController::class, 'approve'])->name('franchise.approve');
Route::put('franchise/{id}/reject', [FranchiseTempController::class, 'reject'])->name('franchise.reject');

Route::post('/custom-register', [RegisterController::class, 'register'])->name('custom.register.submit');
// User

Route::get('user_list', [RegisterController::class, 'user_list'])->name('user.list');

// Edit user (using a PUT method)
Route::put('/users/{user}', [RegisterController::class, 'updateUser'])->name('user.update');
Route::delete('/users/{user}', [RegisterController::class, 'deleteUser'])->name('user.delete');
Route::post('/users/{user}/status', [RegisterController::class, 'changeStatus'])->name('user.status');
Route::put('/users/{user}/change-password', [RegisterController::class, 'changePassword'])->name('user.change-password');

Route::get('/supplier-collection/{supplierId}', [SupplierCollectionDesignController::class, 'getSupplierCollections']);
Route::get('/supplier-collection-designs/{supplierId}/{collectionId}', [SupplierCollectionDesignController::class, 'getSupplierCollectionDesigns']);

Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Quotation Work
Route::prefix('quotations')->group(function () {
    Route::get('/', [QuotationController::class, 'index'])->name('quotations.list');
    Route::get('create/{appointment_id}', [QuotationController::class, 'create'])->name('quotations.create');
    Route::post('/store', [QuotationController::class, 'store'])->name('quotation.store');
    Route::get('data', [QuotationController::class, 'getQuotationsData']);
    Route::put('delete/{id}', [QuotationController::class, 'deleteQuotationsData'])->name('quotation.delete');
    Route::get('/details/{id}/{type}', [QuotationController::class, 'getAppointmentDetails'])->name('quotations.details');

    Route::get('/download_quotes/{apointment_id}', [QuotationController::class, 'downloadQuotationView']);
});


Route::prefix('zipcodes')->name('zipcodes.')->group(function() {
    Route::get('/', [ZipCodeController::class, 'index'])->name('index');
    Route::post('/', [ZipCodeController::class, 'store'])->name('store');
    Route::get('{id}/edit', [ZipCodeController::class, 'edit'])->name('edit');
    Route::put('{id}', [ZipCodeController::class, 'update'])->name('update');
    Route::delete('{id}', [ZipCodeController::class, 'destroy'])->name('destroy');
    Route::post('import', [ZipCodeController::class, 'import'])->name('import');
    Route::get('export', [ZipCodeController::class, 'export'])->name('export');
});

// products
Route::resource('products', ProductController::class);
Route::prefix('products/')->group(function() {
    Route::get('download/csv', [ProductController::class, 'download_csv']);
    Route::get('data/log', [ProductController::class, 'data_log']);
    Route::delete('{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('{id}/details', [ProductController::class, 'getProductDetails'])->name('product.details');
});

// Calculator 

Route::get('admin/calculator', [AdminController::class, 'calculator']);

Route::get('getProductType', [ProductTypeController::class, 'getProductTypes']);

Route::resource('product-types', ProductTypeController::class);
Route::resource('design-types', DesignTypeController::class);
Route::resource('colors', ColorController::class);
Route::resource('compositions', CompositionController::class);
Route::resource('supplier-collections', SupplierCollectionController::class);
Route::resource('supplierCollectionDesigns', SupplierCollectionDesignController::class);
Route::resource('suppliers', SupplierController::class);
Route::get('suppliers/{id}/collections',[SupplierController::class, 'collections']);
Route::resource('types', TypeController::class);
Route::resource('usages', UsageController::class);

// Quotation Work
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.list');
    Route::get('create/{appointment_id}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('data', [OrderController::class, 'getOrdersData']);
    Route::put('delete/{id}', [OrderController::class, 'deleteOrdersData'])->name('order.delete');
    Route::get('/details/{id}/{type}', [OrderController::class, 'getAppointmentDetails'])->name('order.details');

    Route::get('/download_order/{apointment_id}', [OrderController::class, 'downloadOrderView']);
});
