<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * --------------------------------------------------------------------------
 * `content` table migration
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\BloggyKernel
 * @category Migration
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */
class CreateContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create(
            'content',
            function (Blueprint $table) {
                // Key + Meta Data
                $table->increments('id')
                    ->unsigned();
                $table->timestamps();
                $table->timestamp('published_at');
                $table->softDeletes();

                // Relationship Data
                $table->integer('parent_id')
                    ->unsigned()
                    ->default(0);
                $table->integer('network_id')
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

                $table->text('title');
                $table->string('slug', 250);
                $table->longText('content');
                $table->text('excerpt');
                $table->enum('kind', array(
                        'post',
                        'page',
                        'revision'
                    )
                )->default('post');
                $table->enum('status', array(
                        'auto-draft',
                        'draft',
                        'pending',
                        'private',
                        'published'
                    )
                )->default('draft');
                $table->integer('order')
                    ->default(0)
                    ->unsigned();
                $table->boolean('comments_enabled')
                    ->default(true);
                $table->boolean('pings_enabled')
                    ->default(true);
                $table->integer('comment_count')
                    ->default(0)
                    ->unsigned();
                $table->integer('ping_count')
                    ->default(0)
                    ->unsigned();

                // Indexes
                $table->index('parent_id');
                $table->index('network_id');
                $table->index('slug');
                $table->index('kind');
                $table->index('status');
                $table->index('comments_enabled');
                $table->index('pings_enabled');
                $table->index('comment_count');
                $table->index('ping_count');

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
        Schema::dropIfExists('content');
	}

}
