<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * --------------------------------------------------------------------------
 * `network` table migration
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\Bloggy
 * @category Migration
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */
class CreateNetworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create(
            'network',
            function (Blueprint $table) {
                // Key + Meta Data
                $table->increments('id')
                    ->unsigned();
                $table->timestamps();
                $table->softDeletes();

                // Relationship Data
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
                $table->string('domain', 250);
                $table->boolean('active')
                    ->default(false);

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
        Schema::dropIfExists('network');
	}

}
