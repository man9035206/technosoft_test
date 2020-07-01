<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\EmployeeWebHistory;
class unsetEmpWebData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:UNSET empwebhistory {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroy web history';

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
        $ip_address = $this->argument('ip');
        $employee = EmployeeWebHistory::where('ip_address',$ip_address)->delete();
        if($employee){
            $this->info("Employee web history Deleted Successfully");
        }else{
            $this->info("Resource not found");
        }
    }
}
