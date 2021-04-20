<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateWamessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // We assume that this micro-service has to store a message log
        // and provide the log through a get_url for other micro-services
        Schema::create('wamessage', function (Blueprint $table) {
            $table->id();
            $table->string('message_content');
            $table->string('delivery_status'); // queued, sent, failed, etc. , delivery status should be normalized to its own table
            $table->string('wa_contact');
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
        Schema::dropIfExists('wamessage');
    }
}
