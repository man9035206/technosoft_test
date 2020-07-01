<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\EmployeeWebHistory;
class getEmpWebData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:GET empwebhistory {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get employeee web history by ip';

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
        $employee_web_history = EmployeeWebHistory::select('ip_address', 'url', 'date')->where('ip_address', $ip_address)->get();
        if (count($employee_web_history) > 0) {
            echo json_encode($employee_web_history);
        }else{
            $this->info("NULL");
        }
    }
}
