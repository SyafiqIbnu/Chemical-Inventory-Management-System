<?php

namespace App\Console\Commands;

use App\Project;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use DB;

/**
 * Check all project that have been overdue and change its status to Completed
 *
 * Class ForceCompleteOverdueProject
 * @package App\Console\Commands
 */
class QueueWorkStopWhenEmptyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue-work-stop-when-empty';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email';

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
        $numJobs = DB::table('jobs')->count();
        echo $numJobs;
        //exit();
        while(true){
            $numJobs = DB::table('jobs')->count();
            if($numJobs==0){
                break;
            }
            
            Artisan::call('queue:work',['--once'=>' ']);
            
        }
    }
}
