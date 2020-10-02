<?php declare(strict_types=1);

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\Events\PublishScheduledEventsCommand;
use App\Console\Commands\Articles\PublishScheduledArticlesCommand;
use App\Console\Commands\Packages\PublishScheduledPackagesCommand;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command(PublishScheduledArticlesCommand::class)->hourly();
        $schedule->command(PublishScheduledEventsCommand::class)->hourly();
        $schedule->command(PublishScheduledPackagesCommand::class)->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
