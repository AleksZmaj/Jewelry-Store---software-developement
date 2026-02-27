<?php
session_start(); // Pokreće sesiju

// Proverava da li je ime i prezime sačuvano u sesiji
$ime_prezime = isset($_SESSION['ime_prezime']) ? $_SESSION['ime_prezime'] : "Nepoznati korisnik";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
        background-color: burlywood;
      }
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
header {
  position: relative;
            position: relative;
            color: #ecf0f1;
            padding: 5px;
            padding-bottom: 10px;
            margin-bottom: 5px;
            text-align: center;
            height: 50px;
            text-size-adjust: 20px;
            margin-left:-8px;
            margin-right:-8px;
            margin-top:-8px;
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
.container{
  border-radius: 5%;
    background-color: beige; /* Plava boja */
            color: black; /* Bela boja teksta */
            flex: 1; /* Prilagodljiva širina */
            text-align: center; /* Tekst centriran */
            padding: 20px; /* Unutrašnji razmak */
  margin-left: 200px;
  margin-bottom: 30px;
margin-top:100px;
margin-right:200px;
font-size :30px;
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
                <li><a href="#">Mindjuse</a></li>
            </ul>
          </li>
          <li><a href="korpa.php">Korpa</a></li> 
          <li><a href="kontakt.html">Kontakt</a></li>
        </ul>
        </nav> 
      
  <div class="container"> 
  <p>Dobrodosli, <?php echo htmlspecialchars($ime_prezime); ?></p> 
  Dobrodosli u svet zlatnog sjaja i tradicije- gde se tradicija i elegancija spajaju da bi Vam pružili najlepše dragocenosti.
  Zlatara PIN osnovana je davne 1985. godine u srcu našeg grada, kao porodična radnja. Naši proizvodi nastali su u maloj radionici,
   gde vešte zanatlije ručno izrađuju vaš nakit.
  Tokom godina, Zlatara PIN je postala sinonim za kvalitet i poverenje. Svaki komad nakita koji izađe sa naših polica odražava spoj tradicionalnog i modernog dizajna. Za nas je svaki klijent član naše porodice.
  Danas nudimo širok asortiman nakita i širimo svoj biznis sa puno ljubavi. Uživajte u svakom momentu Vaše kupovine.</div>
  <footer>
  <img src="slika.jpg" alt="Pozadina footera" class="footer-img">
    <p>&copy; 2024 Zlatara PIN</p>
</footer>
</body>
</html>