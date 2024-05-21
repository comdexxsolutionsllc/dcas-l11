<?php

declare(strict_types=1);

namespace App\Console\Commands\Git;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class CommitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:commit {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commit changes to the repository';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $message = $this->argument('message');

        $result = Process::run(['git', 'commit', '--all', '--signoff', '--message', $message]);

        if ($result->successful()) {
            $this->info('Commit successful');
        } else {
            $this->error('Commit failed: ' . $result->errorOutput());
        }
    }
}
