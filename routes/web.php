<?php

use App\Http\Controllers\Admin\DanceScheduleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventInvitation;
use App\Models\Event;
use App\Http\Controllers\CalendarController;


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('events', EventController::class);
    Route::resource('dance-schedules', DanceScheduleController::class);
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});



Route::get('responses/create/{event}', [ResponseController::class, 'create'])->name('responses.create');
Route::post('responses/store/{event}', [ResponseController::class, 'store'])->name('responses.store');
Route::get('responses/thankyou', [ResponseController::class, 'thankyou'])->name('responses.thankyou');
Route::get('admin/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
Route::put('admin/events/{event}', [EventController::class, 'update'])->name('admin.events.update');




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/events', [CalendarController::class, 'events'])->name('calendar.events');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/kavad', function () {
        return view('kavad');
    })->name('kavad');
});


require __DIR__.'/auth.php';
