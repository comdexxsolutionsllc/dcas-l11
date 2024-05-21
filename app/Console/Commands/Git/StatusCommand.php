<?php

declare(strict_types=1);

namespace App\Console\Commands\Git;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class StatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the current git status';

    /**
     * Indicates whether only one instance of the command can run at any given time.
     *
     * @var bool
     */
    protected $isolated = true;

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $result = Process::run('git status --long --renames');

        if ($result->successful()) {
            $this->line($result->output());
        }
    }
}
