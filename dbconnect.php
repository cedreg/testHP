<?PHP
/*
* Datenbankbeispiel
* Datenbank Konstrukt: Anrede, Vorname, Nachname, Strasse, Ort, PLZ, Mitteilung
* in Datenbanktabelle "kontakt"
*/

/*
* Mit der Funktion mysqli_connect() öffnen Sie eine Verbindung zu der MySQL Datenbank.
* Mit der Funktion mysqli_connect_error() erhalten Sie bei einem Fehlerfall einen entsprechenden
* Fehlerbeschrieb.
*
* Sie bauen eine Datenbankverbindung wie folgt auf:
* Server (meist Localhost wenn kein Externer Datenbankserver angegeben),
* Benutzername (in unserem Beispiel "root"),
* Passwort (in unserem Fall "kein Passwort also leer lassen!"),
* Datenbankname (in unserem Fall "kontakt").
*
* Die Variable $db enthält die Datenbankverbindung als Objekt.
*/

$db = mysqli_connect("localhost", "root", "", "gruppeb");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}



?>