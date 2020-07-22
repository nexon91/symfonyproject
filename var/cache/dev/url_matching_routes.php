<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/buildings' => [[['_route' => 'buildings', '_controller' => 'App\\Controller\\BuildingController::home'], null, null, null, false, false, null]],
        '/building/add' => [[['_route' => 'add', '_controller' => 'App\\Controller\\BuildingController::add'], null, null, null, false, false, null]],
        '/employees' => [[['_route' => 'employees', '_controller' => 'App\\Controller\\EmployeeController::index'], null, null, null, false, false, null]],
        '/employee/add' => [[['_route' => 'add_employee', '_controller' => 'App\\Controller\\EmployeeController::addEmployee'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/offices' => [[['_route' => 'offices', '_controller' => 'App\\Controller\\OfficeController::home'], null, null, null, false, false, null]],
        '/office/add' => [[['_route' => 'add_office', '_controller' => 'App\\Controller\\OfficeController::addOffice'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/building/(?'
                    .'|edit/([^/]++)(*:195)'
                    .'|delete/([^/]++)(*:218)'
                .')'
                .'|/employee/(?'
                    .'|edit/(\\d+)(*:250)'
                    .'|delete/(\\d+)(*:270)'
                .')'
                .'|/office/(?'
                    .'|edit/(\\d+)(*:300)'
                    .'|delete/(\\d+)(*:320)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        195 => [[['_route' => 'edit', '_controller' => 'App\\Controller\\BuildingController::edit'], ['id'], null, null, false, true, null]],
        218 => [[['_route' => 'delete', '_controller' => 'App\\Controller\\BuildingController::delete'], ['id'], null, null, false, true, null]],
        250 => [[['_route' => 'edit_employee', '_controller' => 'App\\Controller\\EmployeeController::editEmployee'], ['id'], null, null, false, true, null]],
        270 => [[['_route' => 'delete_employee', '_controller' => 'App\\Controller\\EmployeeController::deleteEmployee'], ['id'], null, null, false, true, null]],
        300 => [[['_route' => 'edit_office', '_controller' => 'App\\Controller\\OfficeController::editOffice'], ['id'], null, null, false, true, null]],
        320 => [
            [['_route' => 'delete_office', '_controller' => 'App\\Controller\\OfficeController::deleteOffice'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
