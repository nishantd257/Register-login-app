<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Route for displaying the user's profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Route for editing the profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Route for updating the profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route for deleting the profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/getCities/{state_id}', [LocationController::class, 'getCities']);

Route::post('/check-email', function (Request $request) {
    $exists = \App\Models\User::where('email', $request->email)->exists();
    return response()->json(!$exists);
});

require __DIR__ . '/auth.php';
