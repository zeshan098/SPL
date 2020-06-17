<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;

class ReturnCase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReturnCase:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return last 3 days cases';

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
        $return_case = DB::select(" SELECT * FROM `dr_cases` WHERE Date_Format(created_at, '%Y-%m-%d') = ( CURDATE() - INTERVAL 3 DAY )
                                   and current_case_handler = 'zm' " );
        foreach ($return_case as $return) { 
            $update_zm_case = DB::table('dr_cases')->where('id', $return->id)
                            ->update(['is_rejected_zm'=> 1]);
             
        }
             
 
    }
}
