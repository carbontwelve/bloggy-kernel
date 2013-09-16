<?php
/**
 * --------------------------------------------------------------------------
 * `taxons_relationship` table migration
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

class CreateTaxonsRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create(
            'taxons_relationship',
            function (Blueprint $table) {
                // Key + Meta Data
                $table->increments('id')
                    ->unsigned();

                // Relationship Data
                $table->integer('taxon_id')
                    ->unsigned()
                    ->default(0);

                // Polymorphic Data
                $table->integer('classifiable_id')
                    ->unsigned()
                    ->default(0);
                $table->string('classifiable_type');
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
        Schema::dropIfExists('taxons_relationship');
	}

}
