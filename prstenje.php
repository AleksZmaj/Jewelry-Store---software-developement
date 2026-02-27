<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proizvodi</title>
    <style>
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


        body { 
            /* Koristi flexbox za poravnavanje */
            justify-content: center; /* Horizontalno centriranje */
            align-items: flex-start; /* Vertikalno poravnavanje na početak */
            height: 100vh; /* Visina stranice */
            margin: 0; /* Ukloni podrazumevane margine */
            background-color: burlywood; /* Svetla pozadina za bolji izgled */
        }

        .product-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 60px; /* Razmak od vrha */
            margin-bottom: 100px; /* Smanjivanje visine stranice */
        }

        .product-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 200px;
            text-align: center;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 10px; /* Spuštanje proizvoda malo niže */
        }

        .product-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

    </style>
</head>
<body>

<header>
<img src="slika.jpg" alt="Pozadina footera" class="header-img">

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

<section id="products">
    <div class="product-list">
        <!-- Prvi proizvod -->
        <div class="product-item">
            <img src="love.jpg" alt="Love prsten">
            <h3>Love prsten</h3>
            <p>Cena: 190,000 RSD</p>
            <form action="korpa.php" method="POST">
                <input type="hidden" name="sifra_proizvoda" value="7">
                <input type="hidden" name="naziv" value="Love">
                <input type="hidden" name="cena" value="190000">
                <input type="submit" name="kupi" value="Dodaj u korpu">
            </form>
        </div>

        <!-- Drugi proizvod -->
        <div class="product-item">
            <img src="diamond.jpg" alt="diamond prsten">
            <h3>Diamond prsten</h3>
            <p>Cena: 84,000 RSD</p>
            <form action="korpa.php" method="POST">
                <input type="hidden" name="sifra_proizvoda" value="8">
                <input type="hidden" name="naziv" value="Diamond">
                <input type="hidden" name="cena" value="84000">
                <input type="submit" name="kupi" value="Dodaj u korpu">
            </form>
        </div>

        <!-- Treći proizvod -->
        <div class="product-item">
            <img src="peridot.jpg" alt="Summer">
            <h3>Summer prsten</h3>
            <p>Cena: 60,500 RSD</p>
            <form action="korpa.php" method="POST">
                <input type="hidden" name="sifra_proizvoda" value="9">
                <input type="hidden" name="naziv" value="Summer">
                <input type="hidden" name="cena" value="60500">
                <input type="submit" name="kupi" value="Dodaj u korpu">
            </form>
        </div>
    </div>
</section>

<footer>
<img src="slika.jpg" alt="Pozadina footera" class="footer-img">

<p>&copy; 2024 Zlatara PIN</p>
</footer>

</body>
</html>

