<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://cloudapi.wbbox.in/api/v1.0/messages/send-template/917838357872',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "messaging_product": "whatsapp",
  "recipient_type": "individual",
  "to": "919319927634",
  "type": "template",
  "template": {
    "name": "newfranchise",
    "language": {
      "code": "en"
    },
    "components": [
      {
        "type": "body",
        "parameters": [
          {
            "type": "text",
            "text": "Rahul_Testing"
          }
        ]
      }
    ]
    "components": [
      {
        "type": "body",
        "parameters": [
          {
            "type": "text",
            "text": "Rahul"
          }
        ]
      }
    ]
  }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer dYjPebs9fU67IeafcZbL6g',
    'Content-Type: application/json'
  ),
  CURLOPT_SSL_VERIFYPEER => false,
));

$response = curl_exec($curl);

if ($response === false) {
  echo 'Curl error: ' . curl_error($curl);
} else {
  // No curl error, print the response
  echo 'Response: ' . $response;
}

// Get the HTTP status code of the response
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// If the HTTP code is not 200 (OK), there was an issue with the request
if ($httpCode != 200) {
  echo 'HTTP Error: ' . $httpCode;
}

curl_close($curl);
