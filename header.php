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
<body>

  <header class="bg-light text-dark mb-5 custom-header"> 
    <div class="container">
      <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-lg py-3">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav text-center w-100 text-uppercase">
                  <li class="nav-item active">
                    <a class="nav-link text-dark" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark" href="contacts.php">Contact List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark" href="add-contact.php">Add New Contact</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
      </div>
    </div>
  </header>  
