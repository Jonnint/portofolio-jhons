<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Portfolio;
use App\Models\Guestbook;
use App\Models\Visitor;
use App\Models\Message;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Portfolios', Portfolio::count())
                ->description('Projects published on your website')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary'),
            Stat::make('Total Guestbook Entries', Guestbook::count())
                ->description(Guestbook::where('is_approved', false)->count() . ' pending moderation')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),
            Stat::make('Total Visitors', Visitor::count())
                ->description('Unique site visits tracked')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Unread Messages', Message::where('is_read', false)->count())
                ->description('Inbox contact requests')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
        ];
    }
}
