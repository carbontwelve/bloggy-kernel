<?php namespace Carbontwelve\Bloggy;
/**
 * --------------------------------------------------------------------------
 * BloggyServiceProvider
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\Bloggy
 * @category ServiceProvider
 * @since    0.0.1
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Illuminate\Support\ServiceProvider;
use Carbontwelve\Bloggy\Models\Classification\Taxonomies\Eloquent\TaxonomyProvider as ClassificationTaxonomyProvider;

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
        $this->package('Carbontwelve/Bloggy');

        /* Load package routes */
        require_once __DIR__.'/../../routes.php';
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
		$this->registerClassificationTaxonomyProvider();
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
     * Register Taxonomy Provider Facade
     * --------------------------------------------------------------------------
     * @return void
     * @protected
     */
    protected function registerClassificationTaxonomyProvider()
    {
        $this->app['classification.taxonomy'] = $this->app->share(function($app)
        {
            $model = null; //$app['config']['bloggy::classification.models.taxonomy'];
            return new ClassificationTaxonomyProvider($model);
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
            return new \Carbontwelve\Bloggy\Classification(
                $app['classification.taxonomy']
            );
        });
    }

}
