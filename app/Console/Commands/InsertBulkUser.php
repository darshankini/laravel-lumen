<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InsertBulkUser extends Command
{

    protected $signature = 'insert:ten-records';

    protected $description = 'Inserts 10 records into the users table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\InsertBulkUserSeeder'
        ]);

        $this->info('10 records inserted successfully.');
        return 0;
    }
}
