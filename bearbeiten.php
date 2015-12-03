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
		$edit = '';
		
		
		//Formulardaten abfragen
		if(isset($_GET['anrede']))
		{
			$anrede = $_GET['anrede'];
		}
		
		if(isset($_GET['vorname']))
		{
			$vorname = $_GET['vorname'];
		}
		
		if(isset($_GET['nachname']))
		{
			$nachname = $_GET['nachname'];
		}
		
		if(isset($_GET['strasse']))
		{
			$strasse = $_GET['strasse'];
		}
		
		if(isset($_GET['ort']))
		{
			$ort = $_GET['ort'];
		}
		
		if(isset($_GET['plz']))
		{
			$plz = $_GET['plz'];
		}
		
		if(isset($_GET['mitteilung']))
		{
			$mitteilung = $_GET['mitteilung'];
		}
		
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		
		//ENDE: Formulardaten abfragen
		
		if(isset($_GET['edit']))
		{
			$edit = $_GET['edit'];
		
			$abfrage = "SELECT * FROM kontaktdaten WHERE id = ".$edit.";";
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
			}
		}
		
		if(isset($_GET['submit']))
		{
			//Daten werden in Datenbank übernommen
			$abfrage = "UPDATE kontaktdaten SET
			anrede = '".$anrede."',
			vorname = '".$vorname."',
			nachname = '".$nachname."',
			strasse = '".$strasse."',
			ort = '".$ort."',
			plz = '".$plz."',
			mitteilung = '".$mitteilung."',
			datum = NOW()
			WHERE id = ".$id."
			;";
			
	
			$ergebnis = mysqli_query($db, $abfrage);
			
		}
		
		//ENDE: Hier schreiben wir ein PHP-Script
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
	
<div id="content2"><h2>Formulardaten bearbeiten</h2>
	
	<div id="errormessage">	
		<h2>Kontakt</h2>
		
		<form name="einfachesformular" action="?" method="get">
		
		<label>Anrede</label>
		 <select name="anrede">
		 
		 <?PHP 
		 
			$optionherr = '';
			$optionfrau = '';
			$optionan = '';
			
			if($anrede == 'Herr')
			{
				$optionherr = 'selected="selected"';
			}
			if($anrede == 'Frau')
			{
				$optionfrau = 'selected="selected"';
			}
			if($anrede == 'An')
			{
				$optionan = 'selected="selected"';
			}
		 ?>
			<option value="">Bitte w&auml;hlen</option>
			<option value="Herr" <?php echo $optionherr; ?> >Herr</option>
			<option value="Frau" <?php echo $optionfrau; ?>>Frau</option>
			<option value="An" <?php echo $optionan; ?> >An</option>
		</select> 
		<br />
		
	
		<label>Vorname</label>
		<input type="text" name="vorname" value="<?PHP echo $vorname; ?>" />
		<br />
		
		
		<label>Nachname</label>
		<input type="text" name="nachname" value="<?PHP echo $nachname; ?>" />
		<br />
		

		<label>Strasse</label>
		<input type="text" name="strasse" value="<?PHP echo $strasse; ?>" />
		<br />
		

		<label>Ort</label>
		<input type="text" name="ort" value="<?PHP echo $ort; ?>" />
		<br />
		

		<label>PLZ</label>
		<input type="text" name="plz" value="<?PHP echo $plz; ?>" />
		<input type="hidden" name="id" value="<?PHP echo $id; ?>" />
		<br />
		
	
		<label>Mitteilung</label>
		<textarea name="mitteilung" rows="4" cols="50"><?PHP echo $mitteilung; ?></textarea>
		<br />
		
		<button type="submit" name="submit">Senden</button> 
		
		</form>
		<p><a href="daten.php">Formulardaten anzeigen</a></p>
		
	</div>
		
	<div id="footer">
		<p>Max Muster<br />
		Musterstrasse 33<br />
		4444 Mustern</p>

	</div>

</div>




</body>
</html>

	
	