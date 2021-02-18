<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('review');
            $table->integer('rating');
            $table->enum("help_status",["helpful", "not helpful"]);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('apartment_id')->constrained('apartments');
           // $table->foreignId('landlord_id')->constrained('landlords');
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
        Schema::dropIfExists('reviews');
    }
}
