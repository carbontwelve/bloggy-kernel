<?php
/**
 * --------------------------------------------------------------------------
 * `taxonomic_units` table migration
 * --------------------------------------------------------------------------
 *
 * Inspired by the following post on stackoverflow plus wordpress's taxonomy
 * system: http://stackoverflow.com/a/4241084/1225977
 *
 * @package  Carbontwelve\Bloggy
 * @category Exceptions
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxonomicUnits extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'taxonomic_units',
            function (Blueprint $table) {
                // Key + Meta Data
                $table->increments('id')
                    ->unsigned();
                $table->timestamps();
                $table->softDeletes();

                // Relationship Data
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
                $table->string('name', 20);

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
        Schema::dropIfExists('taxonomic_units');
    }

}
