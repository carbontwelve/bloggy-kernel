<?php namespace Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits\Eloquent;
/**
 * --------------------------------------------------------------------------
 * Bloggy TaxonomicUnit Exceptions
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\BloggyKernel
 * @category Exceptions
 * @since    0.0.2
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

class TaxonomicUnitNotFoundException extends \Exception {};
/**
 * Class TaxonomicUnitExistsException
 * @package Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits\Eloquent
 */
class TaxonomicUnitExistsException extends \Exception {};
/**
 * Class TaxonomicUnitNotValidException
 * @package Carbontwelve\BloggyKernel\Models\Classification\TaxonomicUnits\Eloquent
 */
class TaxonomicUnitNotValidException extends \Exception {

    private $validationErrors;

    /**
     * @param $errors
     * @return void
     */
    public function setValidationErrors ( \Illuminate\Support\MessageBag $errors )
    {
        $this->validationErrors = $errors;
    }

    /**
     * @return mixed
     */
    public function getValidationErrors ()
    {
        return $this->validationErrors;
    }

};
