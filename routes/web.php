<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\WebHomeController;
use App\Http\Controllers\WebAboutUsController;
use App\Http\Controllers\WebBookingController;
use App\Http\Controllers\WebContactUsController;
use App\Http\Controllers\WebProfileController;
use App\Http\Controllers\WebCustomerController;
use App\Http\Controllers\WebEventController;
use App\Http\Controllers\WebPackageController;
use App\Http\Controllers\WebSampleWorkController;
use App\Models\Appointment;
use App\Models\Package;

// //Backend

Route::group(['prefix' => 'admin'], function ()           //prefix
{
      //Login-Logout 
      Route::get('/login', [UserController::class, 'login'])->name('admin.login');
      Route::post('/do-login', [UserController::class, 'doLogin'])->name('admin.do.login');
      Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');


      Route::group(['middleware' => 'auth'], function () {                       //auth

            // Route::get('/', [HomeController::class, 'admin']);
            Route::get('/', [HomeController::class, 'homePage'])->name('admin.home.page');

            //  Events->

            Route::get('/event/list', [EventController::class, 'eventList'])->name('admin.event.list');

            Route::get('/create/event', [EventController::class, 'createEvent'])->name('admin.create.event');
            Route::post('/event/store', [EventController::class, 'eventStore'])->name('admin.event.store');

            Route::get('/event/edit/{event_id}', [EventController::class, 'eventEdit'])->name('admin.event.edit');
            Route::put('/event/update/{event_id}', [EventController::class, 'eventUpdate'])->name('admin.event.update');
            Route::get('/event/delete/{event_id}', [EventController::class, 'eventDelete'])->name('admin.event.delete');

            //Services->

            Route::get('/service/list', [ServiceController::class, 'servicelist'])->name('admin.service.list');

            Route::get('/create/service', [ServiceController::class, 'createService'])->name('admin.create.service');
            Route::post('/service/store', [ServiceController::class, 'serviceStore'])->name('admin.service.store');

            Route::get('/service/edit/{service_id}', [ServiceController::class, 'serviceEdit'])->name('admin.service.edit');
            Route::put('/service/update/{service_id}', [ServiceController::class, 'serviceUpdate'])->name('admin.service.update');
            Route::get('/service/delete/{service_id}', [ServiceController::class, 'serviceDelete'])->name('admin.service.delete');


            //Packages


            Route::get('/package/list', [PackageController::class, 'packageList'])->name('admin.package.list');

            Route::get('/create/package', [PackageController::class, 'createPackage'])->name('admin.create.package');
            Route::post('/package/store', [PackageController::class, 'packageStore'])->name('admin.package.store');

            Route::get('/package/edit/{package_id}', [PackageController::class, 'packageEdit'])->name('admin.package.edit');
            Route::put('/package/update/{package_id}', [PackageController::class, 'packageUpdate'])->name('admin.package.update');
            Route::get('/package/delete/{package_id}', [PackageController::class, 'packageDelete'])->name('admin.package.delete');


            //Packages service       

            Route::get('/package/service/list', [PackageServiceController::class, 'packageServiceList'])->name('admin.package.service.list');
            Route::get('/package/service/event', [PackageServiceController::class, 'packageServiceEvent'])->name('admin.package.service.event');

            Route::get('/package/service/create/{id}', [PackageServiceController::class, 'packageServiceCreate'])->name('admin.package.service.create');
            Route::post('/package/service/store', [PackageServiceController::class, 'packageServiceStore'])->name('admin.package.service.store');

            Route::get('/package/service/delete/{p_s_id}', [PackageServiceController::class, 'packageServiceDelete'])->name('admin.package.service.delete');


            //Bookings-> 

            Route::get('/booking/list', [BookingController::class, 'bookingList'])->name('admin.booking');
            Route::get('/booking/accept/{id}', [BookingController::class, 'accept'])->name('admin.accept.booking');
            Route::get('/booking/reject/{id}', [BookingController::class, 'reject'])->name('admin.reject.booking');
            Route::get('/search/booking', [BookingController::class, 'search'])->name('admin.search.booking');
            


            // //Payments->

            // Route::get('/payment/details', [PaymentController::class, 'paymentDetails'])->name('admin.payment.details');

            // Route::get('/create/payment', [PaymentController::class, 'createPayment'])->name('create.payment');
            // Route::post('/payment/details/store', [PaymentController::class, 'paymentDetailsStore'])->name('admin.payment.details.store');


            //Appointments->

            Route::get('/appointment/details', [AppointmentController::class, 'appointmentDetails'])->name('admin.appointment.details');
            Route::get('/appointment/accept/{id}', [AppointmentController::class, 'accept'])->name('admin.accept.appointment');
            Route::get('/appointment/reject/{id}', [AppointmentController::class, 'reject'])->name('admin.reject.appointment');
            Route::get('/search/appointment', [AppointmentController::class, 'search'])->name('admin.search.appointment');

            //Customers->

            Route::get('/customer/list', [WebCustomerController::class, 'customerList'])->name('admin.customer.list');
            Route::get('/delete/customer', [WebCustomerController::class, 'deleteCustomer'])->name('admin.delete.customer');
      });
});

