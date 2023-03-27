<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('proposals', function (Blueprint $table) {
        $table->id();
        $table->string('ticket_name');
        $table->string('proposal')->nullable();
        $table->text('comment')->nullable();
        $table->text('request_review')->nullable();
        $table->string('type')->nullable();
        $table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('proposals');
    }
};
