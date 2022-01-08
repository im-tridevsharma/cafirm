<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subtitle')->default('');
            $table->string('slug');
            $table->string('cover')->nullable();
            $table->longText('content')->default('');
            $table->longText('description1')->default('');
            $table->longText('description2')->default('');
            $table->unsignedBigInteger('membership_category')->default(0);
            $table->unsignedBigInteger('business_category')->default(0);
            $table->integer('contact_form_order')->default(0);
            $table->integer('content_order')->default(0);
            $table->integer('membership_order')->default(0);
            $table->integer('description1_order')->default(0);
            $table->integer('description2_order')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('is_contact_form')->default(0);
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
        Schema::dropIfExists('pages');
    }
}
