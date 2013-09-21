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

    /**
     * Class Init
     */
    public function __construct()
    {
        // I do this first as the AdminBaseController __construct() sets up breadcrumbs and stuff
        parent::__construct();

        // Lets add the class base breadcrumb here
        $this->getBreadcrumbProvider()->addBreadcrumb(
            array( 'href' => route('administration.taxonomy.taxons.index'), 'text' => 'Taxons' )
        );
    }

    public function index()
    {

        return $this->adminView( 'taxonomy.taxons.index', array());

    }

}
