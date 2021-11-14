<?php
include_once 'dbconfig.php';
$result = mysqli_query($conn,"SELECT * FROM inserfiles ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Machine Test | Directory listing</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <style>
    .form{
        margin-top: 10%;
        border: 1px solid #efefef;
        padding: 1%;
    }
    .inputype{
        border: 4px solid #eee;
        padding: 4%;
    }
    .background{
        background-color: #dfdfdf;
        padding: 1%;
        }
</style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div id="header" style="padding:2%;">
                <h2 style="font-size: 36px;
                font-weight: 700;
                color: #df652b;">Simple Directory listing</h2>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <h2 style="font-size: 17px;">Upload Your File</h2>
                        <div class="form-group">
                        <label for="file_name">Filename:</label>
                        <input type="file" name="anyfile" id="anyfile">
                        <br>
                        <input type="submit" name="submit" value="Upload">
                        </div>
                        <p  style="color: #dd591a;"><strong>(Note:</strong>txt,doc,docx,pdf,png,jpeg,jpg,gif files are allowed and file Size 2MB)</p>
                    </form>
                    <?php
                    if (mysqli_num_rows($result) > 0) 
                    {
                    ?>
                    <div  style="padding: 1% 1% 1% 2%;
                    background-color: #e9eaeb;
                    margin-top: 4%;
                    ">
                    <table class="table table-hover">
                    <h2 style="margin-top: 3%;">View The List of Directory</h2>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">File</th>
                            <th scope="col">Type</th>
                            <th scope="col">Size</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["file"]; ?></td>
                        <td><?php echo $row["type"]; ?></td>
                        <td><?php echo $row["size"]; ?></td>
                        <td><a href="delete.php?id=<?php echo $row["id"]; ?>" title='Delete Record'>
                        <i class="fa fa-minus-square" aria-hidden="true"></i>
</a></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                </table>
                </div>
                <?php
                }
                else{
                    echo "No result found";
                }
                ?>
                </tbody>
            </table>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>