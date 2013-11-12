<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * --------------------------------------------------------------------------
 * `taxons` table migration
 * --------------------------------------------------------------------------
 *
 * Inspired by the following post on stackoverflow plus wordpress's taxonomy
 * system: http://stackoverflow.com/a/4241084/1225977
 *
 * @package  Carbontwelve\BloggyKernel
 * @category Migration
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */
class CreateTaxons extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'taxons',
            function (Blueprint $table) {
                // Key + Meta Data
                $table->increments('id')
                    ->unsigned();
                $table->timestamps();
                $table->softDeletes();

                // Relationship Data
                $table->integer('taxonomic_unit_id')
                    ->unsigned()
                    ->default(0);
                $table->integer('parent_id')
                    ->unsigned()
                    ->default(0);
                $table->integer('created_user_id')
                    ->unsigned()
                    ->default(0);
                $table->integer('updated_user_id')
                    ->unsigned()
                    ->default(0);
                $table->integer('deleted_user_id')
                    ->unsigned()
                    ->default(0);

                // Main Data
                $table->string('name', 200);
                $table->string('slug', 200);
                $table->longText('description');
                $table->integer('use_counter')
                    ->unsigned()
                    ->default(0);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxons');
    }

}
