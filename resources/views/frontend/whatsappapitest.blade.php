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
  "to": "919718392908",
  "type": "template",
  "template": {
    "name": "newfranchi",
    "language": {
      "code": "en"
    },
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
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
