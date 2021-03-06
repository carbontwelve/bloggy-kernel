<?php namespace Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits\Eloquent;
/**
 * --------------------------------------------------------------------------
 * Bloggy TaxonomicUnit Eloquent Provider
 * --------------------------------------------------------------------------
 *
 * This is the service provider I have written based upon the provider that
 * is part of Sentry. It seems a good way of writing expendable code no?
 *
 * @package  Carbontwelve\BloggyKernel
 * @category Model
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits\ProviderInterface;

/**
 * Class TaxonomicUnitProvider
 * @package Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits\Eloquent
 */
class TaxonomicUnitProvider implements ProviderInterface {

    /**
     * The Default Eloquent Model.
     *
     * @var string
     */
    protected $model = '\Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits\Eloquent\TaxonomicUnit';


    /**
     * Create a new Eloquent Model provider.
     *
     * @param null|string $model
     */
    public function __construct($model = null)
    {
        if (isset($model))
        {
            $this->model = $model;
        }
    }

    /**
     * Creates a new record and fills it with data based upon the models $guarded parameter.
     *
     * @param array $attributes
     * @return array|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        $model = $this->createModel();
        $model->fill($attributes);
        $model->save();
        return $model;
    }

    /**
     * @param null $id
     * @param array $attributes
     * @return array|\Illuminate\Database\Eloquent\Model
     */
    public function update($id = null, array $attributes)
    {
        $model = $this->findByID($id);
        $model->fill($attributes);
        $model->save();
        return $model;
    }

    /**
     * Find the records by ID.
     *
     * @throws TaxonomicUnitNotFoundException
     * @param  int  $id
     * @return string
     */
    public function findByID($id = null)
    {
        $model = $this->createModel();
        if ( ! $board = $model->newQuery()->find($id))
        {
            throw new TaxonomicUnitNotFoundException("A Board could not be found with ID [$id].");
        }
        return $board;
    }

    /**
     * Returns all records.
     *
     * @return array $records
     */
    public function findAll()
    {
        $model = $this->createModel();
        return $model->newQuery()->get()->all();
    }

    /**
     * Create a new instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createModel()
    {
        $class = '\\'.ltrim($this->model, '\\');

        return new $class;
    }

    /**
     * Sets a new model class name to be used at
     * runtime.
     *
     * @param  string  $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Returns the current set model class name
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

}
