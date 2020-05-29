<?php

namespace App\Modules\Cms\Api;

interface GetCmsRootInterface
{
    public function execute(string $name): array;
}
