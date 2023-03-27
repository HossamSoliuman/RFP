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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('cname')->nullable();
            $table->string('cphone')->nullable();
            $table->string('cemail')->nullable();
            $table->string('caddress')->nullable();
            $table->string('pname')->nullable();
            $table->string('ptitle')->nullable();
            $table->string('pemail')->nullable();
            $table->string('cr')->nullable();
            $table->string('gosi')->nullable();
            $table->string('ticket_name')->nullable();
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
        Schema::dropIfExists('requests');
    }
};
