<?php
if (false !== strpos($_SERVER['REQUEST_URI'], 's1')) {
    $state = isset($_GET["s1"]) ? $_GET["s1"] : 0;
    $text = hex2bin($state);
} else {
    echo "";
}
?> 

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php if(false !== strpos($_SERVER['REQUEST_URI'], 's1')) { echo $text; ;} else {echo ""; } ?> Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        *,
        *::after,
        *::before {
            box-sizing: border-box;

        }

        /* * {
            outline: 2px solid red;
        } */

        html {
            overflow: auto;
        }

        body {
            font-family: 'Noto Sans', Courier, monospace;
        }

        html,
        body,
        div,
        iframe {
            margin: 0px;
            padding: 0px;
            height: 100%;
            border: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        header {
            border-bottom: 1px solid #e0e0e0;
        }

        header nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        header nav img {
           height: 5rem;
        }

        .udhyam_logos{
            height: 4rem;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .buttons {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        h2 {
            font-size: clamp(0.75rem + 0.5vw + 1rem);
            font-weight: 500;
        }

        a {
            background-color: #4285F3;
            padding: 0.5rem 1rem;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: clamp(0.75rem + 0.5vw + 1rem);
        }

        a:hover{
            background-color: #4245D1;
        }

        .image-container{
            display: flex;
            gap: 1rem;
        }
    </style>
</head>

<body>
<?php if (false !== strpos($_SERVER['REQUEST_URI'], 's1')) {?>
    <header>
        <nav>
            <div class="image-container">
                <img class="udhyam_logos" src="./UdhyamLogo.png" alt="logo">
                <?php if ( $text == "Madhya Pradesh") {?>
                    <img src="MPLogo.jpg" alt="logo">
                <?php }?>
                <?php if ( $text == "Punjab") {?>
                    <img src="PunjabLogo.jpg" alt="logo">
                <?php }?>
            </div>
            <div class="button-container">
                <div class="buttons">
                    <h2>PDF:</h2>
                    <a href="https://us-central1-teacherengagement-gliffic.cloudfunctions.net/report_generation_api_dist?state=<?php echo $text; ?>&type=pdf">Download State Report</a>
                    <a href="https://us-central1-teacherengagement-gliffic.cloudfunctions.net/report_generation_api_dist?state=<?php echo $text; ?>&district=all&type=pdf">Download District Report</a>
                </div>
                <div class="buttons">
                    <h2>Excel:</h2>
                    <a href="https://us-central1-teacherengagement-gliffic.cloudfunctions.net/report_generation_api_dist?state=<?php echo $text; ?>&type=xlsx">Download State Report</a>
                    <a href="https://us-central1-teacherengagement-gliffic.cloudfunctions.net/report_generation_api_dist?state=<?php echo $text; ?>&district=all&type=xlsx">Download District Report</a>
                </div>
            </div>
        </nav>
    </header>
    <?php }  else { } ?>

</body>

<!-- <?php
        $hexadecimal_string = "4d61646879612050726164657368";

        $text = hex2bin($hexadecimal_string);

        echo "Hexadecimal: $hexadecimal_string\n";
        echo "Text: $text";

        $hexadecimal_string1 = "56a6f16cd"; // Replace this with your hexadecimal string
        $decimal_number = hexdec($hexadecimal_string1);

        echo "Hexadecimal: $hexadecimal_string1\n";
        echo "Decimal: $decimal_number";
        ?> -->

<?php
$udise_code = isset($_GET["udc"]) ? $_GET["udc"] : 0;
$state = isset($_GET["s1"]) ? $_GET["s1"] : 0;
$string = $_SERVER["REQUEST_URI"];
$substring = "?s1";
if (strpos($string, $substring) !== false) {
    $text = hex2bin($state);
    $encoded_string = urlencode($text);
    $encoded_string = str_replace('+', '%20', $encoded_string);
    // echo $encoded_string;
    // echo'<iframe width="100%" height="680" src="https://lookerstudio.google.com/embed/reporting/eae17fe5-462a-4053-a1d0-6b4a5ac91a6d/page/p_fs5i69p88c?params=%7B%22s1%22:%22'.$encoded_string.'%22,%22s2%22:%22'.$encoded_string.'%22%7D%22 frameborder="0" style="border:0" allowfullscreen></iframe>';
    echo '<iframe width="100%" height="100%" src="https://lookerstudio.google.com/embed/reporting/eae17fe5-462a-4053-a1d0-6b4a5ac91a6d/page/p_fs5i69p88c?params=%7B%22s1%22:%22' . $encoded_string . '%22,%22s2%22:%22' . $encoded_string . '%22,%22s3%22:%22' . $encoded_string . '%22%7D" frameborder="0" style="border:0"  allowfullscreen scrolling="auto"></iframe>';
} else {
    $decimal_number = hexdec($udise_code);
    // echo $decimal_number;
    $encoded_string = urlencode($decimal_number);
    $encoded_string = str_replace('+', '%20', $encoded_string);
    // echo '<iframe width="100%" height="100%" src="https://lookerstudio.google.com/embed/reporting/7b0c33d7-a1b0-4936-8317-1d1b36f55813/page/p_fs5i69p88c?params=%7B%22udc%22:%22'.$decimal_number.'%22%7D " frameborder="0" style="border:0" allowfullscreen></iframe>';
    echo '<iframe width="100%" height="100%" src="https://lookerstudio.google.com/embed/reporting/7b0c33d7-a1b0-4936-8317-1d1b36f55813/page/p_fs5i69p88c?params=%7B%22udc%22:%22' . $decimal_number . '%22,%22udise1%22:%22' . $decimal_number . '%22%7D " frameborder="0" style="border:0" allowfullscreen></iframe>';
    exit;
}

// echo $_GET['udise'];
// print $_SERVER["HTTP_HOST"];
// print $_SERVER["SERVER_NAME"];
// print $_SERVER["REQUEST_URI"];

// $fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

</html>