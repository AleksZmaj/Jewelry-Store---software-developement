<?php
// Povezivanje sa bazom podataka
$host = "localhost";
$username = "root";
$password = "";
$database = "zlatara";
$db = mysqli_connect($host, $username, $password, $database); // Kreira konekciju prema MySQL bazi
session_start(); // Pokreće sesiju

$message = ""; // Promenljiva za prikaz poruka korisniku

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Provera da li je zahtev poslat POST metodom
    if (isset($_POST['jmbg'])) { // Provera da li je JMBG prosleđen
        $jmbg = mysqli_real_escape_string($db, $_POST['jmbg']); // Sanitizacija unosa za JMBG
        $ime_prezime = mysqli_real_escape_string($db, $_POST['ime_prezime'] ?? ''); // Sanitizacija unosa za ime i prezime
        $adresa = mysqli_real_escape_string($db, $_POST['adresa'] ?? ''); // Sanitizacija unosa za adresu
        $gmejl = mysqli_real_escape_string($db, $_POST['gmejl'] ?? ''); // Sanitizacija unosa za mejl
        $telefon = mysqli_real_escape_string($db, $_POST['telefon'] ?? ''); // Sanitizacija unosa za telefon

        if (isset($_POST['create'])) { // Ako je kliknuto dugme za kreiranje naloga
            // Provera da li nalog već postoji
            $checkQuery = "SELECT * FROM kupci WHERE jmbg='$jmbg'";
            $checkResult = mysqli_query($db, $checkQuery); // Izvršava upit za proveru

            if (mysqli_num_rows($checkResult) > 0) { // Provera da li je pronađen nalog
                $message = "<p>Korisnik sa ovim JMBG-om već postoji.</p>";
            } else {
                // Kreiranje novog naloga
                $insertQuery = "INSERT INTO kupci (jmbg, ime_prezime, adresa, mejl, telefon) 
                                VALUES ('$jmbg', '$ime_prezime', '$adresa', '$gmejl', '$telefon')";
                $insertResult = mysqli_query($db, $insertQuery); // Izvršava upit za umetanje

                if ($insertResult) { // Provera da li je umetanje uspešno
                    $_SESSION['ime_prezime'] = $ime_prezime; // Unosi  ime i prezime u sesiji
                    $message = "<p>Nalog je uspešno kreiran.</p>";
                } else {
                    $message = "<p>Greška pri kreiranju naloga: " . mysqli_error($db) . "</p>"; // Prikazuje grešku ako umetanje nije uspelo
                }
            }
        } elseif (isset($_POST['delete'])) { // Ako je kliknuto dugme za brisanje naloga
            // Brisanje naloga
            $deleteQuery = "DELETE FROM kupci WHERE jmbg='$jmbg'";
            $deleteResult = mysqli_query($db, $deleteQuery); // Izvršava upit za brisanje

            if (mysqli_affected_rows($db) > 0) { // Provera da li je neki red obrisan
                $message = "<p>Nalog je uspešno obrisan.</p>";
            } else {
                $message = "<p>Nalog sa ovim JMBG-om ne postoji ili je već obrisan.</p>"; // Prikazuje poruku ako nalog ne postoji
            }
        } elseif (isset($_POST['update'])) { // Ako je kliknuto dugme za ažuriranje naloga
            // Ažuriranje naloga
            $updateQuery = "UPDATE kupci SET 
                            ime_prezime='$ime_prezime', 
                            adresa='$adresa', 
                            mejl='$gmejl', 
                            telefon='$telefon' 
                            WHERE jmbg='$jmbg'";
            $updateResult = mysqli_query($db, $updateQuery); // Izvršava upit za ažuriranje

            if (mysqli_affected_rows($db) > 0) { // Provera da li je neki red ažuriran
                $_SESSION['ime_prezime'] = $ime_prezime; // Ažurira ime i prezime u sesiji
                $message = "<p>Nalog je uspešno ažuriran.</p>";
            } else {
                $message = "<p>Nema promena ili nalog sa ovim JMBG-om ne postoji.</p>"; // Prikazuje poruku ako nema promena ili nalog ne postoji
            }
        }
    } else {
        $message = "<p>Molimo unesite JMBG.</p>"; // Poruka za nedostajući JMBG
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zlatara</title>
    <style>
 body {
    background-color: burlywood;
    margin: 0; /* Uklanja sve margine sa strane */
    padding: 0; /* Uklanja sve padding vrednosti */
}

/* Stil za zaglavlje */
header {
  position: relative;
  color: #ecf0f1;
  padding: 5px;
  padding-bottom: 10px;
  margin-bottom: 5px;
  text-align: center;
  height: 50px;
  text-size-adjust: 20px;
}
.header-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Prilagodite sliku veličini */
    z-index: -1; /* Postavlja sliku iza sadržaja */
}

