<?php namespace Carbontwelve\BloggyKernel\Models\Classification\TaxonRelationship;
/**
* --------------------------------------------------------------------------
* TaxonRelationship Interface
* --------------------------------------------------------------------------
*
* @package  Carbontwelve/Bloggy
* @category Interface
* @since    0.0.1
* @author   Simon Dann <simon@photogabble.co.uk>
*/

interface TaxonRelationshipInterface {

    /**
     * --------------------------------------------------------------------------
     * Return the key
     * --------------------------------------------------------------------------
     *
     * On boards the key is the id field.
     *
     * @return mixed
     */
    public function getId();

    /**
     * --------------------------------------------------------------------------
     * Overloading of Save method
     * --------------------------------------------------------------------------
     *
     * @param array $options
     * @return bool
     */
    public function save( array $options = array() );

    /**
     * --------------------------------------------------------------------------
     * Overloading of Update method
     * --------------------------------------------------------------------------
     *
     * @param array $attributes
     * @return bool
     */
    public function update( array $attributes = array() );

    /**
    * --------------------------------------------------------------------------
    * Overloading of Delete method
    * --------------------------------------------------------------------------
    *
    * @return bool|void
    */
    public function delete();

    /**
    * --------------------------------------------------------------------------
    * Data Validation
    * --------------------------------------------------------------------------
    *
    * @param $rule
    * @return bool
    * @throws TaxonRelationshipNotValidException
    */
    public function validate( $rule );

}