// //Frontend 

//Home Page
      Route::get('/', [WebHomeController::class, 'home'])->name('home.page');

//Registration
      Route::get('/registration', [WebCustomerController::class, 'registration'])->name('registration');
      Route::post('/do-registration', [WebCustomerController::class, 'doRegistration'])->name('do-registration');

//Sample Work

      Route::get('/sample/work', [WebSampleWorkController::class, 'sampleWork'])->name('sample.work');



//packages      
       Route::get('/all/events', [WebPackageController::class, 'allEvents'])->name('all.events');

       Route::get('/all/packages/{id}', [WebPackageController::class, 'allPackages'])->name('all.packages');
       Route::get('/all/packages/services/details/{id}', [WebPackageController::class, 'allPackagesDetails'])->name('all.packages.services.details');
 
//Login-Logout 
      Route::get('/login', [WebCustomerController::class, 'login'])->name('login');
      Route::post('/do-login', [WebCustomerController::class, 'doLogin'])->name('do.login');

      Route::group(['middleware' => 'customerAuth'], function () {

      Route::get('/logout', [WebCustomerController::class, 'logout'])->name('logout');

      //Profile
      Route::get('/view/profile', [WebProfileController::class, 'viewProfile'])->name('view.profile');
      Route::get('/edit/profile', [WebProfileController::class, 'editProfile'])->name('edit.profile');
      Route::put('/update/profile', [WebProfileController::class, 'updateProfile'])->name('update.profile');
      Route::get('/delete/profile', [WebProfileController::class, 'deletetProfile'])->name('delete.profile');
      Route::get('/make-payment/{id}',[WebProfileController::class,'makePayment'])->name('make.payment');




      //Appointments 
      Route::get('/create/appointment', [AppointmentController::class, 'createAppointment'])->name('create.appointment');
      Route::post('/appointment/details/store', [AppointmentController::class, 'appointmentDetailsStore'])->name('appointment.details.store');



      //Booking

      Route::get('/booking/form/{id}', [WebBookingController::class, 'bookingForm'])->name('booking.form');
      Route::post('/booking/store', [WebBookingController::class, 'bookingStore'])->name('booking.store');
      Route::get('/cancel/booking/{id}', [WebBookingController::class, 'cancelBooking'])->name('cancel.booking');
      Route::get('/download-receipt/{id}', [WebBookingController::class, 'downloadReceipt'])->name('download.receipt');

      // SSLCOMMERZ Start

      Route::post('/success', [SslCommerzPaymentController::class, 'success']);

      Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
      Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

      Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
      //SSLCOMMERZ END


      // Route::get('/demo', [HomeController::class, 'demo'])->name('demo');

});
