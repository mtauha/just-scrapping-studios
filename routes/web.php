<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GeneralRequestController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth', AdminMiddleware::class);

Route::get('/admin', function () {
    return redirect('/admin/dashboard'); })->middleware('auth', AdminMiddleware::class);

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('products', ProductController::class);
    Route::resource('trainings', TrainingController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order_items', OrderItemController::class);
    Route::resource('competitions', CompetitionController::class);
    Route::resource('bookings', BookingController::class);
    Route::get('courses/{course}/enrollments', [EnrollmentController::class, 'index'])->name('courses.enrollments');
    Route::get('enrollments/{enrollment}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::put('enrollments/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');

    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('admin/general_requests', [GeneralRequestController::class, 'index'])->name('admin.general_requests.index');
    Route::post('admin/general_requests/{request}/approve', [GeneralRequestController::class, 'approve'])->name('admin.general_requests.approve');
    Route::delete('admin/general_requests/{request}/reject', [GeneralRequestController::class, 'reject'])->name('admin.general_requests.reject');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    
    Route::post('general_requests', [GeneralRequestController::class, 'store'])->name('general_requests.store');

    Route::resource('comments', CommentController::class)->except(['destroy']);

    Route::get('shop/courses', [ShopController::class, 'courses'])->name('shop.courses');
    Route::get('shop/products', [ShopController::class, 'products'])->name('shop.products');
    Route::get('shop/trainings', [ShopController::class, 'trainings'])->name('shop.trainings');
    Route::get('shop/bookings', [ShopController::class, 'bookings'])->name('shop.bookings');
    Route::get('shop/orders', [ShopController::class, 'orders'])->name('shop.orders');
    Route::get('shop/competitions', [ShopController::class, 'competitions'])->name('shop.competitions');

    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/increase/{item}', [CartController::class, 'increase'])->name('cart.increase');
    Route::post('cart/decrease/{item}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::post('cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
});
Auth::routes();