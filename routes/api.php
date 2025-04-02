<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExecutiveController;
use App\Http\Controllers\Api\HelpdeskController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


ROute::get('/test',[HomeController::class,'runCommands']);
 
Route::post('check-session', [AuthController::class, 'checkSession']);
Route::post('login', [AuthController::class, 'login']);

// Protected Routes

Route::group([
   "middleware" => ["auth:api"]
], function(){

    Route::get("logout", [AuthController::class, "logout"]);
    Route::post("get-banquets", [ExecutiveController::class, "getBanquets"]);
    Route::get("calender-details", [ExecutiveController::class, "calenderDetails"]);
    Route::post("get-bookings-by-date", [ExecutiveController::class, "getBookingsByDate"]);
    Route::get("get-slots", [ExecutiveController::class, "getSlots"]);
    Route::post("add-lead", [ExecutiveController::class, "addLead"]);
    Route::post("update-lead/{id}", [ExecutiveController::class, "updateLead"]);
    Route::get("get-lead-list", [ExecutiveController::class, "getLeadList"]);
    Route::get("get-food-menu", [ExecutiveController::class, "getFoodMenu"]);
    Route::get("get-extra-services", [ExecutiveController::class, "getExtraServices"]);
    Route::post("add-booking", [ExecutiveController::class, "addBooking"]);
    Route::post("update-booking/{id}", [ExecutiveController::class, "updateBooking"]);
    Route::get("get-booking-list", [ExecutiveController::class, "getBookingList"]);
    Route::post("calculate-total", [ExecutiveController::class, "calculateTotal"]);
    Route::get("company-details", [ExecutiveController::class, "companyDetails"]);
    Route::post("banquet-hall-details", [ExecutiveController::class, "banquetHallDetails"]);
    Route::get("edit-access", [ExecutiveController::class, "editAccess"]);
    Route::post("add-lead-follow-up", [ExecutiveController::class, "addLeadFollowUp"]);
    Route::post("add-payment-collection", [ExecutiveController::class, "addPaymentCollection"]);
    Route::get("get-notifications", [ExecutiveController::class, "getNotifications"]);
    Route::get("get-confirmed-leads", [ExecutiveController::class, "getConfirmedLeads"]);
    Route::post("get-lead-detail", [ExecutiveController::class, "getLeadDetail"]);
    Route::get("get-today-lead-followup-list", [ExecutiveController::class, "getTodayLeadFollowUpList"]);

    // Helpdesk
    Route::get('/search-mobile-number', [HelpdeskController::class, 'searchMobileNumber']);
    Route::post('/helpdesk-add-reason-for-visit', [HelpdeskController::class, 'storeReasonForVisit']);
    Route::get('/get-today-helpdesk-enquiry', [HelpdeskController::class, 'getTodayHelpdeskInquiry']);
    Route::get('/get-reason-of-visit', [HelpdeskController::class, 'getReasonOfVisit']);
    Route::get('/get-function-type', [HelpdeskController::class, 'getFunctionType']);
    Route::get('/get-task-type', [HelpdeskController::class, 'getTaskType']);
    Route::post('/edit-reason-for-visit/{id}', [HelpdeskController::class, 'editReasonForVisit']);
    Route::get('/get-all-data', [HelpdeskController::class, 'getAllData']);

    Route::get('/get-closed-reason', [LeadController::class, 'getClosedReason']);
    Route::post('/close-lead', [LeadController::class, 'closeLead']);
    Route::get('/lead-count', [LeadController::class, 'getLeadCount']);
    Route::get('/payment-followups', [LeadController::class, 'getPaymentFollowups']);
    
});


