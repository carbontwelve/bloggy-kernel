<?php namespace Carbontwelve\Bloggy\Controllers\Backend;

use Carbontwelve\Bloggy\Facades\Classification;
use Carbontwelve\Bloggy\Models\Classification\Taxons\Eloquent\TaxonsNotValidException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
        $taxons = Classification::getTaxonProvider()
            ->findAll();

        return $this->adminView( 'taxonomy.taxons.index', array(
                'taxons' => $taxons
            ));
    }

    public function add()
    {
        $this->getBreadcrumbProvider()->addBreadcrumb(
            array( 'href' => route('administration.taxonomy.taxons.add'), 'text' => 'Create New Record' )
        );

        return $this->adminView( 'taxonomy.taxons.create', array(
                'taxons' => Classification::getTaxonProvider()
                    ->findAll(),
                'taxonomyUnits' => Classification::getTaxonomicUnitsProvider()
                    ->findAll()
            ));
    }

    public function create()
    {
        $taxonomyUnitProvider = Classification::getTaxonProvider();

        try{
            $taxonomyUnit = $taxonomyUnitProvider->create(
                Input::except('_token')
            );
        }
        catch( TaxonsNotValidException $errorMessage)
        {
            Session::flash('error', $errorMessage->getMessage() );
            return Redirect::back()
                ->withErrors( $errorMessage->getValidationErrors() )
                ->withInput(Input::except('_token'));
        }

        Session::flash('success','That Taxon record was successfully created.');
        return Redirect::route( 'administration.taxonomy.taxons.edit', array( 'id' =>$taxonomyUnit->id ) );
    }

}
