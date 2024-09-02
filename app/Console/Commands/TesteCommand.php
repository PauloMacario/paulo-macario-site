<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TesteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:teste-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        logger()->info('############ TESTE SCHEDULE - CONTAB ###############');
    }
}
