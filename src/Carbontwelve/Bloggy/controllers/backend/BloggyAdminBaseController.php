<?php namespace Carbontwelve\Bloggy\Controllers\Backend;


/**
 * Class BloggyAdminBaseController
 *
 * @author  Simon Dann <simon@photogabble.co.uk>
 * @since   0.0.2
 * @package Carbontwelve\Bloggy\Controllers\Backend
 */
class BloggyAdminBaseController extends \Carbontwelve\Admin\Controllers\Backend\AdminBaseController
{


    public function __construct()
    {

        $this->setPackage('Bloggy');
        parent::__construct();

    }

}
