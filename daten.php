<?php
		//Hier schreiben wir ein PHP-Script
		
		//Datenbankverbindung einbinden
		include('dbconnect.php');
		
		//Variableninitialisierung
		
		$anrede = '';		//Formulardaten
		$vorname = '';		//Formulardaten
		$nachname = '';		//Formulardaten
		$strasse = '';		//Formulardaten
		$plz = '';			//Formulardaten
		$ort = '';			//Formulardaten
		$mitteilung = '';	//Formulardaten
		
		$message = '';
		
		if(isset($_GET['delete']))
		{
		//Datensatz wird aus Datenbank gelöscht
		$abfrage = "DELETE FROM kontaktdaten WHERE id = ".$_GET['delete'].";";
		$ergebnis = mysqli_query($db, $abfrage);
		$message = "Datensatz erfolgreich gel&ouml;scht...";
		
		}
	
		
	?>

<html>
<head>
	<title>Testseite A</title>
	
	<style type="text/css">

	body{
		font-family: Arial;
		margin: 50px;
		
		background-image: url(bg.jpg);
		background-repeat: no-repeat;
		background-attachment:fixed;
		
	}
	
	h1{
		font-size: 16px;
	}
	
	h2{
		font-size: 14px;
	}
	
	p{
		font-size: 14px;
	}
     form label { 
		width: 100%; 
		display: block;
		float: left;
		font-size: 14px;
	  }
	  
	form input,
	form select {
		margin-bottom: 5px;
	  }
	
	form{
		
	}
	  
	  img.bild  {
		  max-width:650px;
		  width: 100%;
		  
	  }
	  
	  #errormessage p 
	  {
		color: red;
	  }
	  
	  #content1 {
		 width: 45%;
		 float:left;
	
		 padding: 20px;
		 box-sizing: border-box;
		 background-color: rgba(255, 255, 255, 0.5);
		
		
	  }
	  
	   #content2 {
		  width: 45%;
		  float:right;
		  background-color: #FFFFFF;
		 padding: 20px;
		  background-color: rgba(255, 255, 255, 0.5);
		 margin-bottom: 50px;
		 box-sizing: border-box;
		  
	  }
	  
	  #footer{
		 width: 100%;
		 position: relative;
		 display: block;
		 box-sizing: border-box;
	  }
	  
	  textarea {
		  width: 100%;
	  }
	
    </style>

	
</head>
<body>
<div id="header"><!--<img src="header.jpg" alt="Basel" width="100%" />--></div>

<div id="content-wrapper">
	<div id="content1">
	<h1>Formulardaten ausgeben ...</h1>
	
	
	<?PHP
	
	echo $message;
	
	//Formulardaten werden aus Datenbank ausgelesen
	
	$abfrage = "SELECT * FROM kontaktdaten ORDER BY id DESC";
	$ergebnis = mysqli_query($db, $abfrage);
	
	while($row = mysqli_fetch_object($ergebnis))
	{
		//Variableninitialisierung
		
		$anrede = $row->anrede;		
		$vorname = $row->vorname;		
		$nachname = $row->nachname;		
		$strasse = $row->strasse;		
		$plz = $row->plz;			
		$ort = $row->ort;			
		$mitteilung = $row->mitteilung;	
		$id = $row->id;
		$datum = $row->datum;
		
		//$test1 = "test1";
		//$test2 = "test2";
		
		//echo $test1.$test2; //test1test2 
		
		
		echo "<p>".$datum."<br />";
		echo "<strong>".$anrede." ".$nachname." ".$vorname."</strong><br />";
		echo $strasse."<br />";
		echo $plz." ".$ort."<br />";
		echo $mitteilung."<br />";
		echo '<a href="?delete='.$id.'">L&ouml;schen</a> <a href="bearbeiten.php?edit='.$id.'">Bearbeiten</a></p>';
	}
	
	
	
	?>
	
	<p><a href="index.php">Zur&uuml;ck</a></p>
	<!--
	Anrede (select), Vorname (input), Nachname (input), Strasse (input),
	Ort (input), PLZ (input), Mitteilung (textarea), Senden (Button)
	-->
	
	
</div>





</body>
</html>

	
	