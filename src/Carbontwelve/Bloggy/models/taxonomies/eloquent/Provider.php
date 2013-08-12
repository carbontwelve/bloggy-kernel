<?php namespace Carbontwelve\Bloggy\Models\Taxonomies\Eloquent;
/**
 * --------------------------------------------------------------------------
 * Bloggy Taxonomy Eloquent Provider
 * --------------------------------------------------------------------------
 *
 * This is the service provider I have written based upon the provider that
 * is part of Sentry. It seems a good way of writing expendable code no?
 *
 * @package  Carbontwelve\Bloggy
 * @category Model
 * @version  0.0.1
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Halesway\FodderContent\Models\Classification\Taxonomies\ProviderInterface;

class TaxonomyProvider implements ProviderInterface {

    /**
     * The Eloquent Board model.
     *
     * @var string
     */
    protected $model = '\Carbontwelve\Bloggy\Models\Taxonomies\Eloquent\Taxonomy';


    /**
     * Create a new Eloquent Model provider.
     *
     * @param null|string $model
     *
     */
    public function __construct($model = null)
    {
        if (isset($model))
        {
            $this->model = $model;
        }
    }

    public function create(array $attributes)
    {
        $board = $this->createModel();
        $board->fill($attributes);
        $board->save();
        return $board;
    }

    public function findByID($id = null)
    {
        $model = $this->createModel();
        if ( ! $board = $model->newQuery()->find($id))
        {
            throw new TaxonomyNotFoundException("A Board could not be found with ID [$id].");
        }
        return $board;
    }

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

}
