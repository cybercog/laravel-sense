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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSenseUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sense_urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('address');
            $table->timestamps();
        });

        if (DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME) === 'mysql') {
            DB::statement('ALTER TABLE `sense_urls` ADD FULLTEXT sense_urls_address_index(`address`)');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sense_urls');
    }
}
