<?php
if (!isset($_SERVER["HTTP_REFERER"])) {
    include("../404.html");
    exit();
}
    include("database.php");

    $datedaujourdhui = $_POST["datedaujourdhui"];
    $réclamation = $_POST["réclamation"];
    

    // Prevent SQL injection
    $datedaujourdhui = mysqli_real_escape_string($connection, $datedaujourdhui);
    $réclamation = mysqli_real_escape_string($connection, $réclamation);
    
    $query = "INSERT INTO réclamation (date, réclamation) VALUES ('$date', '$réclamation',)";

    if (mysqli_query($connection, $query))
    {
        $response = array("success" => true);
        echo json_encode($response);
        exit;
    }
    else
    {
        /* Encode to Json Format */
        $response = array("success" => false);
        /* Return as Json Format */
        echo json_encode($response);
        exit;
    }
    mysqli_close($connection);

?>
