<?php

namespace App\Console\Commands;

use App\Helpers\APIFetch;
use App\Post;
use Illuminate\Console\Command;

class FetchPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from ​https://jsonplaceholder.typicode.com/posts';

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
        $data = ApiFetch::request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $json = json_decode($data->getBody(), true);
        // print_r($json);
        foreach($json as $each){
            Post::create($each);
        }
        echo 'Posts successfully imported!';
    }
}
