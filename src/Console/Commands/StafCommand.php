<?php namespace Bantenprov\Staf\Console\Commands;

use Illuminate\Console\Command;

/**
 * The StafCommand class.
 *
 * @package Bantenprov\Staf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StafCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:staf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\Staf package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\Staf package');
    }
}
