<?php namespace Carbontwelve\BloggyKernel\Models\Classification\TaxonRelationship;
/**
* --------------------------------------------------------------------------
* TaxonRelationship Provider Interface
* --------------------------------------------------------------------------
*
* @package  Carbontwelve/Bloggy
* @category Interface
* @since    0.0.1
* @author   Simon Dann <simon@photogabble.co.uk>
*/

interface ProviderInterface {

    /**
     * Find the records by ID.
     *
     * @param  int  $id
     */
    public function findById($id);

    /**
     * Returns all records.
     *
     * @return array  $records
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
