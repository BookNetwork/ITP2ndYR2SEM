<?php

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

//---------------- FAZLAN --------------////////////////////////////////////// / / fazlan  / ////////////////////////////////// / fazlan / ///////////////////////////////////
Route::get('/mainPage', function () {
    return view('mainPage.mainPage');
});
Route::get('/staff', function () {
    return view('fazlan.staff');
});
Route::get('/staff_Register', function () {
    return view('fazlan.staff_Register.staff_register');
});
Route::get('/staff_Details', function () {
    return view('fazlan.staff_details.staff_Details');
});
Route::get('/staff_Attendence', function () {
    return view('fazlan.Attendence.display_attendence');
});
Route::get('/staff_Search', function () {
    return view('fazlan.search_staff.staff_search');
});
Route::get('/staff_AcademicReg', function () {
    return view('fazlan.staff_Register.staff_register');
});
Route::get('/staff_NonAcademicReg', function () {
    return view('fazlan.staff_Register.staff_nonAcademic');
});
Route::get('/staff_salaryMgt', function () {
    return view('fazlan.staff_salaryMng.staff_SalaryMng');
});
Route::get('/staff_promotion', function () {
    return view('fazlan.staff_promotion.staff_promotion');
});
Route::get('/staff_salaryGen', function () {
    return view('fazlan.staff_salaryMng.staff_SalaryGen');
});
Route::get('/staff_Loan', function () {
    return view('fazlan.staff_loan.staff_loan');
});
Route::get('/staff_Principal', function () {
    return view('fazlan.staff_principal.staff_Principal');
});
Route::get('/staff_presentDetails', function () {
    return view('fazlan.staff_principal.staff_presentDetails');
});
Route::get('/staff_principal_loan', function () {
    return view('fazlan.staff_principal.staff_loan_principal');
});
Route::get('/staff_principal_leave', function () {
    return view('fazlan.staff_principal.staff_principal_leave');
});
Route::get('/staff_principal_search', function () {
    return view('fazlan.staff_principal.staff_principal_search');
});
Route::get('/staff_staffDetails', function () {
    return view('fazlan.staff_principal.principalShowStaffDetails');
});
Route::get('/staff_admin', function () {
    return view('fazlan.staff_admin.staff_admin');
});
Route::get('/staff_admin_salary', function () {
    return view('fazlan.staff_admin.staff_admin_salary');
});
Route::get('/staff_principal_reg', function () {
    return view('fazlan.staff_admin.staff_principal_reg');
});
Route::get('/staff_admin_reSetPassword', function () {
    return view('fazlan.staff_admin.staff_admin_reSetPassword');
});
Route::get('/staff_edit', function () {
    return view('fazlan.staff_details.staff_edit');
});
Route::get('/staffSalaryGen', function () {
    return view('fazlan.staff_salaryMng.staff_salaryGen');
});
Route::get('/printSal', function () {
    return view('fazlan.staff_salaryMng.printSal');
});
Route::get('/staff_adminReg', function () {
    return view('fazlan.staff_Register.adminReg');
});
///////STAFF--Controllers
//Academic
Route::post('/save_academic', 'acaStaffController@save_academic');
Route::post('/staff_aca_promotion', 'acaStaffController@staff_aca_promotion');
//nonAcademic
Route::post('/save_nonAcademic', 'nonAcaStaffController@save_nonAcademic');
Route::post('/staff_NONaca_promotion', 'nonAcaStaffController@staff_NONaca_promotion');
// staff
Route::post('/staff_remove_details', 'staffController@staff_remove_details');
Route::post('/principalReg', 'staffController@principalReg');
Route::post('/staff_Attendence', 'staffController@attendence');
Route::post('/attendence', 'staffController@attendence');//this is the ajex thing to be coded
//salary
Route::post('/save_admin_Asal_details', 'SalaryController@save_admin_Asal_details');
Route::post('/save_admin_Asal_rm_details', 'SalaryController@save_admin_Asal_rm_details');
Route::post('/save_admin_NAsal_details', 'SalaryController@save_admin_NAsal_details');
Route::post('/save_admin_NAsal_rm_details', 'SalaryController@save_admin_NAsal_rm_details');
Route::post('/save_admin_funds', 'SalaryController@update_Fund');
Route::post('/update_acaSalary', 'SalaryController@update_acaSalary');
Route::post('/update_nonAcaSalary', 'SalaryController@update_nonAcaSalary');
//Loan
Route::post('/save_loan_details', 'LoanController@save_loan_details');
//admin
Route::post('/restPASS', 'AdminController@restPASS');
Route::post('/save_admin', 'staffAdminController@saveAdmin');
//details_edit
Route::post('/name_edit', 'staffDetails_EditController@name_edit');
Route::post('/perAddr_edit', 'staffDetails_EditController@perAddr_edit');
Route::post('/curAddr_edit', 'staffDetails_EditController@curAddr_edit');
Route::post('/nic_edit', 'staffDetails_EditController@nic_edit');
Route::post('/phone_edit', 'staffDetails_EditController@phone_edit');
Route::post('/email_edit', 'staffDetails_EditController@email_edit');
/////////////////////// sample----
//sample
Route::get('/sample', function () {
    return view('fazlan.sample.sample');
});
Route::post('/mail', 'sampleController@mail');
////  fazlan end  ////////////////////////////////////////////////////  fazlan end  ///////////////////////////////////////  FAzlan enddd  ////////////////////////////

/////////////////////////////////////pavithra///////////////////////////////


Route::get('/exam', function () {
    return view('pavithra.exam');
});
Route::get('/exam_principal', function () {
    return view('pavithra.principal.showProgress');
});
Route::get('/exam_showClass', function () {
    return view('pavithra.acaStaff.showClass');
});
Route::get('/showClassDetails', function () {
    return view('pavithra.acaStaff.showClassDetails');
});
Route::get('/addMarks', function () {
    return view('pavithra.marks.addMarks');
});
Route::get('/exam_admin', function () {
    return view('pavithra.admin.viewAdmin');
});
Route::get('/addSubject', function () {
    return view('pavithra.admin.manageSubject');
});
Route::get('/studentMarks', function () {
    return view('pavithra.marks.studentMarks');
});



















Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
