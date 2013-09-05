<?php namespace Carbontwelve\Bloggy;
/**
 * --------------------------------------------------------------------------
 * Classification Provider Factory
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\Bloggy
 * @category Factory
 * @since    0.0.1
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Carbontwelve\Bloggy\Models\Taxonomies\ProviderInterface as TaxonomyProviderInterface;
use Carbontwelve\Bloggy\Models\Taxonomies\Eloquent\TaxonomyProvider;

class Classification{

    protected $taxonomyProvider;

    /**
     * --------------------------------------------------------------------------
     * Create a new Classification object
     * --------------------------------------------------------------------------
     *
     * @param TaxonomyProviderInterface $taxonomyProvider
     */
    public function __construct(TaxonomyProviderInterface $taxonomyProvider = null )
    {
        $this->taxonomyProvider = $taxonomyProvider ?: new TaxonomyProvider();
    }

    /**
     * --------------------------------------------------------------------------
     * Sets the Taxonomy provider for Classification.
     * --------------------------------------------------------------------------
     *
     * @param TaxonomyProviderInterface $taxonomyProvider
     * @return void
     */
    public function setCommentProvider(TaxonomyProviderInterface $taxonomyProvider)
    {
        $this->taxonomyProvider = $taxonomyProvider;
    }

    /**
     * --------------------------------------------------------------------------
     * Gets the Taxonomy provider for Classification.
     * --------------------------------------------------------------------------
     *
     * @return TaxonomyProviderInterface
     */
    public function getCommentProvider()
    {
        return $this->taxonomyProvider;
    }

}
