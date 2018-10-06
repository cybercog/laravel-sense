<?php

/*
 * This file is part of Laravel Sense.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

//Route::prefix('api')->group(function () {
//    // Dashboard Routes...
//    Route::get('/stats', 'DashboardStatsController@index')->name('sense.stats.index');
//});

// Catch-all Route...
Route::get('/requests')->uses('Requests\Collect\Action');
Route::get('/requests/{request}')->uses('Requests\Get\Action');

Route::get('/{view?}', 'AppController')->where('view', '(.*)')->name('sense.index');
