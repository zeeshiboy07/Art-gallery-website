<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="resources/favicon.png" />

    <link rel="stylesheet" href="home.css" />
    <title>VirtualVault</title>
  </head>
  <body>
    <div class="centered-container">
      <div class="top">
        <h1>Welcome to Virtual vault</h1>
        <p>Your Online Art Auction Platform</p>
      </div>

      <a class="get-started-btn" href="index.php">
        Get Started
        <div class="circle-images">
          <img src="resources/pic1.png" alt="Pic 1" />
          <img src="resources/pic2.png" alt="Pic 2" />
          <img src="resources/pic3.png" alt="Pic 3" />
          <img src="resources/pic4.png" alt="Pic 4" />
        </div>
      </a>
    </div>
  </body>
</html>
