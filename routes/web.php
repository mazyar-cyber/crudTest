<?php

use App\Http\Controllers\admin\adminCustomerController;
use Illuminate\Support\Facades\Route;
use libphonenumber\PhoneNumberUtil;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.layouts.master');
    });
    Route::resource('customer', adminCustomerController::class);
});

Route::get('test', function () {
    // $phoneNumber = '0989914807848';
    // $phoneUtil = PhoneNumberUtil::getInstance();
    // return $parseData = $phoneUtil->parse($phoneNumber, "IR");
    // return ($phoneUtil->isPossibleNumber($phoneNumber));
    $swissNumberStr = "3122 213 2965";
    $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
    return $phoneUtil->getSupportedRegions();
    $swissNumberProto = $phoneUtil->parse($swissNumberStr, "TR");
    // try {
    //     $swissNumberProto = $phoneUtil->parse($swissNumberStr, "CH");
    //     var_dump($swissNumberProto);
    // } catch (\libphonenumber\NumberParseException $e) {
    //     var_dump($e);
    // }
    $isValid = $phoneUtil->isValidNumber($swissNumberProto);
    if ($isValid) {
        // return $phoneUtil->getRegionCodeForNumber($swissNumberProto);
        return $isValid;
    } else {
        return 'it is false';
    }
    return ($isValid); // true
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout',function(){
    Auth::logout();
    return redirect()->to('/');
});
