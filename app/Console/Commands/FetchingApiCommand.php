<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Province;
use App\Models\City;
use App\Http\Resources\CityResource;
use Illuminate\Support\Arr;

use Illuminate\Console\Command;

class FetchingApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetching_raja_ongkir_command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching Data Raja Ongkir';

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
      //insert province
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key:0df6d5bf733214af6c6644eb8717c92c"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        // response
        $response=json_decode($response,true);
        $data_province = $response['rajaongkir']['results'];

        //insert data
        Province::insert($data_province);

      }

      // insert city
      $curl2 = curl_init();

      curl_setopt_array($curl2, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key:0df6d5bf733214af6c6644eb8717c92c"
        ),
      ));

      $response2 = curl_exec($curl2);
      $err2 = curl_error($curl2);

      curl_close($curl2);

      if ($err2) {
        echo "cURL Error #:" . $err2;
      } else {
        // response
        $response2=json_decode($response2,true);
        $data_city = collect($response2['rajaongkir']['results']);
        $data_city->transform(function(array $item) {
            return Arr::except($item, 'province');
        });

        $data= json_decode( json_encode($data_city), true);

        //insert data
        City::insert($data);
      }

     $this->info('Command Berhasil di jalankan!');
     return 0;
    }
}
