<?php
if (!function_exists('getUserFullName')) {
    function getUserFullName(): string
    {
        $user = Auth::user();
        return $user->first_name . ' ' . $user->last_name;
    }
}
if (!function_exists('activeAccountSidemenuItem')) {
    function activeAccountSidemenuItem(string $targetRoute): string
    {
        $activeClass = 'bg-blue-500/10 text-blue-500';
        $defaultClass = 'hover:text-blue-500';
        $currentRoute = Route::currentRouteName();

        if ($currentRoute == $targetRoute) {
            return $activeClass;
        }
        return $defaultClass;
    }
}
