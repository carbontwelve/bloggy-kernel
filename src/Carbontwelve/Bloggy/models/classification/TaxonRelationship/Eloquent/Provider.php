<?php namespace Carbontwelve\Bloggy\Models\Classification\TaxonRelationship\Eloquent;
/**
* --------------------------------------------------------------------------
* TaxonRelationship Eloquent Provider
* --------------------------------------------------------------------------
*
* @package  Carbontwelve/Bloggy
* @category ServiceProvider
* @since    0.0.1
* @author   Simon Dann <simon@photogabble.co.uk>
*/

use Carbontwelve\Bloggy\Models\Classification\TaxonRelationship\ProviderInterface;

class TaxonRelationshipProvider implements ProviderInterface {

    /**
     * The Default Eloquent Model.
     *
     * @var string
     */
    protected $model = 'Carbontwelve\Bloggy\Models\Classification\TaxonRelationship\Eloquent\TaxonRelationship';


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
        $board = $this->createModel();
        $board->fill($attributes);
        $board->save();
        return $board;
    }

    /**
     * Find the records by ID.
     *
     * @param  int  $id
     */
    public function findByID($id = null)
    {
        $model = $this->createModel();
        if ( ! $board = $model->newQuery()->find($id))
        {
            throw new TaxonRelationshipNotFoundException("A TaxonRelationship could not be found with ID [$id].");
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
