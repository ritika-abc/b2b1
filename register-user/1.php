<!-- select page  -->






<?php
include("db.php");
include("header.php");

?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <!--  -->
                        <div class="col-md-12">
                            <?php
                            include "db.php"; // database configuration
                            /* Calculate Offset Code */
                            $limit = 3;
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $offset = ($page - 1) * $limit;
                            /* select query of user table with offset and limit */
                            $sql = "SELECT * FROM cat ORDER BY id DESC LIMIT {$offset},{$limit}";
                            $result = mysqli_query($con, $sql) or die("Query Failed.");
                            if (mysqli_num_rows($result) > 0) {
                            ?>
                                <table class="table table-hover table-primary">
                                    <thead>
                                        <th>S.No.</th>
                                        <th>products</th>
                                        <th>description</th>
                                        <th>price</th>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial = $offset + 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td class='id'><?php echo $serial; ?></td>
                                                <td><?php echo $row['products']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['price']; ?></td>

                                            </tr>
                                        <?php
                                            $serial++;
                                        } ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo "<h3>No Results Found.</h3>";
                            }
                            // show pagination
                            $sql1 = "SELECT * FROM cat";
                            $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

                            if (mysqli_num_rows($result1) > 0) {

                                $total_records = mysqli_num_rows($result1);

                                $total_page = ceil($total_records / $limit);

                                echo '<ul class="pagination ">';
                                if ($page > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="view.php?page=' . ($page - 1) . '">Prev</a></li>';
                                }
                                for ($i = 1; $i <= $total_page; $i++) {
                                    if ($i == $page) {
                                        $active = "activebtn";
                                    } else {
                                        $active = " ";
                                    }
                                    echo '<li class="page-item' . $active . '"><a class="page-link"  href="view.php?page=' . $i . '">' . $i . '</a></li>';
                                }
                                if ($total_page > $page) {
                                    echo '<li class="page-item"><a class="page-link" href="view.php?page=' . ($page + 1) . '">Next</a></li>';
                                }

                                echo '</ul>';
                            }
                            ?>
                        </div>
                        <!--  -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>




<?php

include "footer.php";

?>