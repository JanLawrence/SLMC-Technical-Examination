<?php

namespace App\Console\Commands;

use App\Helpers\ApiFetch;
use Illuminate\Console\Command;
use App\User;

class FetchUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from ​https://jsonplaceholder.typicode.com/users';

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
        $data = ApiFetch::request('GET', 'https://jsonplaceholder.typicode.com/users');
        $json = json_decode($data->getBody());
        foreach($json as $each){

            $user = User::find($each->id);
            if(!$user){
                $insert = [
                    'name' => $each->name,
                    'username' => $each->username,
                    'email' => $each->email,
                    'addressStreet' => $each->address->street,
                    'addressSuite' => $each->address->suite,
                    'addressCity' => $each->address->city,
                    'addressZipcode' => $each->address->zipcode,
                    'addressGeoLat' => $each->address->geo->lat,
                    'addressGeoLng' => $each->address->geo->lng,
                    'phone' => $each->phone,
                    'website' => $each->website,
                    'companyName' => $each->company->name,
                    'companyCatchPhrase' => $each->company->catchPhrase,
                    'companyBs' => $each->company->bs
                ];
                User::create($insert);
            }
        }
        echo 'Users successfully imported!';
    }
}
