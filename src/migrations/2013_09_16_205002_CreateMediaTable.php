<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * --------------------------------------------------------------------------
 * `media` table migration
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\BloggyKernel
 * @category Migration
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */
class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create(
            'media',
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
                $table->integer('attachable_id')
                    ->unsigned()
                    ->default(0);
                $table->string('attachable_type', 255);

                // Main Data
                $table->text('name');
                $table->text('title');
                $table->string('file_name', 250);
                $table->string('file_mime_type', 250);

                // Indexes
                $table->index('attachable_id');
                $table->index('attachable_type');
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
        Schema::dropIfExists('media');
	}

}
