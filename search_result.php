<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "student_data";

$conn = new mysqli($servername, $username, $password, $db);




$sql = "select * from students where file_name like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["file"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>
</body>
</html>