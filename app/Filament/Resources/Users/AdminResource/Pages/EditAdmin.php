<?php

namespace App\Filament\Resources\Users\AdminResource\Pages;

use App\Filament\Resources\Users\AdminResource;
use App\Models\Administration\Account\AdminProfile;
use App\Models\User;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditAdmin extends EditRecord
{
    protected static string $resource = AdminResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['about_user'] = AdminProfile::where("user_id", $data["id"])->first(["about_user"])->about_user;

        $data["deactive_at"] ? $data["deactive_at_toggle"] = false
            : $data["deactive_at_toggle"] = true;

        return $data;
    }

    protected function handleRecordUpdate($record, array $data): User
    {
        if (empty($data['password']))
            unset($data['password']);

        if ($data["img_url"] != $record->img_url && $record->img_url)
            Storage::disk('public')->delete($record->img_url);

        if (!$record->deactive_at && !$data["deactive_at_toggle"])
            $data["deactive_at"] = Carbon::now()->format('Y-m-d H:i:s');

        if ($data["deactive_at_toggle"])
            $data["deactive_at"] = null;

        $record->update($data);
        $record->adminProfile->update([
            'about_user' => $data["about_user"],
        ]);

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
        ];
    }
}
