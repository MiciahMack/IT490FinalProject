<!DOCTYPE html>

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

.box {
  float:left;
  margin-right:20px;
}

.clear {
  clear:both;
}

.rightAllign {
  color: #FFFFFF;
  text-align: left;
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
  <a href="MWhome.php">HOME</a>
  <a class="active" href="MWprofile.php">CREATE PLAYLISTS</a>

  <!--When the search button is pressed, this form redirects to action.php--!>
  <div class="search-container">
    <form target="_blank" action='apiPlaylistScript.php'>
      <input type="text" placeholder="Search..">
      <button type="submit">Submit</button>
    </form>
  </div>
</div>

<div class="topheader">
<h2><center>CREATE PLAYLISTS HERE</center></h2>
<p>Adding songs is simple! Type the name of the playlist, followed by a colon (:) then add the song name at the end. (Ex. Drum&Bass:Ghost-Assassin)</p>

</div>

<div class="box"><iframe id="myFrame" src="playlist1.txt" style="border:none;" frameborder="0" height="450" width="100%" align="left"></iframe></div>
<div class="box"><iframe id="myFrame1" src="playlist2.txt" style="border:none;" frameborder="0" height="450" width="100%" align="right"></iframe></div>
<div class="box"><iframe id="myFrame2" src="playlist3.txt" style="border:none;" frameborder="0" height="450" width="100%" align="left"></iframe></div>
<div class="box"><iframe id="myFrame3" src="playlist4.txt" style="border:none;" frameborder="0" height="450" width="100%" align="right"></iframe></div>


<script>
var frame = document.getElementById('myFrame');
	frame.onload = function () {
		var body = frame.contentWindow.document.querySelector('body');
		body.style.color = 'white';
		body.style.fontSize = '15px';
	};
</script>
<script>
var frame1 = document.getElementById('myFrame1');
        frame1.onload = function () {
                var body = frame1.contentWindow.document.querySelector('body');
                body.style.color = 'white';
                body.style.fontSize = '15px';
        };
</script>
<script>
var frame2 = document.getElementById('myFrame2');
        frame2.onload = function () {
                var body = frame2.contentWindow.document.querySelector('body');
                body.style.color = 'white';
                body.style.fontSize = '15px';
        };
</script>
<script>
var frame3 = document.getElementById('myFrame3');
        frame3.onload = function () {
                var body = frame3.contentWindow.document.querySelector('body');
                body.style.color = 'white';
                body.style.fontSize = '15px';
        };
</script>


</body>

</html>
