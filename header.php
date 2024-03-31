<?php
 session_start();
$site_url= 'http://localhost/School-Management-System/';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Managemnt System</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Domine:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<style>

html,
body,
header,
.view {
  height: 100%;
}

@media (max-width: 740px) {
  html,
  body,
  header,
  .view {
    height: 1100px;
  }
}
@media (min-width: 800px) and (max-width: 850px) {
  html,
  body,
  header,
  .view {
    height: 700px;
  }
}

.top-nav-collapse {
  background-color: #39448c !important;
}

.navbar:not(.top-nav-collapse) {
  background: transparent !important ;
}
/* .navbar{
  transparent:all 0.5s;
} */
.scrolling-navbar{
  background-color:#39448c ;
  box-shadow:0 3px 10px rgba(0,0,0,0.15)
}
/* @media (max-width: 991px) {
 .navbar:not(.top-nav-collapse) {

 } */


h6 {
  line-height: 1.7;
}


</style>