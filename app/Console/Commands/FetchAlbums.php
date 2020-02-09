<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\APIFetch;
use App\Album;

class FetchAlbums extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'albums:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from ​https://jsonplaceholder.typicode.com/albums';

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
        $data = ApiFetch::request('GET', 'https://jsonplaceholder.typicode.com/albums');
        $json = json_decode($data->getBody(), true);
        // print_r($json);
        foreach($json as $each){
            Album::create($each);
        }
        echo 'Albums successfully imported!';
    }
}
