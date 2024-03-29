<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProtocolController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Student routes
Route::post('/addStudent', [StudentController::class, 'createStudent']);
Route::get('/addStudent/{id}', [StudentController::class, 'readStudent']);
Route::get('/addStudent', [StudentController::class, 'readStudents']);
Route::put('/addStudent/{id}', [StudentController::class, 'updateStudent']);
Route::delete('/addStudent/{id}', [StudentController::class, 'deleteStudent']);

// Staff routes
Route::post('/addStaff', [StaffController::class, 'createStaff']);
Route::get('/addStaff/{id}', [StaffController::class, 'readStaff']);
Route::get('/addStaff', [StaffController::class, 'readStaffs']);
Route::put('/addStaff/{id}', [StaffController::class, 'updateStaff']);
Route::delete('/addStaff/{id}', [StaffController::class, 'deleteStaff']);

// Protocol routes
Route::post('/addProtocol', [ProtocolController::class, 'createProtocol']);
Route::get('/addProtocol/{id}', [ProtocolController::class, 'readProtocol']);
Route::get('/addProtocol', [ProtocolController::class, 'readProtocols']);
Route::put('/addProtocol/{id}', [ProtocolController::class, 'updateProtocol']);
Route::delete('/addProtocol/{id}', [ProtocolController::class, 'deleteProtocol']);

// Users routers
Route::get('/users', [UsersController::class, 'getUsers']);
Route::get('/searchUsers', [UsersController::class, 'searchUsers']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