/* Stil za footer */
footer {
            
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center;
            color: #ecf0f1;
            text-align: center;
            padding: 10px;
            position: fixed; /* Footer je uvek uz donju ivicu */
            bottom: 0;
            width: 100%;
            margin-left:-8px;
        }
        .footer-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Prilagodite sliku veličini */
    z-index: -1; /* Postavlja sliku iza sadržaja */
}
nav {
            margin-left: 460px;
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            list-style: none;
            line-height: 40px;
            float: left;
            background: black; 
            text-align: center;
            padding: 10px;
            font-size: 20px;
            color: black;
        }

        nav ul li a {
            color: #fff;
            padding: 10px;
            font-size: 10px;
            text-decoration: none;
        }

        li a:hover {
            box-shadow: 0 0 2em 0.5em blue;
        }

        nav ul li ul {
            display: none; /* Sakriva podelemente */
        }

        nav ul li:hover ul {
            display: block;
            position: absolute;
            margin-top: 5px;
            border: 2px solid #007BFF;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        nav ul li:hover ul li {
            float: none;
        }

/* Stil za formu */
#forma {
    border-radius: 5%;
    background-color: beige;
    color: black;
    flex: 1;
    text-align: center;
    padding: 20px;
    margin-top: 300px;
    margin-right:500px;
    margin-left:300px; /* Centriranje forme sa marginama sa strane i pomeranje ispod header-a */
    width: 60%; /* Širina forme */
    position: relative;
    z-index: 1;
}
/* Stil za poruku */
#message {
    text-align: center;
    color: green;
    font-weight: bold;
    margin-top: 10px;
}

    </style>
</head>
<body>
<header>
<img src="slika.jpg" alt="Pozadina footera" class="footer-img">
    <h1>Zlatara</h1>
</header>
<nav>
    <ul>
        <li><a href="html1.html">Početna</a></li>
        <li><a href="nalog.php">Nalog</a></li>
        <li><a href="onama.php">O nama</a></li>
        <li><a href="#">Proizvodi</a>
            <ul>
                <li><a href="narukvice.php">Narukvice</a></li>
                <li><a href="ogrlice.php">Ogrlice</a></li>
                <li><a href="prstenje.php">Prstenje</a></li>
                <li><a href="mindjuse.php">Mindjuse</a></li>
            </ul>
        </li>
        <li><a href="korpa.php">Korpa</a></li> 
        <li><a href="kontakt.html">Kontakt</a></li>
    </ul>
</nav>
<div id="forma">
    <p>Nalozi kreiraj/obrisi/azuriraj</p>
    <form action="" method="post">
        JMBG: <input type="text" name="jmbg" required><br>
        Ime i Prezime: <input type="text" name="ime_prezime"><br>
        Adresa: <input type="text" name="adresa"><br>
        Mejl: <input type="email" name="gmejl"><br>
        Telefon: <input type="text" name="telefon"><br><br>
        <button type="submit" name="create">Kreiraj nalog</button>
        <button type="submit" name="delete">Obriši nalog</button>
        <button type="submit" name="update">Azuriraj nalog</button>
    </form>
    <div id="message">
    <?= $message ?>
</div>
</div>

<footer>
<img src="slika.jpg" alt="Pozadina footera" class="footer-img">
    <p>&copy; 2024 Zlatara PIN</p>
</footer>
</body>
</html>
