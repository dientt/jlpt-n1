<?php
$configs = include('config.php');
$host = $configs['host'];
$username = $configs['username'];
$password = $configs['password'];
$database = $configs['database'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM word_201807 ORDER BY RAND() LIMIT 1;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_array(MYSQLI_ASSOC);
} else {
    echo "0 results";
}
$conn->close();
?>

<html>
<head>
    <link rel="stylesheet" href="style.php">
    <script type="text/javascript" src="jquery.js"></script>
</head>
</html>

<body>
  <div id="page-wrap">
    <h1><?php echo $data['word'];?></h1>
    <button id="reading">読み方</button>
    <button id="meaning">意味</button>
    <button id="example">例文</button>
    <h1 id="show_data"></h1>
  </div>
</body>

<script>
    $( document ).ready(function() {
        var reading = "<?php echo $data['reading'] ?>";
        var meaning = "<?php echo $data['meaning'] ?>";
        var example = "<?php echo $data['example'] ?>";
        $("#reading").click(function () {
            $("#show_data").text(reading);
        });
        $("#meaning").click(function () {
            $("#show_data").text(meaning);
        });
        $("#example").click(function () {
            $("#show_data").text(example);
        });
    });
</script>
