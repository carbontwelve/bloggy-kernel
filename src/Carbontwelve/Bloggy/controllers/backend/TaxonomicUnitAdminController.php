<?php namespace Carbontwelve\Bloggy\Controllers\Backend;


/**
 * Class TaxonomicUnitAdminController
 *
 * @author  Simon Dann <simon@photogabble.co.uk>
 * @since   0.0.2
 * @package Carbontwelve\Bloggy\Controllers\Backend
 */

class TaxonomicUnitAdminController extends BloggyAdminBaseController
{

    public function index()
    {
        $this->getBreadcrumbProvider()->setBreadcrumbs(
            array( 'href' => '#', 'route' => 'administration.taxonomy.units.index', 'text' => 'Taxonomy Units' )
        );

        return $this->adminView( 'taxonomy.units.index', array());

    }

}
