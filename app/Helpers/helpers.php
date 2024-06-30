<?php

if (!function_exists('is_current_route')) {
    function is_current_route($route)
    {
        return request()->routeIs($route);
    }
}
