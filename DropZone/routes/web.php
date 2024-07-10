<?php
use App\Http\Controllers\DropZoneController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Route::get('/', [DropZoneController::class,'index']);
Route::get('/', function() {
    return view('welcome');
});
Route::view('drop-zone','DropZone.index');
Route::post('/drop-zone',[DropZoneController::class,'upload']);