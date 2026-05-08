<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{
    DashboardController,
    HospitalController,
    UserController,
    DepartmentController,
    ServiceController,
    EmployeeController,
    DoctorController,
    PatientController,
    AppointmentController,
    RoleController,
    PackageController,
    InvoiceController,
    OpdController,
    TestController,
    ReferenceTestController,
    MicrobiologyController,
    HaematologyController,
    ImmunologyController,
    ExaminationController,
    BiochemistryController,
    StainController,
    ReportController,
    ResultController,
    AccountController,
    AppController,
    DiseaseController,
    DoctorApiController,
    MedicineController,
    PatientServiceController,
    ServicePackageController
};
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

/*
|--------------------------------------------------------------------------
| Simple route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth_user'])->group(function () {
    Route::get('/login', function(){
        return view('auth.login');
    })->name('auth.login');
    
    Route::post('login', [LoginController::class,'login'])->name('post.login');
});

Route::get('/amount', function () {
    $services = Service::all();

    foreach ($services as $service) {
        $service->update([
            'amount' => $service->amount * 20 / 21
        ]);
    }

    return 'Complete';
});


Route::get('/invoice/calculate', [InvoiceController::class, 'calculate']);
Route::get('/days/{id}', [DoctorApiController::class, 'getDays']);


/*
|--------------------------------------------------------------------------
| Auth Middleware Group
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','custom_session_middleware'])->group(function () {

    Route::get('/logout', function(){
        Session::flush();
        return redirect()->route('auth.login');
    })->name('auth.logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])
        ->name('pages.index');

    // Appointment
    Route::resource('appointment', AppointmentController::class);
    Route::get('appointments', [AppointmentController::class,'index'])->name('pages.appointments');
    Route::get('addAppointment', [AppointmentController::class,'addAppointment'])->name('pages.addAppointment');
    Route::get('updateAppointment', [AppointmentController::class,'updatePage'])->name('pages.updateAppointment');
    Route::post('updateAppointment', [AppointmentController::class,'updateAppointment'])->name('post.updateAppointment');
    Route::get('getDoctorFee', [AppointmentController::class, 'getDoctorFee'])->name('get.getDoctorFee');

    // Doctor
    Route::resource('doctor', DoctorController::class);
    Route::get('doctors', [DoctorController::class,'index'])->name('pages.doctors');
    Route::get('updateDoctor', [DoctorController::class,'updatePage'])->name('pages.updateDoctor');
    Route::post('updateDoctor', [DoctorController::class,'updateData'])->name('post.updateDoctor');

    // Patient
    Route::resource('patient', PatientController::class);
    Route::get('patients', [PatientController::class,'index'])->name('pages.patients');
    Route::get('updatePatient', [PatientController::class,'updatePage'])->name('pages.updatePatient');
    Route::post('updatePatient', [PatientController::class,'updateData'])->name('post.updatePatient');

    // Disease
    Route::get('diseases', [DiseaseController::class,'index'])->name('pages.diseases');
    Route::get('updateDisease', [DiseaseController::class,'updatePage'])->name('pages.updateDisease');
    Route::post('updateDisease', [DiseaseController::class,'updateData'])->name('post.updateDisease');

    // Service
    Route::get('services', [ServiceController::class,'index'])->name('pages.services');
    Route::get('updateService', [ServiceController::class,'updatePage'])->name('pages.updateService');
    Route::post('updateService', [ServiceController::class,'updateData'])->name('post.updateService');

    // Patient Service
    Route::get('patientServices', [PatientServiceController::class,'index'])->name('pages.patientServices');
    Route::get('updatePatientService', [PatientServiceController::class,'updatePage'])->name('pages.updatePatientService');
    Route::post('updatePatientService', [PatientServiceController::class,'updateData'])->name('post.updatePatientService');

    // Service Package
    Route::get('servicePackage', [ServicePackageController::class,'index'])->name('pages.servicePackage');
    Route::get('updateServicePackage', [ServicePackageController::class,'updatePage'])->name('pages.updateServicePackage');
    Route::post('updateServicePackage', [ServicePackageController::class,'updateData'])->name('post.updateServicePackage');

    // Package
    // Package
    // Route::controller(PackageController::class)->prefix('package')->group(function () {
    //     Route::get('/', 'getIndex')->name('package.index');
    //     Route::post('/', 'store')->name('package.store');
    //     Route::post('edit', 'edit')->name('package.edit');
    //     Route::post('delete', 'delete')->name('package.delete');
    //     Route::post('sale', 'packageSale')->name('package.sale.store');
    //     Route::get('sale', 'sale')->name('package.sale');
    //     Route::get('sale/{id}', 'packageSales')->name('package.sales');
    // });
    Route::get('packages', [PackageController::class,'index'])->name('pages.packages');
    Route::get('updatePackage', [PackageController::class,'updatePage'])->name('pages.updatePackage');
    Route::post('updatePackage', [PackageController::class,'updateData'])->name('post.updatePackage');

    // Medicine
    Route::get('medicines', [MedicineController::class,'index'])->name('pages.medicines');
    Route::get('updateMedicine', [MedicineController::class,'updatePage'])->name('pages.updateMedicine');
    Route::post('updateMedicine', [MedicineController::class,'updateData'])->name('post.updateMedicine');

    // Employee
    Route::resource('employee', EmployeeController::class);
    Route::get('employees', [EmployeeController::class,'index'])->name('pages.employees');
    Route::get('updateEmployee', [EmployeeController::class,'updatePage'])->name('pages.updateEmployee');
    Route::post('updateEmployee', [EmployeeController::class,'updateData'])->name('post.updateEmployee');

    Route::resource('role', RoleController::class);

    // Hospital
    Route::get('backup', [HospitalController::class, 'backup'])
        ->name('hospital.backup');

    Route::get('setting', [HospitalController::class, 'setting'])
        ->name('hospital.setting');

    Route::post('hospital/update/{id}', [HospitalController::class, 'updateHospital'])
        ->name('hospital.update');

    Route::post('tax/update/{id}', [HospitalController::class, 'updateTax'])
        ->name('tax.update');

    Route::post('config/update', [HospitalController::class, 'updateConfig'])
        ->name('config.update');

    // User
    Route::resource('user', UserController::class);
    Route::post('user/edit', [UserController::class, 'edit']);
    Route::post('user/delete', [UserController::class, 'delete']);
    Route::post('change/password', [UserController::class, 'changePassword'])
        ->name('change.password');

    // Department
    Route::prefix('department')->controller(DepartmentController::class)->group(function () {
        Route::get('/', 'getIndex')->name('department.index');
        Route::post('add', 'store')->name('department.add');
        Route::post('edit', 'edit')->name('department.edit');
        Route::post('delete', 'delete')->name('department.delete');
    });

    // Service
    Route::prefix('service')->controller(ServiceController::class)->group(function () {
        Route::get('/', 'getIndex')->name('service.index');
        Route::post('add', 'store')->name('service.add');
        Route::post('edit', 'edit')->name('service.edit');
        Route::post('delete', 'delete')->name('service.delete');
    });

    // Package
    Route::controller(PackageController::class)->prefix('package')->group(function () {
        Route::get('/', 'getIndex')->name('package.index');
        Route::post('/', 'store')->name('package.store');
        Route::post('edit', 'edit')->name('package.edit');
        Route::post('delete', 'delete')->name('package.delete');
        Route::post('sale', 'packageSale')->name('package.sale.store');
        Route::get('sale', 'sale')->name('package.sale');
        Route::get('sale/{id}', 'packageSales')->name('package.sales');
    });

    // Invoice
    Route::controller(InvoiceController::class)->prefix('invoice')->group(function () {
        Route::get('/', 'index')->name('invoice.index');
        Route::post('/', 'store')->name('invoice.store');
        Route::get('patient/{patient_id}', 'patient')->name('invoice.patient');
        Route::get('remove/{id}', 'remove')->name('invoice.remove');
        Route::get('sales/{id}', 'tempSales')->name('invoice.sale');
        Route::get('opd/{id}', [OpdController::class, 'opdSales'])->name('invoice.opd');
        Route::get('report', 'report')->name('invoice.report');
        Route::get('duplicate/{id}', 'duplicate')->name('invoice.duplicate');
        Route::get('search', 'searchInvoice')->name('search.invoice');
        Route::post('return', 'invoiceReturn')->name('invoice.return');
    });

    // OPD
    Route::controller(OpdController::class)->group(function () {
        Route::get('opd', 'getindex')->name('opd.index');
        Route::post('opd', 'store')->name('opd.store');
    });

    // Test
    Route::controller(TestController::class)->prefix('test')->group(function () {
        Route::get('/', 'index')->name('test.index');
        Route::post('{id}/status', 'statusChange')->name('test.status');
        Route::post('add', 'store')->name('test.store');
        Route::post('edit', 'edit')->name('test.edit');
        Route::post('delete', 'delete')->name('test.delete');
    });

    // Reference Test
    Route::controller(ReferenceTestController::class)->group(function () {
        Route::get('reference', 'index')->name('reference.index');
        Route::post('reference', 'store')->name('reference.store');
        Route::post('reference/update', 'edit')->name('reference.update');
        Route::post('reference/delete', 'delete')->name('reference.delete');
    });

    // Microbiology Antibiotic
    Route::controller(MicrobiologyController::class)->group(function () {
        Route::post('antibiotic', 'storeAntibiotic')->name('antibiotic.store');
        Route::post('antibiotic/edit', 'editAntibiotic')->name('antibiotic.edit');
        Route::get('microbiology', 'index')->name('microbiology.index');
        Route::post('microbiology', 'store')->name('microbiology.store');
    });

    // Reports
    Route::controller(ReportController::class)->group(function () {
        Route::get('report', 'index')->name('report.index');
        Route::post('report/{id}/status', 'statusChange')->name('report.status');
        Route::get('report/edit/{id}', 'edit')->name('report.edit');
        Route::get('report/patient/{patient_id}', 'patient')->name('report.patient');
        Route::post('report/update', 'update')->name('report.update');
        Route::get('report/print/{id}', 'printReport')->name('report.print');
    });

    // Results
    Route::controller(ResultController::class)->group(function () {
        Route::get('result/test/{id}', 'getTest')->name('result.test');
        Route::get('result/tests/{id}', 'getTests')->name('result.tests');
        Route::post('result', 'store')->name('result.store');
        Route::post('result/edit', 'edit')->name('result.edit');
        Route::get('generate/report/{report_id}', 'generateReport')->name('report.generate');
        Route::get('result/comment/edit', 'editComment')->name('report.comment');
        Route::get('report/result/edit', [ReportController::class, 'editResult'])->name('report.result');
    });

    // Accounts
    Route::controller(AccountController::class)->prefix('account')->group(function () {
        Route::get('service', 'serviceReport')->name('account.service');
        Route::get('opd', 'opdReport')->name('account.opd');
        Route::get('package', 'packageReport')->name('account.package');
    });

    Route::get('trash', [AppController::class,'trash'])->name('app_action.trash');

    Route::post('changeStatus', [AppController::class,'changeStatus'])->name('app_action.changeStatus')->withoutMiddleware([VerifyCsrfToken::class]);
});