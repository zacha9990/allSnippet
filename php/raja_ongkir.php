<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class RajaOngkir extends Model
{
  function getProvince()
  {
       $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $decoded = json_decode($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            foreach($decoded->rajaongkir->results as $key=>$result)
            {
              $result->selected='';
            }

            $results = $decoded->rajaongkir->results;


          return $results;
        }
  }

  function getDistrict($idProv)
  {
      $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=$idProv",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $decoded = json_decode($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $results = $decoded->rajaongkir->results;
          return $results;
        }
  }

  function getSubdistrict($idKab)
  {
     $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=$idKab",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $decoded = json_decode($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $results = $decoded->rajaongkir->results;
          return $results;
        }
  }

	function getProvinceNameByID($idProv)
	{
		    $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/province?id=$idProv",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $decoded = json_decode($response);

        // dd($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $results = $decoded->rajaongkir->results->province;
          return $results;
        }
	}

	 public function getCityNameByID($idCity)
     {   
            $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/city?id=$idCity",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $decoded = json_decode($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return $decoded->rajaongkir->results->city_name;
        }
     } 

     public function getSubdistrictNameByID($idSubdistrict)
     {   
            $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?id=$idSubdistrict",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $decoded = json_decode($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return $decoded->rajaongkir->results->subdistrict_name;
        }
     } 

     public function provinceByIdSelected($idProvSelected)
     {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/province?",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
 
        curl_close($curl);

        $decoded = json_decode($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {

          if($idProvSelected != 'semua provinsi'){
               $provinsi[0] = new \stdClass;
               $provinsi[0]->province_id = 'semua provinsi';
               $provinsi[0]->province = 'Semua Provinsi';
               $provinsi[0]->selected = '';
               
               $a= 1;
            foreach ($decoded->rajaongkir->results as $key => $value) {

                $provinsi[$a] = new \stdClass;
                $provinsi[$a]->province_id = $value->province_id;
                $provinsi[$a]->province = $value->province;

                  if($value->province_id == $idProvSelected)
                  {
                    $provinsi[$a]->selected='selected';
                  }
                  else{ $provinsi[$a]->selected=''; }

                $a++;
            }

            $decoded->rajaongkir->results = $provinsi;

          }else{

            $provinsi[0] = new \stdClass;
            $provinsi[0]->province_id = 'semua provinsi';
            $provinsi[0]->province = 'Semua Provinsi';
            $provinsi[0]->selected = 'selected';
            $a= 1;

              foreach ($decoded->rajaongkir->results as $key => $value) {

                $provinsi[$a] = new \stdClass;
                $provinsi[$a]->province_id = $value->province_id;
                $provinsi[$a]->province = $value->province;
                $provinsi[$a]->selected = '';
                $a++;
              }
            $decoded->rajaongkir->results = $provinsi;

          }

          return $decoded->rajaongkir->results;
        }

     }

     public function cityByIdSelected($idCitySelected, $idProvSelected)
     {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=$idProvSelected",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $decoded = json_decode($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          if($idCitySelected != 'semua kabupaten'){

              $kab[0] = new \stdClass;
              $kab[0]->city_id = 'semua kabupaten';
              $kab[0]->city_name = 'Semua Kabupaten';
              $kab[0]->selected = '';
              $a=1;
              foreach ($decoded->rajaongkir->results as $key => $city) {
                  $kab[$a] = new \stdClass;
                  $kab[$a]->city_id = $city->city_id;

                    ($city->type == 'Kota')? $kota = "(Kota)" : $kota = "";

                  $kab[$a]->city_name = $city->city_name." ".$kota;

                    ($idCitySelected==$city->city_id)? $selected='selected': $selected='';

                  $kab[$a]->selected = $selected;

                  $a++;
              }

             $decoded->rajaongkir->results = $kab;
              
          }else{

              $kab[0] = new \stdClass;
              $kab[0]->city_id = 'semua kabupaten';
              $kab[0]->city_name = 'Semua Kabupaten';
              $kab[0]->selected = 'selected';
              $a=1;
              foreach ($decoded->rajaongkir->results as $key => $city) {
                  $kab[$a] = new \stdClass;
                  $kab[$a]->city_id = $city->city_id;

                    ($city->type == 'Kota')? $kota = "(Kota)" : $kota = "";

                  $kab[$a]->city_name = $city->city_name." ".$kota;
                  $kab[$a]->selected = '';
                  $a++;
              }

              $decoded->rajaongkir->results = $kab;
          }

          return $decoded->rajaongkir->results;
        }
     }

     public function subdistrictByIdSelected($idSubdistricSelected, $idCitySelected)
     {
        $idCitySelected = trim($idCitySelected);
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=$idCitySelected",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 3ac06df454d90d4a5717ad63354de2fc"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $decoded = json_decode($response);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          if($idSubdistricSelected != 'semua kecamatan'){
              $kec[0] = new \stdClass;
              $kec[0]->subdistrict_id = 'semua kecamatan';
              $kec[0]->subdistrict_name = 'Semua Kecamatan';
              $kec[0]->selected = '';
              $a=1;
              foreach ($decoded->rajaongkir->results as $key => $subdistrict) {
                  $kec[$a] = new \stdClass;
                  $kec[$a]->subdistrict_id = $subdistrict->subdistrict_id;
                  $kec[$a]->subdistrict_name = $subdistrict->subdistrict_name;
                    ($subdistrict->subdistrict_id == $idSubdistricSelected)? $select = 'selected' : $select='';
                  $kec[$a]->selected = $select;
                  $a++;
              }

              $decoded->rajaongkir->results = $kec;
          
          }else{
              $kec[0] = new \stdClass;
              $kec[0]->subdistrict_id = 'semua kecamatan';
              $kec[0]->subdistrict_name = 'Semua Kecamatan';
              $kec[0]->selected = 'selected';
              $a=1;
              
              foreach ($decoded->rajaongkir->results as $key => $subdistrict) {
                  $kec[$a] = new \stdClass;
                  $kec[$a]->subdistrict_id = $subdistrict->subdistrict_id;
                  $kec[$a]->subdistrict_name = $subdistrict->subdistrict_name;
                  $kec[$a]->selected = '';
                  $a++;
              }

              $decoded->rajaongkir->results = $kec;
          }

          return $decoded->rajaongkir->results;
        }

     }

}
