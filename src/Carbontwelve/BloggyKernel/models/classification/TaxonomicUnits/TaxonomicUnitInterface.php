<?php namespace Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits;

/**
 * Class TaxonomicUnitInterface
 * @package Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits
 */
interface TaxonomicUnitInterface {

    /**
     * Returns the records ID.
     *
     * @return mixed
     */
    public function getId();

    /**
     * Save the records.
     *
     * @return bool
     */
    public function save();

    /**
     * Delete the records.
     *
     * @return bool
     */
    public function delete();

}

