<?php namespace Carbontwelve\Bloggy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Classification
 * @package Carbontwelve\Bloggy\Facades
 * @category    Facade
 * @version     0.0.1
 * @author      Simon Dann <simon@photogabble.co.uk>
 */
class Classification extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'classification';
    }

}
