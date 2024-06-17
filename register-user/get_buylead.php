<?php
include "config.php";

session_start();

// To check if session is started.
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $user_email = $_SESSION["user_email"];
}

 
?>

<?php
echo "$user_id";
if (isset($_POST['submit'])) {
    $buyleads_id = $_POST["buyleads_id"];
    $buyer_email = $_POST["buyer_email"];
    $buyer_name = $_POST["buyer_name"];
    $number = $_POST["number"];
    $queiry_for = $_POST["queiry_for"];
    $buyer_location = $_POST["buyer_location"];
 

    $sql = "INSERT INTO `limit_buylead`(`buyleads_id`, `user_email`,`user_id`,`buyer_email`,`number`,`queiry_for`,`buyer_name`,`buyer_location`) VALUES ('$buyleads_id','$user_email','$user_id','$buyer_email','$number','$queiry_for','$buyer_name','$buyer_location')";
    $result =  $con->query($sql);
    echo '<script>alert("Your Requirement sent successfully ")</script>';
    echo "<script> location.href='show-buyleads.php'; </script>";
    exit;
}
?>



<?php
// include "connection.php";

// session_start();

// // To check if session is started.
// if (isset($_SESSION["user"])) {
//     $username = $_SESSION["user"];
// } else {
//     header("Location:pages-login.php");
// }
// 
?>

  <?php
    //             echo "$username";
    //             if (isset($_POST['submit'])) {
    //                 $buy_id = $_POST["buy_id"];

    //                 $sql = "INSERT INTO `limit_buleads`(`buy_id`, `supp_username`) VALUES ('$buy_id','$username')";
    //                 $result =  $conn->query($sql);
    //                 echo '<script>alert("Your Requirement sent successfully ")</script>';
    //                 echo "<script> location.href='Accesses_Buyleads.php'; </script>";
    //                 exit;
    //             }
    ?>