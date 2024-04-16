<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FileProcessService;

class FilesProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'files:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download files and update database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $service = new FileProcessService();
        $service->download();
    }
}
