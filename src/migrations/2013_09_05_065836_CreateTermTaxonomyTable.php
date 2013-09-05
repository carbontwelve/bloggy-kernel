<?php
/**
 * --------------------------------------------------------------------------
 * TermTaxonomy Table Migration
 * --------------------------------------------------------------------------
 *
 * This is the first migration for the `TermTaxonomy` table. The data stored
 * here is linked to the `Terms` table via a BelongsTo relationship.
 *
 * @package  Carbontwelve\Bloggy
 * @category Migration
 * @version  0.0.1
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTermTaxonomyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('termtaxonomy', function( Blueprint $table )
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
            $table->string('taxonomy', 32);
            $table->longText('description');
            $table->integer('use_counter')
                ->unsigned()
                ->default(0);

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('termtaxonomy');
	}

}
