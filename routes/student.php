
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Student\LoginController;
use App\Http\Controllers\Api\Student\StudentController;



####################### login student ######################
Route::middleware(['guest:web'])->group(function () {
  Route::post('/login',   [LoginController::class, 'studentLogin'])->name('login');
});


#################################  Student Controller  ###################################
Route::controller(StudentController::class)-> group(function () {
    Route::post('/how', 'howStudent');

});




