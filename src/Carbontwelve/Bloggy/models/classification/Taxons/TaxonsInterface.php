<?php namespace Carbontwelve\Bloggy\Models\Classification\Taxons;
/**
* --------------------------------------------------------------------------
* Taxons Interface
* --------------------------------------------------------------------------
*
* @package  Carbontwelve/Bloggy
* @category Interface
* @since    0.0.1
* @author   Simon Dann <simon@photogabble.co.uk>
*/

/** @noinspection PhpDocSignatureInspection */
interface TaxonsInterface {

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
     * @internal param array $options
     * @return bool
     */
    public function save();

    /**
     * --------------------------------------------------------------------------
     * Overloading of Update method
     * --------------------------------------------------------------------------
     *
     * @param array $attributes
     * @internal param array $options
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
    * @throws TaxonsNotValidException
    */
    public function validate( $rule );

}
