

<!DOCTYPE html>
<html lang="en">
<?php 
    include_once 'database.php';
    $sql = "Select * From Cars";
    
    $query = mysqli_query($db, $sql);
    
?>
<head>
  <title>Cars | Manonamission</title>
  <link rel="shortcut icon" type="image/png" href="Images/logo1.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="container-fluid" style="height: 100vh;">
    <div class="row mt-5">
      <div class="col-12 col-md-8 offset-md-2 table-responsive mt-5 ">
        <table id="carList" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Cover Photo</th>
                <th>Brand Name</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Downpayment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?= $row['_id'] ?></td>
                <td>
                  <img src="<?= $row['coverPhoto']?>" class="img-fluid rounded-50" style="height: 30px; width: 30px; border-radius: 50%"/>    
                </td>
                <td><?= $row['brandName']?></td>
                <td><?= $row['carModel']?></td>
                <td><?= $row['manufactureYear']?></td>
                <td>$<?= $row['carPrice']?></td>
                <td>$<?= $row['downpayment']?></td>
                <td><?= $row['status'] == 1 ? "Available" : "Sold Out" ?></td>
                <td>
                  <a href="delete.php?id=<?= $row['_id'] ?>">
                    <i class="fas fa-trash"></i>Delete
                  </a>
                </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
      $('#carList').DataTable();
    });

  </script>


</body>
</html>