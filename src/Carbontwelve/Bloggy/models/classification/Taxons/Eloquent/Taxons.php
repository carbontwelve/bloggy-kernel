<?php namespace Carbontwelve\Bloggy\Models\Classification\Taxons\Eloquent;
/**
* --------------------------------------------------------------------------
* Taxons Eloquent Model
* --------------------------------------------------------------------------
*
* @extends  \Illuminate\Database\Eloquent\Model
* @package  Carbontwelve/Bloggy
* @category Model
* @since    0.0.1
* @author   Simon Dann <simon@photogabble.co.uk>
*/

use Carbontwelve\Bloggy\Models\Classification\Taxons\TaxonsInterface;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Input;

/**
 * Class Taxons
 * @package Carbontwelve\Bloggy\Models\Classification\Taxons\Eloquent
 */
class Taxons extends Model implements TaxonsInterface {

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = array(
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    );

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wp_commentmeta';

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

    /**
     * Indicates if the model should soft delete.
     *
     * @var bool
     */
    protected $softDelete = false;

    /**
     * The default rules for this model to validate
     *
     * @var array
     */
    public static $rules = array(

        'save' => array(),
        'update' => array(),
        'delete' => array()

    );

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
        $this->validate('save');
        return parent::save();
    }

    /**
     * --------------------------------------------------------------------------
     * Overloading of Update method
     * --------------------------------------------------------------------------
     *
     * Just adding some validation here so we can throw exceptions on validation
     * errors.
     *
     * @param array $attributes
     * @return bool
     */
    public function update(array $attributes = array())
    {
        $this->validate('update');
        return parent::update();
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
     * Data Validation
     * --------------------------------------------------------------------------
     *
     * @param $rule
     * @return bool
     * @throws TaxonsNotValidException
     */
    public function validate($rule)
    {
        // If there are no validation rules then no point in continuing
        if (count(self::$rules[$rule]) == 0){ return true; }

        $validator = Validator::make( Input::all(), self::$rules[$rule] );

        if ( ! $validator->passes() ){
            throw new TaxonsNotValidException( $validator->errors() );
        }

        return true;
    }

}
