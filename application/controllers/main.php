<?php  
/**
* 
*/
class Main extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function index(){
		$this->load->view('index');
	}

	public function get_price(){
        $url= "https://api.uber.com/v1/estimates/price";
        $parameters = array(
            "start_latitude" => $this->input->post('start_latitude'),
            "start_longitude" => $this->input->post('start_longitude'),
            "end_latitude" => $this->input->post('end_latitude'),
            "end_longitude" => $this->input->post('end_longitude'),
        );
        $url.="?start_latitude=".$parameters['start_latitude'];
        $url.="&start_longitude=".$parameters['start_longitude'];
        $url.="&end_latitude=".$parameters['end_latitude'];
       	$url.="&end_longitude=".$parameters['end_longitude'];

       	// $test_url='https://api.uber.com/v1/estimates/price?start_latitude=37.7759792&start_longitude=-122.41823&end_latitude=38&end_longitude=-122';
       	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Token gA6j4S1t5EEAZUrcy6Xplift8BEFXRc6Zxwai8CQ',

		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo ($response);
		}

	}

	public function get_time(){
		$url= "https://api.uber.com/v1/estimates/time";
        $parameters = array(
            "start_latitude" => $this->input->post('start_latitude'),
            "start_longitude" => $this->input->post('start_longitude'),
        );
        $url.="?start_latitude=".$parameters['start_latitude'];
        $url.="&start_longitude=".$parameters['start_longitude'];

       	// $test_url='https://api.uber.com/v1/estimates/price?start_latitude=37.7759792&start_longitude=-122.41823&end_latitude=38&end_longitude=-122';
       	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Token gA6j4S1t5EEAZUrcy6Xplift8BEFXRc6Zxwai8CQ',

		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo ($response);
		}
	}

	public function get_product(){
        $url= "https://api.uber.com/v1/products";
        $parameters = array(
            "latitude" => $this->input->post('latitude'),
            "longitude" => $this->input->post('longitude'),
        );
        $url.="?latitude=".$parameters['latitude'];
        $url.="&longitude=".$parameters['longitude'];

       	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Token gA6j4S1t5EEAZUrcy6Xplift8BEFXRc6Zxwai8CQ',

		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo ($response);
		}

	}

}
?>