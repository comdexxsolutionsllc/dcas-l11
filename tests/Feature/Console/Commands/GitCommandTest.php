<?php

declare(strict_types=1);

it('outputs "git status" result', function (): void {
    $this->artisan('git:status')
        ->expectsOutputToContain('On branch main')
        ->assertExitCode(0);
});
