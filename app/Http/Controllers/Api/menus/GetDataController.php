<?php

namespace App\Http\Controllers\api\menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Province;
use App\Models\City;
use Illuminate\Support\Arr;
use App\Http\Resources\ProvinsiResource;
use App\Http\Resources\KotaResource;

class GetDataController extends Controller
{
  public function get_province_from_db($province_id){
    if(Province::where('province_id',$province_id)->doesntExist()){
      return $this->sendError("Data Tidak di temukan", $province_id);
    }

    $data = Province::where('province_id',$province_id)
    ->get();

    return $this->sendResponse($data, "Provinsi Berhasil di ambil dari Database");

    }

  public function get_city_from_db($city_id){
    if(City::where('city_id',$city_id)->doesntExist()){
      return $this->sendError("Data Tidak di temukan", $city_id);
    }

    $data = City::with(['province'])
    ->where('city_id',$city_id)
    ->get();

    $dataresource = KotaResource::collection($data);

    return $this->sendResponse($dataresource, "Kota Berhasil di ambil dari Database");

    }

  public function get_province_from_direct_api($province_id){
    //insert province
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=$province_id",
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

      if(count($data_province)==0){
          return $this->sendError("Data Tidak di temukan", $province_id);
      }


    }
    return $this->sendResponse($po, "Provinsi Berhasil di ambil dari Direct API");

    }

  public function get_city_from_direct_api($city_id){
    $curl2 = curl_init();

    curl_setopt_array($curl2, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$city_id",
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
      $data_city = $response2['rajaongkir']['results'];

      if(count($data_city)==0){
          return $this->sendError("Data Tidak di temukan", $city_id);
      }
    }

    return $this->sendResponse($data_city, "Kota Berhasil di ambil dari Direct API");

    }
}
