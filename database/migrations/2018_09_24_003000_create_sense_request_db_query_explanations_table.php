<?php

/*
 * This file is part of Laravel Sense.
 *
 * (c) Anton Komarev <anton@komarev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenseRequestDbQueryExplanationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sense_request_db_query_explanations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('query_id');
            $table->json('result');
            $table->timestamps();

            $table->index('query_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sense_request_db_query_explanations');
    }
}
