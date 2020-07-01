<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;
class setEmpData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:SET empdata {emp_id} {epm_name} {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'store employee record';

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
        $emp = new Employee;
        $emp->emp_id = $this->argument('emp_id');
        $emp->epm_name = $this->argument('epm_name');
        $emp->ip_address = $this->argument('ip_address');
        $emp->save();
        echo json_encode($emp);
    }
}
