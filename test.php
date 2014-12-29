<?php header('Access-Control-Allow-Origin: *'); ?>
<title>fasdfdsfdsf</title>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['pName'];
    echo $id;
    echo '<br>';
    echo $_POST['pid'];
    echo '<br>';
    echo $_POST['gateway'];
    echo '<br>';
}
echo "Hello World!";
//echo "$_POST[]"
?>