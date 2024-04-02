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
        echo '<iframe width="100%" height="100%" src="https://lookerstudio.google.com/embed/reporting/eae17fe5-462a-4053-a1d0-6b4a5ac91a6d/page/p_fs5i69p88c?params=%7B%22s1%22:%22'.$encoded_string.'%22,%22s2%22:%22'.$encoded_string.'%22,%22s3%22:%22'.$encoded_string.'%22%7D" frameborder="0" style="border:0" allowfullscreen></iframe>';
            }
else{
    $decimal_number = hexdec($udise_code);
    // echo $decimal_number;
    $encoded_string = urlencode($decimal_number);
    $encoded_string = str_replace('+', '%20', $encoded_string);
	// echo '<iframe width="100%" height="100%" src="https://lookerstudio.google.com/embed/reporting/7b0c33d7-a1b0-4936-8317-1d1b36f55813/page/p_fs5i69p88c?params=%7B%22udc%22:%22'.$decimal_number.'%22%7D " frameborder="0" style="border:0" allowfullscreen></iframe>';
        echo '<iframe width="100%" height="100%" src="https://lookerstudio.google.com/embed/reporting/7b0c33d7-a1b0-4936-8317-1d1b36f55813/page/p_fs5i69p88c?params=%7B%22udc%22:%22'.$decimal_number.'%22,%22udise1%22:%22'.$decimal_number.'%22%7D " frameborder="0" style="border:0" allowfullscreen></iframe>';
}
    
// echo $_GET['udise'];
// print $_SERVER["HTTP_HOST"];
// print $_SERVER["SERVER_NAME"];
// print $_SERVER["REQUEST_URI"];

// $fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>