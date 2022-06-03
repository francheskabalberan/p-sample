<?php
ob_start();
include 'header.php';
if ($_SESSION['role'] == "Student") {
?>



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <!-- <a href="book_print.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books List</button>
                            </a> -->
                                <!-- <a href="print_barcode1.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books Barcode</button>
                            </a> -->

                                <div class="x_title">
                                    <h2><i class="fa fa-book"></i> E-Book List</h2>
                                    <div class="clearfix"></div>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <!-- content starts here -->
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table id="example1" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">

                                                    <thead style="background: #ccc">
                                                        <tr>
                                                            <th>Accession No./Barcode/s</th>
                                                            <th>Call No.</th>
                                                            <th>Title</th>
                                                            <!-- <th>ISBN</th> -->
                                                            <th>Author/s</th>
                                                            <th>Subjects</th>
                                                            <!-- <th>Mode of Aquisition</th> -->
                                                            <th>Remarks</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $result = mysqli_query($con, "SELECT *,
                                ebook.ebook_id,
                                -- ebook.ebook_barcode,
                                ebook.call_no,
                                ebook.title,
                                -- ebook.isbn_no,
                                -- tbl_moa.moa_id,
                                ebook.remarks FROM ebook
                                LEFT JOIN tbl_moa ON tbl_moa.moa_id = ebook.moa_id ORDER BY ebook_id") or die(mysqli_error($con));
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $id = $row['ebook_id'];
                                                            // $category_id=$row['category_id'];

                                                            // $cat_query = mysqli_query($con,"select * from category where category_id = '$category_id'")or die(mysqli_error());
                                                            // $cat_row = mysqli_fetch_array($cat_query);
                                                        ?>
                                                            <tr>
                                                                <!--- either this <td><a target="_blank" href="view_book_barcode.php?code=<?php // echo $row['book_barcode']; 
                                                                                                                                            ?>"><?php // echo $row['book_barcode']; 
                                                                                                                                                ?></a></td> -->
                                                                <td><?php echo $row['accession_no']; ?></td>
                                                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['call_no']; ?></td>
                                                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['title']; ?></td>

                                                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['author']; ?></td>
                                                                <td><?php echo $row['subject']; ?></td>

                                                                <td><?php echo $row['remarks']; ?></td>
                                                                <td>
                                                                    <a class="btn btn-primary" for="ViewAdmin" href="view_ebook.php<?php echo '?ebook_id=' . $id; ?>">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <!-- <a class="btn btn-warning" for="ViewAdmin" href="edit_book.php<?php //echo '?book_id=' . $id; 
                                                                                                                                        ?>">
                                    <i class="fa fa-edit"></i>
                                    </a> -->
                                                                    <!--    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php //echo $id;+
                                                                                                                                        ?>" data-toggle="modal" data-target="#delete<?php //echo $id;
                                                                                                                                                                                    ?>">
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                    </a>
                                -->

                                                                    <!-- delete modal user -->

                                                                </td>
                                                            <?php } ?>
                                                            </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- content ends here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.Left col -->

            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
<?php } else {
    header("Location: 404.php");
} ?>

<?php include 'script.php'; ?>