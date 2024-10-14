<?php

namespace App\Filament\Resources\System\Info\PrivacyPolicyResource\Pages;

use App\Filament\Resources\System\Info\PrivacyPolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrivacyPolicies extends ListRecords
{
    protected static string $resource = PrivacyPolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['last_update_by'] = auth()->id();
                return $data;
            }),
        ];
    }
}
