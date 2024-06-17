<?php
include "config.php";

$user_email =  $_SESSION["user_email"];

$sel = "SELECT * FROM `user` where `user_email`='$user_email'";
$q = mysqli_query($con, $sel);
while ($row = mysqli_fetch_array($q)) {


?>

    <div class="profile_card bg-white py-3">
        <div class="profile-image py-5 bg-dark  text-center  m-auto d-flex justify-content-center align-items-center" style="height: 150px;width:150px;border-radius:50%">
            <img src="<?php echo $row['image'] ?>" height="100px" width="100px" alt="profile image">
        </div>
        <table class="table my-3 text-capitalize">

            <tr>
                <th>Name </th>
                <td><?php echo $row["user_name"] ?></td>
            </tr>
            <tr>
                <th>email</th>
                <td class="text-lowercase"><?php echo $row["user_email"] ?></td>
            </tr>
            <tr>
                <th>number</th>
                <td><?php echo $row["user_phone"] ?></td>
            </tr>

            <tr>
                <th>company name</th>
                <td><?php echo $row["company_name"] ?></td>
            </tr>
            <tr>
                <th>company Address</th>
                <td><?php echo $row["company_address"] ?></td>
            </tr>
            <tr>
                <th>Your Plan</th>
                <td class="text-danger"><?php echo $row["plan"] ?> </td>
            </tr>
            <tr>
                <th>Your Plan expire</th>
                <td class="text-danger"> <?php echo $row["expire"] ?></td>
            </tr>
            <tr>
                <th> register date</th>
                <td><?php echo $row["date"] ?></td>
            </tr>

        </table>






        <a href="" class="mx-3">Edit Your Profile</a>
    </div>
<?php
}

?>