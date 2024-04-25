<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $district = htmlspecialchars($_REQUEST['district']);
    //echo $district;

    $url = "https://us-central1-teacherengagement-gliffic.cloudfunctions.net/report_generation_api_dist_jpeg?state=Madhya%20Pradesh&type=image&district=indore";

    // $curl = curl_init($url);

    // curl_setopt($curl, CURLOPT_URL, $url);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // $response = curl_exec($curl);

    // $context = stream_context_create([
    //     'ssl' => [
    //         'verify_peer' => true,
    //         'verify_peer_name' => true,
    //         'allow_self_signed' => false
    //     ]
    // ]);

    $response = file_get_contents($url);

    if ($response === false) {
        echo "Failed to fetch response from the URL";
    } else {
        $decodedResponse = json_decode($response, true);

        if ($decodedResponse !== null) {
            $jpgUrls = $decodedResponse['jpgUrls'];

            if (is_array($jpgUrls) && !empty($jpgUrls)) {
                $firstUrl = $jpgUrls[0];
                //echo($firstUrl);
                echo '<script>window.onload = function() { document.getElementById("downloadLink").click(); }</script>';

                echo '<a id="downloadLink" href="' . $firstUrl . '" download="downloaded_image.jpg" style="display: none;">Download JPEG</a>';
            } else {
                echo "Unable to download";
            }
        } else {
            echo "Unable to download";
        }
    }

    //curl_close($curl);
    //<?php echo $_SERVER['PHP_SELF'];
}
?>
