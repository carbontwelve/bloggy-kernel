<?php namespace Carbontwelve\Bloggy\Models\Classification\TaxonomicUnits\Eloquent;
/**
 * --------------------------------------------------------------------------
 * Bloggy TaxonomicUnit Eloquent Model
 * --------------------------------------------------------------------------
 *
 * @extends \Eloquent
 * @package  Carbontwelve\Bloggy
 * @category Model
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Carbontwelve\Bloggy\Models\Classification\TaxonomicUnits\TaxonomicUnitInterface;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Input;

/**
 * Class TaxonomicUnit
 * @package Carbontwelve\Bloggy\Models\Classification\TaxonomicUnits\Eloquent
 */
class TaxonomicUnit extends Model implements TaxonomicUnitInterface {

    /**
     * The attributes that are not mass assignable.
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
    protected $table = 'taxonomic_units';

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Indicates if the model should soft delete.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * The default rules for this model to validate
     *
     * @var array
     */
    public static $rules = array(

        'save' => array(
            'name' => array(
                'required',
                'min:3'
            )
        ),
        'update' => array(
            'name' => array(
                'required',
                'min:3'
            )
        ),
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
     * Data Validation
     * --------------------------------------------------------------------------
     *
     * @param $rule
     * @return bool
     * @throws TaxonomicUnitNotValidException
     */
    public function validate($rule)
    {
        // If there are no validation rules then no point in continuing
        if (count(self::$rules[$rule]) == 0){ return true; }

        $validator = Validator::make( Input::all(), self::$rules[$rule] );

        if ( ! $validator->passes() ){

            $validationError = new TaxonomicUnitNotValidException( 'That input is not valid.' );
            $validationError->setValidationErrors( $validator->errors() );
            throw $validationError;
        }

        return true;
    }

    /**
     * --------------------------------------------------------------------------
     * TaxonomicUnit BelongsTo Term
     * --------------------------------------------------------------------------
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function term()
    {
        // @todo: make $termModel a configurable variable
        $termModel = '\Carbontwelve\Bloggy\Models\Classification\Terms\Eloquent\Term';
        return $this->belongsTo($termModel, 'term_id');
    }
}
