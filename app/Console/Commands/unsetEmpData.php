<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;
class unsetEmpData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:UNSET empdata {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroy emp data by ip_address';

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
        $employee = Employee::where('ip_address',$ip_address)->delete();
        if($employee){
            $this->info("Employee Deleted Successfully");
        }else{
            $this->info("Resource not found");
        }
    }
}
