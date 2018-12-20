<?php

namespace Statamic\Addons\SeoTool;

use Statamic\Extend\Tasks;
use Illuminate\Console\Scheduling\Schedule;

class SeoToolTasks extends Tasks
{
    /**
     * Define the task schedule
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    public function schedule(Schedule $schedule)
    {
        // $schedule->command('cache:clear')->weekly();
    }
}
