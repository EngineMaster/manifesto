<!DOCTYPE html>
<html>
<head>
	<title>BD</title>
	 <meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Indie+Flower|Shadows+Into+Light&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sniglet&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
 <link rel="shortcut icon" href="favicon.png" type="image/png">
 <link rel="stylesheet" href="styles.css">
</head>
<body onload="myFunctione()" style="margin:0;font-family: 'Didact Gothic'" >
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<header><div class="imagine"><a href="aboutUs"><img src="logo.png" style="width: 100px;height: 100px;"></a></div>Строительные работы любой сложности</header>
<ul class="topnav" id="navbar">
  <li><a class="actives" href="Daddd.html">Домой</a></li>
  <li><a href="index.php">Услуги</a></li>
  <li><a href="contact.html">Связаться</a></li>
  <li class="right"><a href="about.html">О нас</a></li>
</ul>
	



<?php 

	$link = mysqli_connect("127.0.0.1", "rooty", "toor", "Manifesto");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
	
	if(!$link){
		die('failed to connect Mysqldatabase' . mysqli_connect_error());
	}

	$sql = 'SELECT * FROM `manifests` ORDER BY LENGTH(ManifestDescr)';
	$query = mysqli_query($link,$sql);

	if (!$query) {
		die('error found' .mysqli_error($link)); 
	}
	while ($row = mysqli_fetch_array($query)) {
		echo '<div class="card">
  	<img src="'.$row['img'].'" alt="Denim Jeans" style="height:330px;width:100%;object-fit: cover;">
  <h1>'.$row['ManifestDescr'].'</h1>
  <p class="price">'.$row['PostInfo']. '</p>
  <p>'.$row['Party'].'</p>
  <p>От '.$row['Price'].' руб.</p>
  <p><button><a href="contact.html">Заказать обратный звонок<div class="phone"></div></a></button></p>
	</div>'
	;
}
	
	$sql2 = 'SELECT * FROM `manifests` WHERE ManifestDescr LIKE "d%" ';
	$query = mysqli_query($link,$sql2);
	
	

	
 ?>


<div class="toppy"><a href="contact.html">Связаться с нами</a></div>
</div>
<script>

window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= 222) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

</script>
<script>
var myVar;

function myFunctione() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
<script>
	function Disappearing(){
		document.getElementById('disappearWindow').style.display='none';
	}
</script>
</body>
</html>