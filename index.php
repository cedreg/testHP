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
		
		//String fuer Error Message
		$erroranrede = '';
		$errorvorname = '';
		$errornachname = '';
		$errorstrasse = '';
		$errorplz = '';
		$errorort = '';
		$errormitteilung = '';
		
		$ausgabe = '';
		
		$validierung = true;	//Bei Fehlerfall wird diese Variable false
		
		
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
		//ENDE: Formulardaten abfragen
		
		//Pruefung
		if(isset($_GET['submit']))
		{
		
			
			if($anrede == '')
			{
				$erroranrede = '<p>Bitte geben Sie eine Anrede an.</p>';
				$validierung = false;
			}
			
			if($vorname == '')
			{
				$errorvorname = '<p>Bitte geben Sie einen Vorname an.</p>';
				$validierung = false;
			}
			
			if($nachname == '')
			{
				$errornachname = '<p>Bitte geben Sie einen Nachname an.</p>';
				$validierung = false;
			}
			
			if($strasse == '')
			{
				$errorstrasse = '<p>Bitte geben Sie eine Strasse an.</p>';
				$validierung = false;
			}
			
			if($ort == '')
			{
				$errorort = '<p>Bitte geben Sie einen Ort an.</p>';
				$validierung = false;
			}
			
			if($plz == '')
			{
				$errorplz = '<p>Bitte geben Sie eine Postleitzahl an.</p>';
				$validierung = false;
			}
			
			if($mitteilung == '')
			{
				$errormitteilung = '<p>Was wollten Sie uns mitteilen?</p>';
				$validierung = false;
			}
		}
		
		//ENDE: Pruefung
		
		
		//ENDE: Hier schreiben wir ein PHP-Script
	?>
	
	<!-- Formular Error wird ausgebenen, falls ein Fehler aufgetreten ist -->
	<?php
		//Wenn $validierung true ist wird ein E-Mail gesendet
		//ansonsten wird eine Fehlermeldung ausgegeben 
		
		$nachricht = '';
		if($validierung and isset($_GET['submit']))
		{
			
			$nachricht .= 'Anrede: '.$anrede;
			$nachricht .= 'Vorname: '.$vorname;
			$nachricht .= 'Nachname: '.$nachname;
			$nachricht .= 'Strasse: '.$strasse;
			$nachricht .= 'PLZ: '.$plz;
			$nachricht .= 'Ort: '.$ort;
			$nachricht .= 'Nachricht: ';
			$nachricht .= $mitteilung;
			
			mail('marion.gasser@gally-websolutions.com', 'Kontaktformular Testseite', $nachricht);
			$ausgabe = "Die E-Mail wurde erfolgreich versendet. Vielen Dank ...";
		}
		
		//Formulardaten werden in Datenbank abgespeichert
		if(isset($_GET['submit']) AND $validierung == true)
		{
			$abfrage = "INSERT INTO kontaktdaten SET
			anrede = '".$anrede."',
			vorname = '".$vorname."',
			nachname = '".$nachname."',
			strasse = '".$strasse."',
			ort = '".$ort."',
			plz = '".$plz."',
			mitteilung = '".$mitteilung."',
			datum = NOW()
			;";
			$ergebnis = mysqli_query($db, $abfrage);
			
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
	<h1>Willkommen in Basel ...</h1>
	<img class="bild" src="bild1.jpg" alt="basel" />
	
	
	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed 
	diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
	sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. 
	Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit 
	amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy 
	eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam 
	voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet 
	clita kasd gubergren, no sea takimata sanctus est Lorem ipsum 
	dolor sit amet.</p>
	
	
	<!--
	Anrede (select), Vorname (input), Nachname (input), Strasse (input),
	Ort (input), PLZ (input), Mitteilung (textarea), Senden (Button)
	-->
	
	
</div>
<div id="content2"><h2>Aktelles</h2><p>Lorem ipsum dolor sit amet, consetetur 
	sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore 
	et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo 
	duo dolores et ea rebum.</p>
	<p><a href="http://www.loremipsum.de/" target="_blank">www.loremipsum.de</a></p>
	
	<div id="errormessage">	
		<h2>Kontakt</h2>
		
		<form name="einfachesformular" action="?" method="get">
		<?php echo $ausgabe; ?>
		<?php echo $erroranrede; ?>
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
		
		<?php echo $errorvorname; ?>
		<label>Vorname</label>
		<input type="text" name="vorname" value="<?PHP echo $vorname; ?>" />
		<br />
		
		<?php echo $errornachname; ?>
		<label>Nachname</label>
		<input type="text" name="nachname" value="<?PHP echo $nachname; ?>" />
		<br />
		
		<?php echo $errorstrasse; ?>
		<label>Strasse</label>
		<input type="text" name="strasse" value="<?PHP echo $strasse; ?>" />
		<br />
		
		<?php echo $errorort; ?>
		<label>Ort</label>
		<input type="text" name="ort" value="<?PHP echo $ort; ?>" />
		<br />
		
		<?php echo $errorplz; ?>
		<label>PLZ</label>
		<input type="text" name="plz" value="<?PHP echo $plz; ?>" />
		<br />
		
		<?php echo $errormitteilung; ?>
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

	
	