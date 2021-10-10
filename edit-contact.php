<?php
/*
* Edit Contact Page | Site https://www.codematra.com/
*/
include_once('header.php'); 

global $connection; 

// Alerts
$errorMsg = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
  $errorMsg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>1 contact updated successfully. <a clsas='link-primary' href='contacts.php'>Check Now!</a> <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
} 

if(isset($_POST['update'])) {
  $name     = $_POST['name'] ? ucwords(trim($_POST['name'])) : '';
  $email    = $_POST['email'] ? trim($_POST['email']) : '';
  $phone    = $_POST['phone'] ? trim($_POST['phone']) : '';
  $address  = $_POST['address'] ? trim($_POST['address'])  : '';
  $cid      = $_POST['cid'];

  // Validate the required fields
  if ($name && $email) {
     echo $sql = "UPDATE contacts
      SET name='$name', phone='$phone', address='$address'
      WHERE id='$cid'"; 
      $result2 = mysqli_query($connection, $sql);
      if ($result2){  
        header('Location: edit-contact.php?success=1&id='.$cid);
        die();
      } else {
        $errorMsg = "<div class='alert alert-danger'> Something went wrong. Please try again.</div>"; 
      }
  } else {
    $errorMsg = "<div class='alert alert-danger'>Required fields missing.</div>" ;   
  } 
} 
       
if (isset($_GET['id'])) {
  $cid = $_GET['id'];
  $cinfo = get_contact_by_id($cid);
  $name     = ucwords(trim($cinfo['name']));
  $email    = trim($cinfo['email']);
  $phone    = $cinfo['phone'] ? trim($cinfo['phone']) : '';
  $address  = $cinfo['address'] ? trim($cinfo['address'])  : '';
}
?>
<div class="container-fluid">
  <div class="row">

    <div class="col-12 d-flex justify-content-between">
      <a href="add-contact.php" class="link-primary text-decoration-none">&lsaquo; Add contact</a>
      <a href="contacts.php" class="link-primary text-decoration-none">All Contacts</a>
    </div>  

    <div class="col-12 col-md-8 col-lg-6 col-xxl-4 mx-auto">
      <?php echo $errorMsg; ?>
      <div class="card shadow mt-4">
          <h3 class="card-header p-4 fs-5">Edit Contact</h3>
          <div class="card-body p-4">
            <form class="form-ui" action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="cid" value="<?php echo $cid; ?>"  /> 
              <div class="mb-3">
                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                <input name="name" required="required" value="<?php echo $name; ?>" type="text" class="form-control" placeholder="Enter full name." />
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Email Address <small class="text-info">(Read Only)</small></label>
                <input readonly name="email" value="<?php echo $email; ?>" type="text" class="form-control" placeholder="Email email address eg. xyz@xya.com" /> 
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
                <button class="w-100 me-2 btn btn-primary rounded-pill text-uppercase" type="submit" name="update">Update</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
<?php include_once('footer.php');