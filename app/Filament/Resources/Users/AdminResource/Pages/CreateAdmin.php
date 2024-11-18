<?php

namespace App\Filament\Resources\Users\AdminResource\Pages;

use App\Filament\Resources\Users\AdminResource;
use App\Models\Administration\Account\AdminProfile;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;

    protected function afterCreate(): void
    {
        $data = $this->data;
        $record = $this->record;
        AdminProfile::create([
            'user_id' => $record->id,
            'about_user' => $data["about_user"],
            'created_by' => Auth()->id(),
        ]);
    }
}
