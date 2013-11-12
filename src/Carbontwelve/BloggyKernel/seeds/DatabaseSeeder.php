<?php namespace Carbontwelve\BloggyKernel\Seeds;
/**
 * --------------------------------------------------------------------------
 * Database Seeder
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\BloggyKernel
 * @category Exceptions
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('TaxonomicUnitsSeeder');
	}

}
