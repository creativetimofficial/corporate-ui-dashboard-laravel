<?php

function is_current_route($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}


function in_array_r($needle, $haystack, $strict = false)
{
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}


function getCategoriesArray($parent, $child = null)
{
    $categories = array(
        'dashboard', 'tables', 'wallet', 'RTL',

        'laravel-examples' => array(
            'user-profile',
            'user' => array('users-management', 'edit-users', 'add-users'),
            'category' => array('category-management', 'edit-category', 'add-category'),
            'role' => array('role-management', 'edit-role', 'add-role'),
            'tag' => array('tag-management', 'edit-tag', 'add-tag'),
            'item' => array('item-management', 'edit-item', 'add-item')
        ),

        'pages' => array(
            'profile' => array('overview', 'teams', 'all_projects'),
            'users' => array('reports', 'new-user'),
            'account' => array('settings', 'billing', 'invoice', 'security'),
            'projects' => array('general', 'timeline', 'new_projects'),
            'messages',
            'pricing-page',
            'widgets',
            'charts',
            'sweet-alerts',
            'notifications'
        ),

        'applications' => array('kanban', 'wallet', 'wizard', 'datatables', 'calendar', 'analytics-page'),

        'ecommerce' => array(
            'overview-ecommerce',
            'products' => array('new-product', 'edit-product', 'product-page', 'products-list'),
            'orders' => array('list', 'details'),
            'referral'
        ),

        'authentication' => array(
            'error' => array('404', '500'),
            'lock' => array('basic-lock', 'cover-lock', 'illustration-lock'),
            'reset' => array('basic-reset', 'cover-reset', 'illustration-reset'),
            'sign-in' => array('basic-signin', 'cover-signin', 'illustration-signin'),
            'sign-up' => array('basic-signup', 'cover-signup', 'illustration-signup'),
            'verification' => array('basic-verification', 'cover-verification', 'illustration-verification'),
        ),

        'guest-dark' => array(
            'forgot-password', 'reset-password',
            'error404', 'error500',
            'cover-sign-in', 'illustration-sign-in',
            'cover-lock', 'illustration-lock',
            'basic-reset', 'cover-reset', 'illustration-reset',
            'cover-sign-up', 'illustration-sign-up',
            'cover-verification', 'illustration-verification'
        ),
    );

    if ($child)
        return $categories[$parent][$child];
    else
        return $categories[$parent];
}
