<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creatives', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamp('send_date');
          $table->string('brand');
          $table->string('sub_brand')->nullable();
          $table->string('segment');
          $table->string('type');
          $table->string('advertiser');
          $table->string('contract');
          $table->text('info')->nullable();
          $table->string('originalFile_Loc');
          $table->string('processingFile_Loc');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creatives');
    }
}
