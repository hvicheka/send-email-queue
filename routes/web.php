<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('mail', function () {
    $details = [
        'subject' => 'Test Notification'
    ];

    $job = (new \App\Jobs\MailNewPostAdded($details))
        ->delay(now()->addSecond(3));

    dispatch($job);
    echo "Mail send successfully !!";
});
