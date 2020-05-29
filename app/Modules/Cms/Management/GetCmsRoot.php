<?php

namespace App\Modules\Cms\Management;


use App\Modules\Cms\Api\GetAvailableCmsRootsInterface;
use App\Modules\Cms\Api\GetCmsRootInterface;
use App\Modules\Cms\Exception\CmsRootNotFoundException;

class GetCmsRoot implements GetCmsRootInterface
{
    /**
     * @var GetAvailableCmsRootsInterface
     */
    private $getAvailableCmsRoots;

    public function __construct(
        GetAvailableCmsRootsInterface $getAvailableCmsRoots
    ) {
        $this->getAvailableCmsRoots = $getAvailableCmsRoots;
    }

    public function execute(string $name): array
    {
        $cmsRoots = $this->getAvailableCmsRoots->execute();

        if (!array_key_exists($name, $cmsRoots)) {
            throw new CmsRootNotFoundException("CMS non trovata");
        }

        return $cmsRoots[$name];
    }
}
