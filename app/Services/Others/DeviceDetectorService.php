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
        $device = new DeviceDetector($userAgent);
        $device->parse();
        return "{$device->getDeviceName()}-{$device->getOs('name')}{$device->getOs('version')}/{$device->getClient('name')} {$device->getClient('type')}";
    }
}
