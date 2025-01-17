<?php

namespace App\Providers\Filament;

use App\Filament\Classes\Auth\Login;
use App\Filament\Resources\Users\AdminResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\SpatieLaravelTranslatablePlugin;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Platform;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->favicon(asset(path: 'assets/logo/logo_ico.png'))
            ->brandLogo(fn() => view('brand'))
            ->profile(isSimple: false)
            ->userMenuItems([
                'profile' => MenuItem::make()
                    ->url(fn(): string => AdminResource::getUrl('view', [auth()->id()])),
                MenuItem::make()
                    ->url("/admin/logoutAll")
                    ->label(fn(): string => __("keys.logout all"))
                    ->icon('eos-devices')
                    ->postAction(function () {}),
                'logout' => MenuItem::make(),
            ])
            ->login(Login::class)
            ->sidebarCollapsibleOnDesktop()
            ->spa()
            ->databaseTransactions()
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->globalSearchDebounce('750ms')
            ->globalSearchFieldKeyBindingSuffix()
            ->globalSearchFieldSuffix(fn(): ?string => match (Platform::detect()) {
                Platform::Windows, Platform::Linux => 'CTRL+K',
                Platform::Mac => '⌘K',
                default => null,
            })
            // ->unsavedChangesAlerts()
            ->navigationGroups([
                NavigationGroup::make()
                    ->label(fn(): string => __('keys.system users'))
                    ->collapsed(),
                NavigationGroup::make()
                    ->label(fn(): string => __('keys.system services'))
                    ->collapsed(),
                NavigationGroup::make()
                    ->label(fn(): string => __('keys.logs'))
                    ->collapsed(),
                NavigationGroup::make()
                    ->label(fn(): string => __('keys.system info'))
                    ->collapsed(),
                NavigationGroup::make()
                    ->label(fn(): string => __('keys.system management'))
                    ->collapsed(),
            ])
            ->plugin(
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(config("custom.accepted_languages")),
            )
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \App\Http\Middleware\UpdateLastSeen::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
