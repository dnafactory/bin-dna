<?php

if (!function_exists('whoAmI')) {
    function whoAmI()
    {
        $who = app()->make(\App\Modules\Me\Api\WhoAmIInterface::class);
        return $who->execute();
    }
}
