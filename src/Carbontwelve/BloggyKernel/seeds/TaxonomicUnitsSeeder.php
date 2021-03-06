<?php namespace Carbontwelve\BloggyKernel\Seeds;
/**
 * --------------------------------------------------------------------------
 * `taxonomic_units` Table Seeder
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\BloggyKernel
 * @category Exceptions
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Illuminate\Database\Seeder;

class TaxonomicUnitsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->info('Taxonomic Units table seeded!');

    }

}
