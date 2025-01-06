<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Users\Service\UserServiceResource;
use App\Models\Users\Service\UserService;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class UsersServicesOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '120s';

    protected static ?int $sort = 2;

    public static function canView(): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 10]));
    }

    protected function getHeading(): ?string
    {
        return __('keys.users services');
    }

    protected function getStats(): array
    {
        $servicesThisWeek = $this->getServicesThisWeekCount();

        $servicesThisMonth = $this->getServicesThisMonthCount();

        $servicesAllTime = $this->getAllServicesCount();

        $servicesChartArray = $this->getServicesChartArray();

        if ($servicesChartArray[count($servicesChartArray) - 2] != 0) {
            if ($servicesThisMonth < $servicesChartArray[count($servicesChartArray) - 2]) {
                $monthDesc = '- ' . (100 - round(($servicesThisMonth * 100) / $servicesChartArray[count($servicesChartArray) - 2], 1)) . '%';
                $monthDescIcon = 'heroicon-m-arrow-trending-down';
                $monthDescColor = 'danger';
            } else {
                $monthDesc = '+ ' . (round(($servicesThisMonth * 100) / $servicesChartArray[count($servicesChartArray) - 2], 1) - 100) . '%';
                $monthDescIcon = 'heroicon-m-arrow-trending-up';
                $monthDescColor = 'success';
            }
        } else {
            $monthDesc = '0%';
            $monthDescIcon = '';
            $monthDescColor = 'warning';
        }

        return [
            Stat::make(__("keys.this week"), $servicesThisWeek)
                ->color('success')
                ->url(UserServiceResource::getUrl('index')),
            Stat::make(__("keys.this month"), $servicesThisMonth)
                ->description($monthDesc)
                ->descriptionIcon($monthDescIcon)
                ->color($monthDescColor)
                ->url(UserServiceResource::getUrl('index')),
            Stat::make(__("keys.all time"), $servicesAllTime)
                ->chart($servicesChartArray)
                ->url(UserServiceResource::getUrl('index'))
        ];
    }

    protected static function getStartOfWeek(): CarbonImmutable
    {
        $ar = CarbonImmutable::now()->locale('ar');
        return $ar->startOfWeek(Carbon::SUNDAY);
    }

    protected function getServicesThisWeekCount(): int
    {
        return UserService::query()
            ->where("created_at", ">=", self::getStartOfWeek()->format("Y-m-d H:i:s"))
            ->count();
    }

    protected function getServicesThisMonthCount(): int
    {
        return UserService::query()
            ->where("created_at", ">=", Carbon::now()->startOfMonth()->format("Y-m-d H:i:s"))
            ->count();
    }

    protected function getAllServicesCount(): int
    {
        return UserService::query()
            ->count();
    }

    protected function getServicesChartArray()
    {
        $startYear = UserService::query()->min(DB::raw('YEAR(created_at)'));
        $endYear = UserService::query()->max(DB::raw('YEAR(created_at)'));

        $months = [];

        for ($year = $startYear; $year <= $endYear; $year++) {
            $year == now()->year ? $cMonth = now()->month : $cMonth = 12;
            for ($month = 1; $month <= $cMonth; $month++) {
                $months["$year-$month"] = 0;
            }
        }

        $servicesCounts = DB::table('user_services')
            ->select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count'))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        foreach ($servicesCounts as $servicesCount) {
            $months["$servicesCount->year-$servicesCount->month"] = $servicesCount->count;
        }

        $serviceCountsArray = array_values($months);

        return $serviceCountsArray;
    }
}
