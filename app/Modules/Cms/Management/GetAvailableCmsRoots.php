<?php

namespace App\Modules\Cms\Management;

use App\Modules\Cms\Api\GetAvailableCmsRootsInterface;

class GetAvailableCmsRoots implements GetAvailableCmsRootsInterface
{
    public function execute(): array
    {
        return config('cms.roots');
    }
}
