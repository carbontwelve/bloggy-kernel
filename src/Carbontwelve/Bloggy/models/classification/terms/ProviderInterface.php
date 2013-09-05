<?php namespace Carbontwelve\Bloggy\Models\Classification\Terms;

interface ProviderInterface {

    /**
     * Find the terms by ID.
     *
     * @param  int  $id
     */
    public function findById($id);

    /**
     * Returns all terms.
     *
     * @return array  $taxonomies
     */
    public function findAll();

    /**
     * Creates a new record and fills it with data based upon the models $guarded parameter.
     *
     * @param array $attributes
     * @return array|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes);

    /**
     * Create a new instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createModel();

    /**
     * Sets a new model class name to be used at
     * runtime.
     *
     * @param  string  $model
     */
    public function setModel($model);

    /**
     * Returns the current set model class name
     *
     * @return string
     */
    public function getModel();

}
