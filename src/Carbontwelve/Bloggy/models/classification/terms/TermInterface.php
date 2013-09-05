<?php namespace Carbontwelve\Bloggy\Models\Classification\Terms;

interface TermInterface {

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

