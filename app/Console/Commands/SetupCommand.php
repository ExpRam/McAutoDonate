<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mcautodonate:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setups the mcautodonate';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('key:generate');
        Artisan::call('storage:link');
        exec('npm run build');
        return Command::SUCCESS;
    }
}
