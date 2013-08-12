<?php namespace Carbontwelve\Bloggy\Models\Taxonomies\Eloquent;
/**
 * --------------------------------------------------------------------------
 * Bloggy Taxonomy Eloquent Model
 * --------------------------------------------------------------------------
 *
 * @extends \Eloquent
 * @package  Carbontwelve\Bloggy
 * @category Model
 * @version  0.0.1
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Carbontwelve\Bloggy\Models\Taxonomies\TaxonomyInterface;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model implements TaxonomyInterface {

    protected $guarded = array();
    protected $table = 'taxonomies';
    public static $rules = array();

    /**
     * Indicates if the model should soft delete.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * --------------------------------------------------------------------------
     * Return the key
     * --------------------------------------------------------------------------
     *
     * On boards the key is the id field.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getKey();
    }

    /**
     * --------------------------------------------------------------------------
     * Overloading of Save method
     * --------------------------------------------------------------------------
     *
     * Just adding some validation here so we can throw exceptions on validation
     * errors.
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = array())
    {
        $this->validate();
        return parent::save();
    }

    /**
     * --------------------------------------------------------------------------
     * Overloading of Delete method
     * --------------------------------------------------------------------------
     *
     * We could do something with this before/after delete, say re-parent a boards
     * topics or something...
     *
     * @return bool|void
     */
    public function delete()
    {
        return parent::delete();
    }


    /**
     * --------------------------------------------------------------------------
     * Taxonomy Data Validation before Save
     * --------------------------------------------------------------------------
     * @return bool
     */
    public function validate()
    {
        return true;
    }
}
