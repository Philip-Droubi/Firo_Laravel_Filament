<?php

namespace App\Filament\Classes\Auth;

use App\Models\User;
use App\Models\Users\Account\LoginHistory;
use App\Services\Others\DeviceDetectorService;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Validation\ValidationException;
use \Filament\Pages\Auth\Login as FilamentLogin;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class Login extends FilamentLogin
{
    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();

            return null;
        }
        DB::beginTransaction();

        $data = $this->form->getState();

        if (! Filament::auth()->attempt($this->getCredentialsFromFormData($data), $data['remember'] ?? false)) {
            $this->throwFailureValidationException();
        }

        $user = Filament::auth()->user();

        if (
            ($user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            Filament::auth()->logout();

            $this->throwFailureValidationException();
        }

        $this->createLoginHistory($user);

        session()->regenerate();

        DB::commit();

        return app(LoginResponse::class);
    }

    protected function createLoginHistory(User $user): void
    {
        $deviceDetector = new DeviceDetectorService();
        $ip = Location::get(request()->ip());
        LoginHistory::create([
            "ip_address" => $ip ? $ip->ip : "0.0.0.0",
            "country_code" => $ip ? $ip->countryCode : "N/A",
            "country" => $ip ? $ip->countryName : "N/A",
            "city" => $ip ? $ip->cityName : "N/A",
            "user_id" => $user->id,
            "device_name" => $deviceDetector->getName(request()->userAgent()),
        ]);
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.identifier' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getIdentifierFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getIdentifierFormComponent(): Component
    {
        return TextInput::make('identifier')
            ->label(__(__('keys.Email / Username')))
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        $login_type = filter_var($data['identifier'], FILTER_VALIDATE_EMAIL) ? 'email' : 'account_name';

        return [
            $login_type => $data['identifier'],
            'password' => $data['password'],
        ];
    }
}
