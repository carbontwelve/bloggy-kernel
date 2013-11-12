<?php

/** @var \Carbontwelve\Admin\Libraries\Menu\Menu $menuProvider */
Event::listen('menu.register', function($menuProvider)
{
    $dashboardMenuItem          = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
    $dashboardMenuItem->text    = 'Configuration';
    $dashboardMenuItem->href    = '#';
    $dashboardMenuItem->icon    = 'glyphicon-wrench';
    $dashboardMenuItem->importance = 99;

    $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
    $dashboardChildItem->text   = 'Taxonomy Units';
    $dashboardChildItem->href   = route('administration.taxonomy.units.index');
    $dashboardMenuItem->addChild($dashboardChildItem);

    $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
    $dashboardChildItem->text   = 'Taxons';
    $dashboardChildItem->href   = route('administration.taxonomy.taxons.index');
    $dashboardMenuItem->addChild($dashboardChildItem);

    $menuProvider->register($dashboardMenuItem, 'configuration');
});
