<?php 
session_start();
include_once 'functions.php'; 
?>
<!doctype html>
<html>
<head>
 
 <!-- Required meta tags -->
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
 <title>Contact Book Project - Code Matra</title>
 
  <!-- Google Fonts --> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
 
 <!-- CSS Files -->
 <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
 <link type="text/css" href="css/cm-style.css" rel="stylesheet" />

</head>
<body class="bg-light">

  <header class="bg-white text-dark mb-4 shadow-sm admin-header"> 
    <div class="container">
      <div class="row">
          <div class="col-12">
            <form class="d-flex py-3">
              <input class="form-control w-25 me-2" type="search" placeholder="Search by name" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
      </div>
    </div>
  </header>  

  <?php include_once('sidebar.php'); ?>
