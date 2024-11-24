<?php

namespace App\Services\Others;

use App\Services\MainService;
use DeviceDetector\DeviceDetector;

/**
 * Class DeviceDetectorService.
 */
class DeviceDetectorService extends MainService
{
    public function getName(string $userAgent): string
    {
        $dd = new DeviceDetector($userAgent);
        $dd->parse();
        return "{$dd->getDeviceName()}-{$dd->getOs('name')}{$dd->getOs('version')}/{$dd->getClient('name')} {$dd->getClient('type')}";
    }
}
