<?php



if (! function_exists('whatsapp_api')) {
    /**
     * A simple helper function to greet a user
     *
     * @param string $name
     * @return string
     */
    function whatsapp_api($post_field)
    {

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
            CURLOPT_POSTFIELDS => $post_field,
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


    }
}




?>