<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * --------------------------------------------------------------------------
 * `meta` table migration
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\BloggyKernel
 * @category Migration
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */
class CreateMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create(
            'meta',
            function (Blueprint $table) {
                // Key + Meta Data
                $table->increments('id')
                    ->unsigned();

                // Relationship Data
                $table->integer('metable_id')
                    ->unsigned()
                    ->default(0);
                $table->string('metable_type', 255);

                // Main Data
                $table->string('meta_key', 200);
                $table->text('meta_value');

                // Indexes
                $table->index('metable_id');
                $table->index('metable_type');
                $table->index('meta_key');

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
        Schema::dropIfExists('meta');
	}

}
