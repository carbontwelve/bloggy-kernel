<?php namespace Carbontwelve\Bloggy\Controllers\Backend;


/**
 * Class TaxonsAdminController
 *
 * @author  Simon Dann <simon@photogabble.co.uk>
 * @since   0.0.2
 * @package Carbontwelve\Bloggy\Controllers\Backend
 */

class TaxonsAdminController extends BloggyAdminBaseController
{

    public function index()
    {

        return $this->adminView( 'taxonomy.taxons.index', array());

    }

}
