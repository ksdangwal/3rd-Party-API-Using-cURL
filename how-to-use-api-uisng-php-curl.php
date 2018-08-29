<?php
	
//Example API URL # https://docs.firstpromoter.com/

curl -X POST "https://firstpromoter.com/api/v1/track/sale"
  -d "wid=b850ac4wer56hy1b5ef41"
  -d "email=shelley@example.com"
  -d "uid=cbdemo_shelley"
  -d "event_id=9856044"
  -d "plan=monthly-starter"
  -d "amount=6000"
  -H "x-api-key: 2947d4543695e7cc7dhda3c52ebyt74eb8"

//API Response

{
  "id": 1708,
  "type": "sale",
  "amount_cents": 6000,
  "lead": {
    "id": 943,
    "state": "active",
    "email": "shelley@example.com",
    "uid": "cbdemo_shelley",
    "customer_since": "2018-04-11T14:54:32.014Z",
    "plan_name": "monthly-starter",
    "suspicion": "no_suspicion"
  },
  "promoter": {
    "id": 1983,
    "cust_id": null,
    "email": "test@test.com",
    "temp_password": "u1PptB",
    "default_promotion_id": 1986,
    "default_ref_id": "test_ref_id",
    "earnings_balance": {
      "cash": 1200
    },
    "current_balance": {
      "cash": 1200
    },
    "paid_balance": null
  }
}

/***************************************************
How to use 3rd party API with cURL PHP
***************************************************/

//Method 1 . Call a Function

generateFirstSalesCommission($email, $uid, $event_id, $amount) ;

function generateFirstSalesCommission($email, $uid, $event_id, $amount) {

	if(isset($_COOKIE['_fprom_track'])) {
	
		$api_url = FIRSTPROMOTER_SALES_URL;
		
		//REQUIRED DATA FOR API CALL
		$wid 		= 	FIRSTPROMOTER_WID;
		$email	 	= 	trim($email);
		$uid	 	= 	trim($uid);
		$tid 		= 	trim($_COOKIE['_fprom_track']);
		$event_id 	= 	trim($event_id);
		$amount 	= 	trim($amount * 100); // Amount in Cents
		
		$apiKey 	= 	FIRSTPROMOTER_API_KEY;

		$data = array(
			"wid" 		=> $wid,
			"email" 	=> $email,
			"uid" 		=> $uid,
			"event_id" 	=> $event_id,
			"amount" 	=> $amount
		);

		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"x-api-key: $apiKey",
		));

		curl_setopt($curl, CURLOPT_URL, $api_url);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($curl);
		curl_close($curl);

		echo $result;
	}
}

//Method 2 . Simple cURL

$api_url = FIRSTPROMOTER_SALES_URL;
		
//REQUIRED DATA FOR API CALL
$wid 		= 	FIRSTPROMOTER_WID;
$email	 	= 	trim($email);
$uid	 	= 	trim($uid);
$tid 		= 	trim($_COOKIE['_fprom_track']);
$event_id 	= 	trim($event_id);
$amount 	= 	trim($amount * 100); // Amount in Cents

$apiKey 	= 	FIRSTPROMOTER_API_KEY;

$data = array(
	"wid" 		=> $wid,
	"email" 	=> $email,
	"uid" 		=> $uid,
	"event_id" 	=> $event_id,
	"amount" 	=> $amount
);

$curl = curl_init();

curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	"x-api-key: $apiKey",
));

curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);
curl_close($curl);

echo $result;

?>