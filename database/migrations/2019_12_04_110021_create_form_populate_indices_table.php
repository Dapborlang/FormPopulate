<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormPopulateIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_populate_indices', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('form_populate_id');
            $table->json("exclude")->nullable();
            $table->json("notes")->nullable();
            $table->json("script")->nullable();
            $table->json("master_keys")->nullable();
            $table->json("foreign_keys")->nullable();
            $table->json("class")->nullable();
            $table->json("attribute")->nullable();
            $table->json("cnotes")->nullable();
            $table->foreign('form_populate_id')->references('id')->on('form_populates');
            $table->timestamps();
        });

        DB::table('form_populate_indices')->insert(
            array(
                'form_populate_id' =>'1',
                'exclude' => '["id","updated_at","created_at"]',
                'notes' => '[""]',
                'cnotes' => '[""]'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_populate_indices');
    }
}
