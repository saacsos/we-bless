<?php

namespace App\Console\Commands;

use App\Models\Apartment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ApartmentList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apartment:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List apartment in CSV format';

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
     * @return int
     */
    public function handle()
    {
        $response = Http::get('http://localhost:8000/api/apartments');
        $apartments = json_decode($response->body(), true);
        echo "name,num_floor,num_room\n";
        foreach($apartments as $apartment) {
            echo "{$apartment['name']},{$apartment['num_floor']},{$apartment['num_room']}\n";
        }
        return 0;
    }
}
