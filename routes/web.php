<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'uses' => 'IndexController@index',
    'as' => 'index',
]);

// Protected group
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [
        'uses' => 'IndexController@index',
        'as' => 'index',
    ]);

    Route::group(['as' => 'account.'], function () {
        // Account settings routes
        Route::get('account', [
            'uses' => 'Account\AccountController@index',
            'as' => 'index',
        ]);

        Route::get('account/bewerken', [
            'uses' => 'Account\AccountController@edit',
            'as' => 'edit',
        ]);

        Route::post('account/bewerken', [
            'uses' => 'Account\AccountController@update',
        ]);

        Route::get('account/gedeactiveerd', [
            'uses' => 'Account\AccountController@deactivated',
            'as' => 'deactivated',
        ]);
    });

    Route::group(['prefix' => 'account/email', 'as' => 'account.email.'], function () {
        // Edit email address routes
        Route::get('bewerken', [
            'uses' => 'Account\EmailController@edit',
            'as' => 'edit',
        ]);

        Route::post('bewerken', [
            'uses' => 'Account\EmailController@update',
        ]);
    });

    Route::group(['prefix' => 'account/wachtwoord', 'as' => 'account.password.'], function () {
        // Edit password routes
        Route::get('bewerken', [
            'uses' => 'Account\PasswordController@edit',
            'as' => 'edit',
        ]);

        Route::post('bewerken', [
            'uses' => 'Account\PasswordController@update',
        ]);
    });

    Route::group(['middleware' => ['verified', 'account.type:admin']], function () {
        // User management routes
        Route::patch('gebruikers/{user}/activeren', [
            'uses' => 'UserController@activate',
            'as' => 'user.activate',
        ]);

        Route::resource('gebruikers', 'UserController', [
            'names' => [
                'index' => 'user.index',
                'create' => 'user.create',
                'store' => 'user.store',
                'show' => 'user.show',
                'edit' => 'user.edit',
                'update' => 'user.update',
                'destroy' => 'user.destroy',
            ],
        ]);
    });

    Route::group(['prefix' => 'contributie', 'as' => 'contribution.'], function () {
        Route::get('/', [
            'uses' => 'ContributionController@index',
            'as' => 'index',
        ]);

        Route::get('/betalen/{id}', [
            'uses' => 'ContributionController@pay',
            'as' => 'pay',
        ]);
    });
});


// Authentication routes
Route::get('inloggen', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'login',
]);

Route::post('inloggen', [
    'uses' => 'Auth\LoginController@login',
]);

Route::get('uitloggen', [
    'uses' => 'Auth\LoginController@logout',
    'as' => 'logout',
]);

// Registration routes...
Route::get('registreren', [
    'uses' => 'Auth\RegisterController@showRegistrationForm',
    'as' => 'register',
]);

Route::post('registreren', [
    'uses' => 'Auth\RegisterController@register',
]);

// Account activation routes
Route::group(['prefix' => 'account/activeren', 'as' => 'account.activate.'], function () {
    Route::get('/', [
        'uses' => 'Auth\ActivationController@index',
        'as' => 'index',
    ]);

    Route::get('{token}', [
        'uses' => 'Auth\ActivationController@getVerification',
        'as' => 'token',
    ]);

    Route::get('error', [
        'uses' => 'Auth\ActivationController@getVerificationError',
        'as' => 'error',
    ]);
});

// Email verification routes
Route::group(['prefix' => 'account/email/verifieren', 'as' => 'account.email.verificate.'], function () {
    Route::get('/', [
        'uses' => 'Account\EmailController@index',
        'as' => 'index',
    ]);

    Route::get('{token}', [
        'uses' => 'Account\EmailController@getVerification',
        'as' => 'token',
    ]);

    Route::get('error', [
        'uses' => 'Account\EmailController@getVerificationError',
        'as' => 'error',
    ]);
});

// Password reset routes
Route::group(['prefix' => 'account/wachtwoord', 'as' => 'account.password.'], function () {
    // Password reset link request routes
    Route::get('email', [
        'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm',
        'as' => 'email',
    ]);

    Route::post('email', [
        'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
    ]);

    // Password reset routes
    Route::get('reset/{token}', [
        'uses' => 'Auth\ResetPasswordController@showResetForm',
        'as' => 'reset',
    ]);

    Route::post('reset', [
        'uses' => 'Auth\ResetPasswordController@reset',
    ]);

    // Password set routes
    Route::get('set/{token}', [
        'uses' => 'UserController@getReset',
        'as' => 'set',
    ]);

    Route::post('set', [
        'uses' => 'UserController@postReset',
    ]);
});
