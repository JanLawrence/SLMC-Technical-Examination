<?php

namespace App\Console\Commands;

use App\Helpers\APIFetch;
use App\Todo;
use Illuminate\Console\Command;

class FetchTodos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todos:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from ​https://jsonplaceholder.typicode.com/todos';

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
        $data = ApiFetch::request('GET', 'https://jsonplaceholder.typicode.com/todos');
        $json = json_decode($data->getBody());
        // print_r($json);
        foreach($json as $each){

            $insert = [
                'userId' => $each->userId,
                'title' => $each->title,
                'completed' => $each->completed == false ? 'false' : 'true'
            ];
            Todo::create($insert);
        }
        echo 'Todos successfully imported!';
    }
}
