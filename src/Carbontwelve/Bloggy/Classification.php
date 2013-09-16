<?php namespace Carbontwelve\Bloggy;

use Carbontwelve\Bloggy\Models\Classification\TaxonomicUnits\ProviderInterface as TaxonomicUnitsProviderInterface;
use Carbontwelve\Bloggy\Models\Classification\TaxonomicUnits\Eloquent\TaxonomicUnitProvider;

use Carbontwelve\Bloggy\Models\Classification\TaxonRelationship\ProviderInterface as TaxonRelationshipProviderInterface;
use Carbontwelve\Bloggy\Models\Classification\TaxonRelationship\Eloquent\TaxonRelationshipProvider;

use Carbontwelve\Bloggy\Models\Classification\Taxons\ProviderInterface as TaxonProviderInterface;
use Carbontwelve\Bloggy\Models\Classification\Taxons\Eloquent\TaxonsProvider;

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
class Classification{

    /** @var \Carbontwelve\Bloggy\Models\Classification\TaxonomicUnits\Eloquent\TaxonomicUnitProvider  */
    protected $taxonomyUnitProvider;

    /** @var \Carbontwelve\Bloggy\Models\Classification\Taxons\Eloquent\TaxonsProvider  */
    protected $taxonProvider;

    /** @var \Carbontwelve\Bloggy\Models\Classification\TaxonRelationship\Eloquent\TaxonRelationshipProvider  */
    protected $taxonRelationshipProvider;

    /**
     * --------------------------------------------------------------------------
     * Create a new Classification object
     * --------------------------------------------------------------------------
     *
     * @param TaxonomicUnitsProviderInterface $taxonomyUnitProvider
     * @param TaxonRelationshipProviderInterface $taxonRelationshipProvider
     * @param TaxonProviderInterface $taxonProvider
     */
    public function __construct(
        TaxonomicUnitsProviderInterface $taxonomyUnitProvider = null,
        TaxonRelationshipProviderInterface $taxonRelationshipProvider = null,
        TaxonProviderInterface $taxonProvider = null
    )
    {
        $this->taxonomyUnitProvider = $taxonomyUnitProvider ?: new TaxonomicUnitProvider();
        $this->taxonProvider = $taxonProvider ?: new TaxonsProvider();
        $this->taxonRelationshipProvider = $taxonRelationshipProvider ?: new TaxonRelationshipProvider();
    }

    /**
     * --------------------------------------------------------------------------
     * Sets the Taxonomic Unit provider for Classification.
     * --------------------------------------------------------------------------
     *
     * @param TaxonomicUnitsProviderInterface $taxonomyUnitProvider
     * @return void
     */
    public function setTaxonomicUnitsProvider(TaxonomicUnitsProviderInterface $taxonomyUnitProvider)
    {
        $this->taxonomyUnitProvider = $taxonomyUnitProvider;
    }

    /**
     * --------------------------------------------------------------------------
     * Gets the Taxonomic Unit provider for Classification.
     * --------------------------------------------------------------------------
     *
     * @return TaxonomicUnitsProviderInterface
     */
    public function getTaxonomicUnitsProvider()
    {
        return $this->taxonomyUnitProvider;
    }

    /**
     * --------------------------------------------------------------------------
     * Sets the Taxon Relationship provider for Classification.
     * --------------------------------------------------------------------------
     *
     * @param TaxonRelationshipProviderInterface $taxonRelationshipProvider
     * @return void
     */
    public function setTaxonRelationshipProvider(TaxonRelationshipProviderInterface $taxonRelationshipProvider)
    {
        $this->taxonRelationshipProvider = $taxonRelationshipProvider;
    }

    /**
     * --------------------------------------------------------------------------
     * Gets the Taxon Relationship provider for Classification.
     * --------------------------------------------------------------------------
     *
     * @return TaxonRelationshipProviderInterface
     */
    public function getTaxonRelationshipProvider()
    {
        return $this->taxonRelationshipProvider;
    }

    /**
     * --------------------------------------------------------------------------
     * Sets the Taxon provider for Classification.
     * --------------------------------------------------------------------------
     *
     * @param TaxonProviderInterface $taxonProvider
     * @return void
     */
    public function setTaxonProvider(TaxonomicUnitsProviderInterface $taxonProvider)
    {
        $this->taxonProvider = $taxonProvider;
    }

    /**
     * --------------------------------------------------------------------------
     * Gets the Taxon provider for Classification.
     * --------------------------------------------------------------------------
     *
     * @return TaxonProviderInterface
     */
    public function getTaxonProvider()
    {
        return $this->taxonProvider;
    }

}
