<?php namespace Carbontwelve\Bloggy\Models\Taxonomies;

interface TaxonomyInterface {

    /**
     * Returns the taxonomies ID.
     *
     * @return mixed
     */
    public function getId();

    /**
     * Save the taxonomies.
     *
     * @return bool
     */
    public function save();

    /**
     * Delete the taxonomies.
     *
     * @return bool
     */
    public function delete();

}

