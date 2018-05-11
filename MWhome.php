<!DOCTYPE html>

<!--This php section stores whatever is typed in 
the search bar in  $searchVal--!>
<?php
session_start();
$_SESSION['search'] = $searchVal;
?>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
* {box-sizing: border-box;}

html, body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #333632;
}

.topheader {
  color: #FFFFFF;
  text-align: center;
}

.lowerfont {
  font-size: 12px;
}

.fluff {
  color: #FFFFFF;
  text-align: center;
  margin: 0;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #DC7E00;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>

</head>

<body>

<!--Header for webpage. Calling function "topheader"--!>
<div class="topheader">
  <h1>My-MUSICLIST<br><div class="lowerfont">MUSIC TRACKING UTILITY</div></h1>
</div>


<!--Navigation bar for website. Calling style function "topnav". Each href is hyperlinked--!>
<div class="topnav">
  <a class="active" href="MWhome.php">HOME</a>
  <a href="MWdiscovery.php">DISCOVERY</a>
  <a href="MWplaylist.php">PLAYLISTS</a>
  <a href="">MY FAVORITES</a>
  <a href="">RECOMMENDATIONS</a>


</div>


<!--GIMP image of API databases used. Calling style function fluff--!>
<!--Paragraph text at the bottom of the page. BR stands for line breaks--!>
<div class="fluff">
  <img src="sponsors.png" alt="self-proclaimed sponsors: discogs, musicbrainz, itunes"></p>

  <p>This website was designed for the purpose of a school project in IT490: Systems Integration.<br>Our project involves creating a system where users will be able to login, with their unique credentials, and utilize our music tracking system.<br>We will be pulling from multiple music databases where users will be able to store their favorites, and other personalize information.<br>Our database will be structured so that users will get a comprehensive view of their music (genre, artist, etc), and will be given recommendations based on what they like.</p>
</div>

</body>

</html>
