<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\EsProduct;

class CreateLaraCartIndex extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        EsProduct::createIndex($shards = null, $replicas = null);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        EsProduct::deleteIndex();
    }
}
