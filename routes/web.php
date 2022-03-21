<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use App\Http\Controllers\Admin\FacultyController;

use Illuminate\Support\Facades\Route;





Route::middleware('Admin')->prefix('dashboard')->group(function ()
{
    Route::get('/showcontact',  [App\Http\Controllers\Admin\AdminHome::class, 'showcontact']);
    Route::get('/profile',  [App\Http\Controllers\Admin\AdminHome::class, 'updateprofile']);
    Route::post('/changepassword',  [App\Http\Controllers\Admin\AdminHome::class, 'changepassword']);
    Route::get('/company-profile',  [App\Http\Controllers\Admin\AdminHome::class, 'editCompanyProfile']);
    Route::post('/company-profile/update',  [App\Http\Controllers\Admin\AdminHome::class, 'updateCompanyProfile']);
    
    Route::get('/home', [App\Http\Controllers\Admin\AdminHome::class, 'index'])->name('adminhome');
    Route::get('/adminhome', [App\Http\Controllers\Admin\AdminHome::class, 'index'])->name('adminhome');
    Route::get('/', [App\Http\Controllers\Admin\AdminHome::class, 'index'])->name('adminhome');

    Route::get('/allusers', [App\Http\Controllers\site\Verifyer::class, 'adminallusers'])->name('adminallusers');
    Route::post('/users/insert', [App\Http\Controllers\site\Verifyer::class, 'insertusers'])->name('insertusers'); 

    Route::get('/activeusers', [App\Http\Controllers\site\Verifyer::class, 'adminactiveusers'])->name('adminactiveusers');
    Route::get('/notactiveusers', [App\Http\Controllers\site\Verifyer::class, 'adminnotactiveusers'])->name('adminnotactiveusers');
    Route::get('/users/active/{id}/{user_id}', [App\Http\Controllers\site\Verifyer::class, 'activiate'])->name('activiate');


                //    ##REVIEWS

    Route::get('/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'viewAll'])->name('all-Reviews');
    Route::get('/review/delete/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'deleteReview'])->name('delete-review');



    //    ######### sections

    Route::get('/sections', [App\Http\Controllers\Admin\SectionController::class, 'index'])->name('all-sections');
    Route::get('/section/add', [App\Http\Controllers\Admin\SectionController::class, 'add'])->name('add-section');
    Route::post('/section/insert', [App\Http\Controllers\Admin\SectionController::class, 'addSection'])->name('insert-section');
    Route::get('/section/edit/{id}', [App\Http\Controllers\Admin\SectionController::class, 'edit'])->name('edit-section');
    Route::post('/section/edit/{id}', [App\Http\Controllers\Admin\SectionController::class, 'updated']);
    Route::get('/section/delete/{sec_id}', [App\Http\Controllers\Admin\SectionController::class, 'deleteSection'])->name('delete-section');
 //    ######### sections

    Route::get('/portfolio', [App\Http\Controllers\Admin\PortfolioController::class, 'index'])->name('all-portfolio');
    Route::get('/portfolio/add', [App\Http\Controllers\Admin\PortfolioController::class, 'add'])->name('add-portfolio');
    Route::post('/portfolio/insert', [App\Http\Controllers\Admin\PortfolioController::class, 'addPortfolio'])->name('insert-portfolio');
    Route::get('/portfolio/edit/{id}', [App\Http\Controllers\Admin\PortfolioController::class, 'edit'])->name('edit-portfolio');
    Route::post('/portfolio/edit/{id}', [App\Http\Controllers\Admin\PortfolioController::class, 'updated']);
    Route::get('/portfolio/delete/{id}', [App\Http\Controllers\Admin\PortfolioController::class, 'deletePortfolio'])->name('delete-portfolio');

  //    ######### contents

    Route::get('/contents', [App\Http\Controllers\Admin\ContentController::class, 'index'])->name('all-contents');
    Route::get('/content/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('edit-content');
    Route::post('/content/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'updated']);
    Route::get('/content/delete/{sec_id}', [App\Http\Controllers\Admin\SectionController::class, 'deleteContent'])->name('delete-section');



 //    ######### Courses

    Route::get('/courses/show/{section_id}', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('all-courses');
    Route::get('/courses/students/show/{course_id}', [App\Http\Controllers\Admin\CourseController::class, 'allUsers'])->name('all-studnts-courses');
    Route::get('/course/add/{sec_id}', [App\Http\Controllers\Admin\CourseController::class, 'add'])->name('add-course');
    Route::post('/course/insert', [App\Http\Controllers\Admin\CourseController::class, 'insert'])->name('insert-course');
    Route::get('/course/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('edit-course');
    Route::post('/course/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'updated']);
    Route::get('/courses/delete/{section_id}/{course_id}', [App\Http\Controllers\Admin\CourseController::class, 'deleteCourse'])->name('delete-course');
    Route::get('/course/student/delete/{course_id}/{user_id}', [App\Http\Controllers\Admin\CourseController::class, 'deleteStudentRegisterdCourse'])->name('delete-student-course');


    Route::post('course/store', [App\Http\Controllers\Admin\CourseController::class,'courseStore'])->name('ajax.course.store');
    Route::post('course/student/register', [App\Http\Controllers\Admin\CourseController::class,'RegisterStudToCourse'])->name('ajax.student.course.store');

    ###### students

    Route::get('/students/all/{sec_id}', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('all-students');
    Route::get('/student/profile/{id}', [App\Http\Controllers\Admin\StudentController::class, 'profile'])->name('student-profile');
    Route::get('/students/add', [App\Http\Controllers\Admin\StudentController::class, 'add'])->name('add-student');
    Route::post('/student/insert', [App\Http\Controllers\Admin\StudentController::class, 'addStudent'])->name('insert-student');
    Route::get('/student/edit/{id}', [App\Http\Controllers\Admin\StudentController::class, 'edit'])->name('edit-student');
    Route::post('/student/edit/{id}', [App\Http\Controllers\Admin\StudentController::class, 'updated']);
    Route::get('/student/delete/{id}', [App\Http\Controllers\Admin\StudentController::class, 'deleteStudent'])->name('delete-student');
    Route::get('/students/UnRegisterdInSection/', [App\Http\Controllers\Admin\StudentController::class, 'unRegisteredStudents'])->name('unRegistered-student');


    ############ services

    Route::get('/service/add', [App\Http\Controllers\Admin\services::class, 'addservice'])->name('addservice');
    Route::post('/service/insert', [App\Http\Controllers\Admin\services::class, 'insertservice'])->name('insertservice');
    Route::get('/service/edit/{id}', [App\Http\Controllers\Admin\services::class, 'editservice'])->name('editservice');
    Route::post('/service/update', [App\Http\Controllers\Admin\services::class, 'updateservice'])->name('updateservice');
    Route::get('/service/view', [App\Http\Controllers\Admin\services::class, 'view'])->name('view');
    Route::get('/service/delete/{id}', [App\Http\Controllers\Admin\services::class, 'deleteservice'])->name('deleteservice');

    ############ services

    Route::get('/stats/add', [App\Http\Controllers\Admin\StatsController::class, 'add'])->name('addstats');
    Route::post('/stats/insert', [App\Http\Controllers\Admin\StatsController::class, 'insert'])->name('insertsstats');
    Route::get('/stats/edit/{id}', [App\Http\Controllers\Admin\StatsController::class, 'edit'])->name('editstats');
    Route::post('/stats/update/{id}', [App\Http\Controllers\Admin\StatsController::class, 'update'])->name('updatestats');
    Route::get('/stats/view', [App\Http\Controllers\Admin\StatsController::class, 'view'])->name('view');
    Route::get('/stats/delete/{id}', [App\Http\Controllers\Admin\StatsController::class, 'delete'])->name('deletestats');

    ############ events

    Route::get('/event/add', [App\Http\Controllers\Admin\events::class, 'addevent'])->name('addevent');
    Route::post('/event/insert', [App\Http\Controllers\Admin\events::class, 'insertevent'])->name('insertevent');
    Route::get('/event/edit/{id}', [App\Http\Controllers\Admin\events::class, 'editevent'])->name('editevent');
    Route::post('/event/update', [App\Http\Controllers\Admin\events::class, 'updateevent'])->name('updateevent');
    Route::get('/event/view', [App\Http\Controllers\Admin\events::class, 'view'])->name('view');
    Route::get('/event/delete/{id}', [App\Http\Controllers\Admin\events::class, 'deleteevent'])->name('deleteevent');


    ############ OURTEAM

    Route::get('/ourteam/add', [App\Http\Controllers\Admin\ourteamController::class, 'add'])->name('add-ourteam');
    Route::post('/ourteam/insert', [App\Http\Controllers\Admin\ourteamController::class, 'insert'])->name('insert-ourteam');
    Route::get('/ourteam/edit/{id}', [App\Http\Controllers\Admin\ourteamController::class, 'edit'])->name('edit-ourteam');
    Route::post('/ourteam/update/{id}', [App\Http\Controllers\Admin\ourteamController::class, 'update'])->name('update-ourteam');
    Route::get('/ourteam', [App\Http\Controllers\Admin\ourteamController::class, 'view'])->name('view');
    Route::get('/ourteam/delete/{id}', [App\Http\Controllers\Admin\ourteamController::class, 'delete'])->name('delete-ourteam');


    ############ PATRNERS

    Route::get('/partner/add', [App\Http\Controllers\Admin\PartnerController::class, 'add'])->name('add-partner');
    Route::post('/partner/insert', [App\Http\Controllers\Admin\PartnerController::class, 'insert'])->name('insert-partner');
    Route::get('/partner/edit/{id}', [App\Http\Controllers\Admin\PartnerController::class, 'edit'])->name('edit-partner');
    Route::post('/partner/update/{id}', [App\Http\Controllers\Admin\PartnerController::class, 'update'])->name('update-partner');
    Route::get('/partners', [App\Http\Controllers\Admin\PartnerController::class, 'view'])->name('view');
    Route::get('/partner/delete/{id}', [App\Http\Controllers\Admin\PartnerController::class, 'delete'])->name('delete-partner');

    ############ Results

//    Route::get('/result/add', [App\Http\Controllers\Admin\ResultController::class, 'addResult'])->name('addResult');
//    Route::post('/result/insert', [App\Http\Controllers\Admin\ResultController::class, 'insertResult'])->name('insertResult');
//    Route::get('/result/edit/{id}', [App\Http\Controllers\Admin\ResultController::class, 'editResult'])->name('editResult');
//    Route::post('/result/update/{id}', [App\Http\Controllers\Admin\ResultController::class, 'updateResult'])->name('updateResult');
//    Route::get('/result/delete/{id}', [App\Http\Controllers\Admin\ResultController::class, 'deleteResult'])->name('deleteResult');

    Route::get('/result_dependent/add', [App\Http\Controllers\Admin\ResultController::class,'add']);
    Route::post('/result_dependent/insert', [App\Http\Controllers\Admin\ResultController::class,'insertResult']);
    Route::post('result_dependent/fetch', [App\Http\Controllers\Admin\ResultController::class,'fetch'])->name('result.fetch');
    Route::post('result_dependent/delete', [App\Http\Controllers\Admin\ResultController::class,'deleteResult'])->name('result.delete');

});

Auth::routes();

//Route::get('/dashboard/login', [App\Http\Controllers\Admin\AdminLogin::class, 'index'])->name('adminlogin');
//Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm']);
Route::get('/logout', [App\Http\Controllers\site\UserController::class, 'logout'])->name('adminlogout');
Route::get('/dashboard/logout', [App\Http\Controllers\site\UserController::class, 'logout']);

//Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');




######


Route::get('/', [App\Http\Controllers\site\HomeController::class, 'home'])->name('sitehome');
Route::get('/home', [App\Http\Controllers\site\HomeController::class, 'home'])->name('sitehome');
Route::post('/search', [App\Http\Controllers\site\HomeController::class, 'searchResult'])->name('searchResult');



Route::get('/password/reset', function () {
    return view('auth.passwords.confirm');
})->name('dashboard');




//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');


//Route::get('/test', [App\Http\Controllers\testController::class, 'index'])->name('test');
