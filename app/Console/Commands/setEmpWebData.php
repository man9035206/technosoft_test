<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\EmployeeWebHistory;
class setEmpWebData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:SET empwebhistory {ip_address} {url} {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store Employee web history';

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
        $emp = new EmployeeWebHistory;
        $emp->ip_address = $this->argument('ip_address');
        $emp->url = $this->argument('url');
        $emp->date = $this->argument('date');
        $emp->save();
        echo json_encode($emp);
    }
}
