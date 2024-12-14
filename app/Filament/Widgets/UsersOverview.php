<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class UsersOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '120s';

    protected static ?int $sort = 1;

    protected function getHeading(): ?string
    {
        return __('keys.new users');
    }

    protected function getStats(): array
    {
        $usersThisWeek = $this->getUsersThisWeekCount();

        $usersThisMonth = $this->getUsersThisMonthCount();

        $usersAllTime = $this->getAllUsersCount();

        $usersChartArray = $this->getYearUsersChartArray();

        if ($usersChartArray[count($usersChartArray) - 2] != 0) {
            if ($usersThisMonth < $usersChartArray[count($usersChartArray) - 2]) {
                $monthDesc = '- ' . round(($usersThisMonth * 100) / $usersChartArray[count($usersChartArray) - 2], 1) . '%';
                $monthDescIcon = 'heroicon-m-arrow-trending-down';
                $monthDescColor = 'danger';
            } else {
                $monthDesc = '+ ' . round(($usersThisMonth * 100) / $usersChartArray[count($usersChartArray) - 2], 1) . '%';
                $monthDescIcon = 'heroicon-m-arrow-trending-up';
                $monthDescColor = 'success';
            }
        } else {
            $monthDesc = '0%';
            $monthDescIcon = '';
            $monthDescColor = 'warning';
        }

        return [
            Stat::make(__("keys.this week"), $usersThisWeek)
                ->color('success')
                ->url(UserResource::getUrl('index')),
            Stat::make(__("keys.this month"), $usersThisMonth)
                ->description($monthDesc)
                ->descriptionIcon($monthDescIcon)
                ->color($monthDescColor)
                ->url(UserResource::getUrl('index')),
            Stat::make(__("keys.all time"), $usersAllTime)
                ->chart($usersChartArray)
                ->url(UserResource::getUrl('index'))
        ];
    }

    protected static function getStartOfWeek(): CarbonImmutable
    {
        $ar = CarbonImmutable::now()->locale('ar');
        return $ar->startOfWeek(Carbon::SUNDAY);
    }

    protected function getUsersThisWeekCount(): int
    {
        return User::query()
            ->where("role_id", 3)
            ->where("created_at", ">=", self::getStartOfWeek()->format("Y-m-d H:i:s"))
            ->count();
    }

    protected function getUsersThisMonthCount(): int
    {
        return User::query()
            ->where("role_id", 3)
            ->where("created_at", ">=", Carbon::now()->startOfMonth()->format("Y-m-d H:i:s"))
            ->count();
    }

    protected function getAllUsersCount(): int
    {
        return User::query()
            ->where("role_id", 3)
            ->count();
    }

    protected function getYearUsersChartArray()
    {
        $startYear = User::query()->where('role_id', 3)->min(DB::raw('YEAR(created_at)'));
        $endYear = User::query()->where('role_id', 3)->max(DB::raw('YEAR(created_at)'));

        $months = [];

        for ($year = $startYear; $year <= $endYear; $year++) {
            for ($month = 1; $month <= 12; $month++) {
                $months["$year-$month"] = 0;
            }
        }

        $userCounts = DB::table('users')
            ->select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count'))
            ->where('role_id', 3)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        foreach ($userCounts as $userCount) {
            $months["$userCount->year-$userCount->month"] = $userCount->count;
        }

        $userCountsArray = array_values($months);

        return $userCountsArray;
    }
}