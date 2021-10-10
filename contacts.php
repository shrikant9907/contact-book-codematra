<?php
/*
* Edit Contact Page | Site https://www.codematra.com/
*/

include_once('header.php'); ?>
<?php 
if (isset($_GET['search'])) {
  $s = trim($_GET['search']);
  $contacts =  search_contacts($s); 
} else {
  $contacts =  get_contacts(); 
}
?>
<?php

$errorMsg = '';
if (isset($_GET['del']) && $_GET['del'] == 1) {
  $errorMsg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>1 record has been deleted. <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
} 
if (isset($_GET['delall']) && $_GET['delall'] == 1) {
  $errorMsg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>All contacts has been deleted. <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
} 

// Delete 1 record
if(isset($_GET['action']) && ($_GET['action']=='delete') && isset($_GET['id'])) {
  $cid = $_GET['id']; 
  if(isset($_GET['confirmation']) && ($_GET['confirmation']=='yes')) {
    $res = delete_contact($cid);
    if($res) {
      header('Location: contacts.php?del=1');
      die();
    }
  } else {
    $errorMsg = "<div class='alert alert-danger'>Are you sure? You want to delete this contact <a class='btn btn-primary btn-sm' href='contacts.php?action=delete&confirmation=yes&id=$cid'>Yes</a> <a class='btn btn-secondary btn-sm' href='contacts.php'>No</a></div>";
  }
}
      
        
// Bulk Delete
if(isset($_GET['action']) && ($_GET['action']=='deleteall') && isset($_GET['type']) && ($_GET['type']='contacts')) {
  if(isset($_GET['confirmation']) && ($_GET['confirmation']=='yes')) {
    $res = delete_contacts();
    if($res) {
      header('Location: contacts.php?delall=1');
      die();
    }
  } else { 
    $errorMsg = "<div class='alert alert-danger'>Are you sure? You want to delete all contacts. <a class='btn btn-primary btn-sm' href='contacts.php?action=deleteall&type=contacts&confirmation=yes'>Yes</a> <a class='btn btn-secondary btn-sm' href='contacts.php'>No</a></div>";
  }
}
?>
 <div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="d-flex pb-3 justify-content-between">
        <a href="add-contact.php" class="link-primary text-decoration-none">&lsaquo; Add new contact</a>
        <a href="contacts.php?action=deleteall&type=contacts" class="link-danger text-decoration-none">Delete All</a>
      </div>
    </div>  
  </div>
  <?php echo $errorMsg; ?>
 <table class="table table-stripped bg-white">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($contacts) { 
    foreach($contacts as $contact) {
      extract($contact);
    ?>
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $name; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $phone; ?></td>
      <td><?php echo $address; ?></td>
      <td>
      <a class="btn btn-primary btn-sm" href="edit-contact.php?id=<?php echo $id; ?>">Edit</a>
      <a class="btn btn-danger btn-sm" href="contacts.php?action=delete&id=<?php echo $id; ?>">Delete</a>
      </td>
    </tr>
    <?php }
    } else { ?> 
      <tr colspan="6">
        <th>No records found.</th>
      </tr>
    <?php } ?>
  </tbody>
</table>
 </div>
<?php include_once('footer.php');