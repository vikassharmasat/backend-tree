<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Descendantpivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descendant_pivots', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('ancestor_id')
            ->constrained('ancestor_nodes')
             ->onUpdate('cascade')
             ->onDelete('cascade');
        
            $table->foreignId('descendant_id')
            ->constrained('ancestor_nodes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->bigInteger('length');
           
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
        Schema::dropIfExists('descendant_pivots');
    }
}
