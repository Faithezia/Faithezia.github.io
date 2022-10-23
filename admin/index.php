<?php 
	include "navbar.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LIBRARY SYSTEM</title>
	<style type="text/css">
body{
	margin: 0;
	padding:  0;
	font-family: courier;
	background-image: url("images/background.jpg");
	background-attachment: fixed;
	background-size: cover;

}

@font-face{
	font-family: BungeeSpice-Regular;
	src:  url(bootstrap/fonts/BungeeSpice-Regular.ttf);
}

.col{
	display: flex;
	flex-direction: column;
	justify-content: center;
	text-align: center;
	background-color: #020101;
	color: white;
	width: 60%;
	margin: 18% 0 0 20%;
	padding: 3% 0%;
	border-radius: 10px;
	box-shadow: 0 19px 38px rgba(0,0,0,1), 0 15px 12px rgba(0,0,0,1);
	opacity: .9;
}

@media only screen and (max-width: 1000px) {
  .col{
  	width: auto;
  	margin: 25% 0 0 0;
		padding: 3% 0%;
  }
}
.welcome{
	font-family:  'times new roman', Sans-serif;
	font-size: 3rem;
	text-align: center;
}
	</style>
</head>
<body>
<div class="container">
    <div class="col">
      <span class="welcome">Welcome to Library System</span>
      <h3>For Catmon Malabon Library</h3>
      <p>OPEN	:	8:00AM</p>
      <p>CLOSED	:	6:00PM</p>
    </div>
</div>
</body>
</html>