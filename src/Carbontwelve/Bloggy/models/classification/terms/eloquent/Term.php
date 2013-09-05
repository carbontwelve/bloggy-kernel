<?php namespace Carbontwelve\Bloggy\Models\Classification\Terms\Eloquent;
/**
 * --------------------------------------------------------------------------
 * Bloggy Term Eloquent Model
 * --------------------------------------------------------------------------
 *
 * @extends \Eloquent
 * @package  Carbontwelve\Bloggy
 * @category Model
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Carbontwelve\Bloggy\Models\Classification\Terms\TermInterface;
use Illuminate\Database\Eloquent\Model;

class Term extends Model implements TermInterface {

    protected $guarded = array();
    protected $table = 'terms';
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
     * @return bool|void
     */
    public function delete()
    {
        return parent::delete();
    }

    /**
     * --------------------------------------------------------------------------
     * Data Validation before Save
     * --------------------------------------------------------------------------
     *
     * @return bool
     */
    public function validate()
    {
        return true;
    }

    /**
     * --------------------------------------------------------------------------
     * Term HasOne Taxonomy
     * --------------------------------------------------------------------------
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function taxonomy()
    {
        // @todo: make $termTaxonomyModel a configurable variable
        $termTaxonomyModel = '\Carbontwelve\Bloggy\Models\Classification\Taxonomies\Eloquent\Taxonomy';
        return $this->hasOne($termTaxonomyModel, 'term_id');
    }
}
