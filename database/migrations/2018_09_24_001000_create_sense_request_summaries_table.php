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

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenseRequestSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sense_request_summaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('request_id');
            $table->string('method');
            $table->mediumText('url');
            $table->unsignedInteger('queries_count')->default('0');
            $table->double('time_total', 10, 2)->default('0');
            $table->timestamps();

            $table->index('request_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sense_request_summaries');
    }
}