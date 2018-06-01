<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\SearchProduct;

class CreateLaraCartIndex extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SearchProduct::createIndex($shards = null, $replicas = null);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        SearchProduct::deleteIndex();
    }
}
