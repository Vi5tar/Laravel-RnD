<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CplCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cpl_campaigns', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('campaign');
        $table->string('premium_offer');
        $table->string('subjectline_1');
        $table->string('subjectline_2')->nullable();
        $table->string('creative_1_name');
        $table->string('creative_1_location');
        $table->string('creative_2_name')->nullable();
        $table->string('creative_2_location')->nullable();
        $table->string('landing_page_url');
        $table->string('utm_template');
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
        Schema::dropIfExists('cpl_campaigns');
    }
}
