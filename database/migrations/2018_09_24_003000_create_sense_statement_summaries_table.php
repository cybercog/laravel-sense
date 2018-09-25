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

class CreateSenseStatementSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sense_statement_summaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('request_id', 36);
            $table->unsignedBigInteger('statement_id');
            $table->string('connection');
            $table->unsignedInteger('queries_count')->default('0');
            $table->double('time_total', 10, 2)->default('0');
            $table->double('time_min', 6, 2)->default('0');
            $table->double('time_max', 6, 2)->default('0');
            $table->timestamps();

            $table->index([
                'request_id',
                'statement_id',
                'connection',
            ], 'sense_statement_summaries_request_statement_connection_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sense_statement_summaries');
    }
}
