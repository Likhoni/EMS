<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Frontend\WebHomeController;
use App\Http\Controllers\Frontend\WebAboutUsController;
use App\Http\Controllers\Frontend\WebContactUsController;
use App\Http\Controllers\Frontend\WebProfileController;
use App\Http\Controllers\Frontend\WebCustomerController;
use App\Http\Controllers\Frontend\WebEventController;

 // //Backend

Route::group(['prefix'=>'admin'],function()           //prefix
{
     //Login-Logout 
           Route::get('/login',[UserController::class,'login'])->name('admin.login');
           Route::post('/do-login',[UserController::class,'doLogin'])->name('admin.do.login');
           Route::get('/logout',[UserController::class,'logout'])->name('admin.logout');
  
           
       Route::group(['middleware'=>'auth'],function(){                       //auth
                  
           Route::get('/',[HomeController::class,'admin']);
           Route::get('/home/Page',[HomeController::class,'homePage'])->name('admin.home.page');
    
     //  Events->

           Route::get('/event/list',[EventController::class,'eventList'])->name('admin.event.list');

           Route::get('/create/event',[EventController::class,'createEvent'])->name('admin.create.event');
           Route::post('/event/store',[EventController::class,'eventStore'])->name('admin.event.store');  
    
           Route::get('/event/view/{event_id}',[EventController::class,'eventView'])->name('admin.event.view');
           Route::get('/event/edit/{event_id}',[EventController::class,'eventEdit'])->name('admin.event.edit');
           Route::post('/event/update/{event_id}',[EventController::class,'eventUpdate'])->name('admin.event.update');
           Route::get('/event/delete/{event_id}',[EventController::class,'eventDelete'])->name('admin.event.delete');

     //Services->

           Route::get('/service/list',[ServiceController::class,'servicelist'])->name('admin.service.list');

           Route::get('/create/service',[ServiceController::class,'createService'])->name('admin.create.service');
           Route::post('/service/store',[ServiceController::class,'serviceStore'])->name('admin.service.store');
    
     
    //Bookings-> 

           Route::get('/booking/details',[BookingController::class,'bookingDetails'])->name('admin.booking.details');

           Route::get('/create/booking',[BookingController::class,'createBooking'])->name('create.booking');
           Route::post('/booking/details/store',[BookingController::class,'bookingDetailsStore'])->name('admin.booking.details.store');


    //Payments->

           Route::get('/payment/details',[PaymentController::class,'paymentDetails'])->name('admin.payment.details');
    
           Route::get('/create/payment',[PaymentController::class,'createPayment'])->name('create.payment');
           Route::post('/payment/details/store',[PaymentController::class,'paymentDetailsStore'])->name('admin.payment.details.store');


    //Appointments->

           Route::get('/appointment/details',[AppointmentController::class,'appointmentDetails'])->name('admin.appointment.details');
           Route::get('/create/appointment',[AppointmentController::class,'createAppointment'])->name('create.appointment');
           Route::post('/appointment/details/store',[AppointmentController::class,'appointmentDetailsStore'])->name('admin.appointment.details.store');


   });
      

});

   // //Frontend 
          
         //Home Page
           Route::get('/',[WebHomeController::class,'home'])->name('home.page');

         //Registration
           Route::get('/registration',[WebCustomerController::class,'registration'])->name('registration');
           Route::post('/do-registration',[WebCustomerController::class,'doRegistration'])->name('do-registration');
        
         //Login-Logout 
           Route::get('/login',[WebCustomerController::class,'login'])->name('login');
           Route::post('/do-login',[WebCustomerController::class,'doLogin'])->name('do.login');
           Route::get('/logout',[WebCustomerController::class,'logout'])->name('logout');

         //Profile
           Route::get('/view/profile/{id}',[WebProfileController::class,'viewProfile'])->name('view.profile');


