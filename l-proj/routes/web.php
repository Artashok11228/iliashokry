<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



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





class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];





Route::get('/', function () {
   return view('welcome');
});


Route::get('/test',function() {

        echo ("<h1>" . "Test" . "</h1>");
    });

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Routes for user login, registration, and logout
|
*/

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Registration Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Protected Routes (Require Authentication)
|--------------------------------------------------------------------------
|
| Routes that require the user to be authenticated
|
*/

Route::middleware(['auth'])->group(function () {
    // Home/Dashboard route (protected)
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Example protected route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile route (protected)
    Route::get('/profile', function () {
        return view('profile', ['user' => auth()->user()]);
    })->name('profile');
});

/*
|--------------------------------------------------------------------------
| Authorization Routes (Role-Based Access Control Example)
|--------------------------------------------------------------------------
|
| Routes that require specific permissions or roles
| Note: You'll need to implement role/permission logic in your User model
| and create middleware for role checking
|
*/

// Admin only routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');
});

// Manager routes
Route::middleware(['auth', 'role:manager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/', function () {
        return view('manager.dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Simple Authorization Check Example
|--------------------------------------------------------------------------
|
| Example of checking authorization in route closure
|
*/

Route::middleware(['auth'])->get('/admin-panel', function () {
    // Check if user has admin role (you'll need to implement this in your User model)
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }
    
    return view('admin.panel');
})->name('admin.panel');
