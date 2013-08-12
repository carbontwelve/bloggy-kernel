<?php namespace Carbontwelve\Bloggy\Models\Taxonomies;

interface ProviderInterface {

    /**
     * Find the taxonomies by ID.
     *
     * @param  int  $id
     */
    public function findById($id);

    /**
     * Returns all taxonomies.
     *
     * @return array  $groups
     */
    public function findAll();

    /**
     * Creates a taxonomies.
     *
     */
    public function create(array $attributes);

}
