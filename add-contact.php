<?php
/*
* Add Contact Page | Site https://www.codematra.com/
*/

include_once('header.php'); 

$name     = $_POST['name'] ? ucwords(trim($_POST['name'])) : '';
$email    = $_POST['email'] ? trim($_POST['email']) : '';
$phone    = $_POST['phone'] ? trim($_POST['phone']) : '';
$address  = $_POST['address'] ? trim($_POST['address'])  : '';

// Alerts
$errorMsg = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
  $errorMsg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>1 contact added successfully. <a clsas='link-primary' href='contacts.php'>Check Now!</a> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
} 

if(isset($_POST['add'])) {
  // Validate the required fields
  if ($name && $email) {
    // Check Duplicate Entry 
    $sql = "SELECT id FROM contacts WHERE email='$email'";  
    $result = mysqli_query($connection, $sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows==0) {  
      $sql2 = "INSERT INTO contacts 
              (name, email, phone, address)
              VALUES 
              ('$name', '$email', '$phone', '$address')";
      $result2 = mysqli_query($connection, $sql2);
      if ($result2){  
        header('Location: add-contact.php?success=1');
        die();
      } else {
        $errorMsg = "<div class='alert alert-danger'> Something went wrong. Please try again.</div>"; 
      }
    } else {
      $errorMsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Contact already exists.  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";      
    }
  } else {
    $errorMsg = "<div class='alert alert-danger'>Required fields missing.</div>" ;   
  } 
} 

// Clear Data
if(isset($_POST['clear'])) {
  $name = $phone = $email = $address = $errorMsg = '';
  header('Location: add-contact.php?clear=1');
  die();
}
        
?>
<div class="container-fluid">
  <div class="row">

    <div class="col-12">
      <a href="contacts.php" class="link-primary text-decoration-none">&lsaquo; All Contacts</a>
    </div>  

    <div class="col-12 col-md-8 col-lg-6 col-xxl-4 mx-auto">
      <?php echo $errorMsg; ?>
      <div class="card shadow mt-4">
          <h3 class="card-header p-4 fs-5">Add New Contact</h3>
          <div class="card-body p-4">
            <form class="form-ui" action="" method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="mb-3">
                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                <input name="name" required="required" value="<?php echo $name; ?>" type="text" class="form-control" placeholder="Enter full name." />
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Email Address <span class="text-danger">*</span></label>
                <input name="email" value="<?php echo $email; ?>" type="text" class="form-control" placeholder="Email email address eg. xyz@xya.com" /> 
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Contact Number</label>
                <input name="phone" value="<?php echo $phone; ?>" type="text" class="form-control" placeholder="Enter contact number" />
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <textarea rows="5" placeholder="Enter Address" name="address" class="form-control"><?php echo $address; ?></textarea>
              </div>
              <div class="mb-0 d-flex">
                <button class="w-50 me-2 btn btn-primary rounded-pill text-uppercase" type="submit" name="add">Add Contact</button>
                <button class="w-50 btn btn-secondary rounded-pill text-uppercase" type="submit" name="clear">Clear</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
<?php include_once('footer.php');