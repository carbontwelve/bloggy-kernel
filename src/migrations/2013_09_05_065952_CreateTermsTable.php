<?php
/**
 * --------------------------------------------------------------------------
 * Term Table Migration
 * --------------------------------------------------------------------------
 *
 * This is the first migration for the `Term` table. The data stored here is
 * linked to the `TermsTaxonomy` table via a HasOne relationship. As there
 * may be more than one term each with a different taxonomy, there is a unique
 * constraint on the `slug` column - this needs to be kept unique within the
 * model so that the database does not error.
 *
 * @package  Carbontwelve\Bloggy
 * @category Migration
 * @version  0.0.1
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTermsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('terms', function( Blueprint $table )
        {
            // Key + Meta Data
            $table->increments('id')
                ->unsigned();
            $table->timestamps();
            $table->softDeletes();

            // Relationship Data
            $table->integer('term_id')
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

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('terms');
	}

}
