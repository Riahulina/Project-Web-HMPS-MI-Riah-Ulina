<?php
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DivisionMemberController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/about', function () {
    return view('about', ['title' => 'Kabinet Evolusionary']);
});

Route::get('/login', function () {
    return view('login', ['title' => 'Kabinet Evolusionary']);
});

Route::get('register', function () {
    return view('register', ['title' => 'Kabinet Evolusionary']);
});

// Route::get('/Blog', function () {
//     return view('Blog', ['title' => 'Activity Of Cabinet']);
// });

Route::get('/Divisions', function () {
    return view('Divisions', ['title' => 'List Divisions Of Cabinet']);
});

// Route::get('/Calendar', function () {
//     return view('Calendar', ['title' => ' Calendar Priod Of Cabinet']);
// });

Route::get('/Dokumentations', function () {
    return view('Dokumentations');
});

use App\Http\Controllers\BlogController;

Route::get('/Blog', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::resource('divisi', DivisiController::class);
Route::get('/blogs/kategori/{kategori}', [BlogController::class, 'byKategori'])->name('blogs.byKategori');
// Divisions (CRUD)

Route::get('/Divisions', [DivisionController::class, 'index'])->name('divisions.index');
Route::get('/divisions/create', [DivisionController::class, 'create'])->name('divisions.create');
Route::post('/divisions', [DivisionController::class, 'store'])->name('divisions.store');
Route::get('/divisions/{division}/edit', [DivisionController::class, 'edit'])->name('divisions.edit');
Route::put('/divisions/{division}', [DivisionController::class, 'update'])->name('divisions.update');
Route::delete('/divisions/{division}', [DivisionController::class, 'destroy'])->name('divisions.destroy');
Route::get('/divisions/{division}', [DivisionController::class, 'show'])->name('divisions.show');

// Division members (nested routes) — NOTE: no repeated '/divisions' inside group
Route::prefix('divisions/{division}')->group(function () {
    Route::get('members/create', [DivisionMemberController::class, 'create'])
        ->name('division_members.create');

    Route::post('members', [DivisionMemberController::class, 'store'])
        ->name('division_members.store');

    Route::get('members/{member}/edit', [DivisionMemberController::class, 'edit'])
        ->name('division_members.edit');

    Route::put('members/{member}', [DivisionMemberController::class, 'update'])
        ->name('division_members.update');

    Route::delete('members/{member}', [DivisionMemberController::class, 'destroy'])
        ->name('division_members.destroy');
});


