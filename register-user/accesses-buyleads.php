<?php


include_once "include/header.php";


?>
<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row">
        <?php
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
        }
        echo $user_id;
        $currentMonth = date('m');
        $currentYear = date('Y');
        include "config.php";
        $sel = "SELECT buyleads.buyleads_id,buyleads.buyer_name,limit_buylead.limit_id,  limit_buylead.user_id,  limit_buylead.user_email, user.user_id, user.plan FROM ((limit_buylead INNER JOIN buyleads ON buyleads.buyleads_id =  limit_buylead.buyleads_id) INNER JOIN user ON user.user_id= limit_buylead.user_id) WHERE  limit_buylead.user_id='user_id' AND user.plan='active' LIMIT 10";
        // $sel = "SELECT buyleads.buyleads_id, buyleads.buyer_name, limit_buleads.limit_id, limit_buleads.user_id, limit_buleads.user_email, user.user_id, user.plan 
        // FROM ((limit_buleads 
        // INNER JOIN buyleads ON buyleads.buyleads_id = limit_buleads.buyleads_id) 
        // INNER JOIN user ON user.user_email = limit_buleads.buyer_email) 
        // WHERE limit_buleads.buyer_email = '$user_id' 
        // AND user.plan = 'active' 
        // AND MONTH(limit_buleads.accessed_at) = $currentMonth 
        // AND YEAR(limit_buleads.accessed_at) = $currentYear 
        // LIMIT 10";
        // // $sel = "SELECT buyleads.buyleads_id, buyleads.buyer_name , buyleads.queiry_for , limit_buylead.user_email, limit_buylead.buyer_email
        // // FROM buyleads 
        // // (INNER JOIN limit_buylead ON buyleads.buyleads_id = limit_buylead.buyleads_id) ";
        $query = mysqli_query($con, $sel);
        while ($row = mysqli_fetch_array($query)) {
        ?>

            <div class="col-4">
                <div class=" card p-3 ">
                    <p><?php echo $row['buyleads_id'] ?></p>
                    <p><?php echo $row['user_id'] ?></p>
                    
                    <p><?php echo $row['user_email'] ?></p>
                    
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<br />
</div>



<?php
include_once "include/footer.php";

?>