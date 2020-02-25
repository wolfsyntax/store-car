<!DOCTYPE html>
<html lang="en">
<?php 

  if(isset($_POST['submit'])){
    
    include_once 'database.php';
    
    $target_dir = "images/";
    $allowTypes = array('jpg','png','jpeg','gif');
    $statusMsg = $errorMsg = $result = $errorUpload = $errorUploadType = '';

    $modelName = mysqli_real_escape_string($db, $_POST['modelName']);
    $brandName = mysqli_real_escape_string($db, $_POST['brandName']);
    $year = mysqli_real_escape_string($db, $_POST['year_created']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $coverPhoto = mysqli_real_escape_string($db, ($_FILES['coverPhoto']['name']));
    $status = mysqli_real_escape_string($db,$_POST['status']);
    $downpayment = mysqli_real_escape_string($db, $_POST['downpayment']);
    
    $dataImage = [];

    if(!empty(array_filter($_FILES['gallery']['name']))){

      foreach($_FILES['gallery']['name'] as $key=>$val){
        
        $fileName = basename($_FILES['gallery']['name'][$key]);

        $targetFilePath = $target_dir . $fileName;

        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(in_array($fileType, $allowTypes)){
        // Upload file to server
          if(move_uploaded_file($_FILES["gallery"]["tmp_name"][$key], $targetFilePath)){
            // Image db insert sql
            $result .= "('".$fileName."', NOW()),";

          }else{

            $errorUpload .= $_FILES['gallery']['name'][$key].', ';

          }

        }else{

          $errorUploadType .= $_FILES['gallery']['name'][$key].', ';

        }

      }

      $fileName = basename($_FILES['coverPhoto']['name']);

      $targetFilePath = $target_dir . $fileName;

      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

      if(!empty($result)){

        $result = trim($result,',');  
        $sql = "INSERT INTO cars (brandName, carModel, manufactureYear, carPrice, carDescription, coverPhoto, status, downpayment) VALUES ('$brandName','$modelName','$year','$price', '$description', '$targetFilePath','$status', '$downpayment')";

        if(mysqli_query($db, $sql)){
        
          header( "Location: cars.php" );
          exit ;
        }else{
          
          header( "Location: add_forms.php" );
          exit ;

        }
        
        return "Saving  $result";

      }
    }
  }

?>
<head>
  <title>WaterBoat &mdash; Website Template by Colorlib</title>
  <link rel="shortcut icon" type="image/png" href="Images/logo1.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <form class="my-3" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Brand Name:
              </label>
              <div class="col">
                <input type="text" maxlength="196" name="brandName" placeholder="Brand Name" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Model:
              </label>
              <div class="col">
                <input type="text" maxlength="196" name="modelName" placeholder="Model Name" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Manufacturing Year
              </label>
              <div class="col">
                <input type="number" min="1885" name="year_created" class="form-control" placeholder="<?= date('Y') ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Price:
              </label>
              <div class="col">
                <input type="number" min="0.00" name="price" placeholder="Car Price" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Downpayment:
              </label>
              <div class="col">
                <input type="number" min="0.00" name="downpayment" placeholder="Initial Downpayment" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Cover Photo:
              </label>
              <div class="col">
                <input type="file" accept="image/jpg,image/jpeg,image/*" name="coverPhoto">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Description:
                </label>
                <div class="col">
                  <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Status:
              </label>
              <div class="col">
                <select class="custom-select" name="status">
                  <option selected>
                    Select Status
                  </option>
                  <option value="1">
                    Available
                  </option>
                  <option value="0">
                    Sold
                  </option>                  
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <label class="col-label col-12 col-md-6">
                Gallery Image:
              </label>
              <div class="col">
                <input type="file" name="gallery[]" multiple accept="image/jpg,image/jpeg,image/*" class="custom-input upload-file">
                <small class="form-text text-muted">
                  Note: 6 to 12 images only
                </small>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <button type="submit" class="btn btn-primary col" name="submit">Add Cars</button>    
            </div>
          </div>
      
        </form>
      </div>
    </div>
  </div>
</body>
</html>