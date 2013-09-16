<?php

/**
 *     _       _           _         ____             _
 *    / \   __| |_ __ ___ (_)_ __   |  _ \ ___  _   _| |_ ___  ___
 *   / _ \ / _` | '_ ` _ \| | '_ \  | |_) / _ \| | | | __/ _ \/ __|
 *  / ___ \ (_| | | | | | | | | | | |  _ < (_) | |_| | ||  __/\__ \
 * /_/   \_\__,_|_| |_| |_|_|_| |_| |_| \_\___/ \__,_|\__\___||___/
 *
 */

Route::group(
    array('prefix' => 'administration'),
    function () {

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  _____
        // |_   _|_ ___  _____  _ __   ___  _ __ ___  _   _
        //   | |/ _` \ \/ / _ \| '_ \ / _ \| '_ ` _ \| | | |
        //   | | (_| |>  < (_) | | | | (_) | | | | | | |_| |
        //   |_|\__,_/_/\_\___/|_| |_|\___/|_| |_| |_|\__, |
        //                                            |___/
        //
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        Route::group(
            array('prefix' => 'taxonomy'),
            function () {

                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                //  _____                                     _        _   _       _ _
                // |_   _|_ ___  _____  _ __   ___  _ __ ___ (_) ___  | | | |_ __ (_) |_ ___
                //   | |/ _` \ \/ / _ \| '_ \ / _ \| '_ ` _ \| |/ __| | | | | '_ \| | __/ __|
                //   | | (_| |>  < (_) | | | | (_) | | | | | | | (__  | |_| | | | | | |_\__ \
                //   |_|\__,_/_/\_\___/|_| |_|\___/|_| |_| |_|_|\___|  \___/|_| |_|_|\__|___/
                //
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                Route::group(
                    array('prefix' => 'units'),
                    function () {

                        Route::get('/', array('as' => 'administration.taxonomy.units.index', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonomicUnitAdminController@index'));
                        Route::get('/add', array('as' => 'administration.taxonomy.units.add', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonomicUnitAdminController@add'));
                        Route::post('/create', array('as' => 'administration.taxonomy.units.create', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonomicUnitAdminController@create'));
                        Route::get('/{id}/edit', array('as' => 'administration.taxonomy.units.edit', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonomicUnitAdminController@edit'));
                        Route::post('/{id}/edit', array('as' => 'administration.taxonomy.units.update', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonomicUnitAdminController@update'));
                        Route::post('/{id}/destroy', array('as' => 'administration.taxonomy.units.destroy', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonomicUnitAdminController@destroy'));

                    }
                );

                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                //  _____
                // |_   _|_ ___  _____  _ __  ___
                //   | |/ _` \ \/ / _ \| '_ \/ __|
                //   | | (_| |>  < (_) | | | \__ \
                //   |_|\__,_/_/\_\___/|_| |_|___/
                //
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
                Route::group(
                    array('prefix' => 'taxons'),
                    function () {

                        Route::get('/', array('as' => 'administration.taxonomy.taxons.index', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonsAdminController@index'));
                        Route::get('/add', array('as' => 'administration.taxonomy.taxons.add', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonsAdminController@add'));
                        Route::post('/create', array('as' => 'administration.taxonomy.taxons.create', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonsAdminController@create'));
                        Route::get('/{id}/edit', array('as' => 'administration.taxonomy.taxons.edit', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonsAdminController@edit'));
                        Route::post('/{id}/edit', array('as' => 'administration.taxonomy.taxons.update', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonsAdminController@update'));
                        Route::post('/{id}/destroy', array('as' => 'administration.taxonomy.taxons.destroy', 'uses' => 'Carbontwelve\Bloggy\Controllers\Backend\TaxonsAdminController@destroy'));

                    }
                );
            }
        );



        Route::group(
            array('prefix' => 'content'),
            function () {

            }
        );

    }
);
