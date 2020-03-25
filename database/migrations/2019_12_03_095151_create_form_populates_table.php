<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormPopulatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_populates', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->string("header");
            $table->string("table_name");
            $table->string("model");
            $table->string("route");
            $table->string("role");
            $table->timestamps();
        });

        DB::table('form_populates')->insert(
            array(
                'header' => 'Roles',
                'table_name' => 'role_names',
                'model' => 'RoleName',
                'route' => 'formbuilder',
                'role' => 'ADM'
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
        Schema::dropIfExists('form_populates');
    }
}
