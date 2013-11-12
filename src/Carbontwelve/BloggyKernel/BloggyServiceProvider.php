<?php namespace Carbontwelve\BloggyKernel;

use Illuminate\Support\ServiceProvider;
use Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits\Eloquent\TaxonomicUnitProvider as ClassificationTaxonomicUnitProvider;
use Carbontwelve\BloggyKernel\Models\Classification\Taxons\Eloquent\TaxonsProvider as ClassificationTaxonsProvider;
use Carbontwelve\BloggyKernel\Models\Classification\TaxonRelationship\Eloquent\TaxonRelationshipProvider as ClassificationTaxonRelationshipProvider;

/**
 * Class BloggyServiceProvider
 *
 * @package Carbontwelve\BloggyKernel
 * @category ServiceProvider
 * @since    0.0.1
 * @author   Simon Dann <simon@photogabble.co.uk>
 */
class BloggyServiceProvider extends ServiceProvider {

	/**
     * --------------------------------------------------------------------------
	 * Indicates if loading of the provider is deferred.
     * --------------------------------------------------------------------------
	 *
	 * @var bool
	 */
	protected $defer = false;

    /**
     * --------------------------------------------------------------------------
     * Package Init Script
     * --------------------------------------------------------------------------
     */
    public function boot()
    {
        /* Let Laravel Know what package we are */
        $this->package('Carbontwelve/BloggyKernel');

        /* Load package routes */
        require_once __DIR__.'/../../routes.php';

        /* Load package events */
        require_once __DIR__.'/../../events.php';
    }

	/**
     * --------------------------------------------------------------------------
	 * Register the service provider.
     * --------------------------------------------------------------------------
	 *
	 * @return void
	 */
	public function register()
	{
        $this->registerClassificationTaxonomicUnitProvider();
        $this->registerClassificationTaxonProvider();
		$this->registerClassificationTaxonRelationshipProvider();
        $this->registerClassification();
	}

	/**
     * --------------------------------------------------------------------------
	 * Get the services provided by the provider.
     * --------------------------------------------------------------------------
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

    /**
     * --------------------------------------------------------------------------
     * Register TaxonomicUnit Provider Facade
     * --------------------------------------------------------------------------
     * @return void
     * @protected
     */
    protected function registerClassificationTaxonomicUnitProvider()
    {
        $this->app['classification.taxonomicUnit'] = $this->app->share(function($app)
            {
                $model = null; //$app['config']['bloggy::classification.models.taxonomy'];
                return new ClassificationTaxonomicUnitProvider($model);
            });
    }

    /**
     * --------------------------------------------------------------------------
     * Register Taxon Provider Facade
     * --------------------------------------------------------------------------
     * @return void
     * @protected
     */
    protected function registerClassificationTaxonProvider()
    {
        $this->app['classification.taxon'] = $this->app->share(function($app)
            {
                $model = null; //$app['config']['bloggy::classification.models.taxonomy'];
                return new ClassificationTaxonsProvider($model);
            });
    }

    /**
     * --------------------------------------------------------------------------
     * Register Taxon Relationship Provider Facade
     * --------------------------------------------------------------------------
     * @return void
     * @protected
     */
    protected function registerClassificationTaxonRelationshipProvider()
    {
        $this->app['classification.taxonRelationship'] = $this->app->share(function($app)
            {
                $model = null; //$app['config']['bloggy::classification.models.taxonomy'];
                return new ClassificationTaxonRelationshipProvider($model);
            });
    }

    /**
     * --------------------------------------------------------------------------
     * Register Classification Facade
     * --------------------------------------------------------------------------
     * @return void
     * @protected
     */
    protected function registerClassification()
    {
        $this->app['classification'] = $this->app->share(function($app)
        {
            $app['classification.loaded'] = true;
            return new \Carbontwelve\BloggyKernel\Classification(
                $app['classification.taxonomicUnit'],
                $app['classification.taxonRelationship'],
                $app['classification.taxon']
            );
        });
    }

}
