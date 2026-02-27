
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
    margin: 0 auto; /* Centriranje tabele */
    width: 80%; /* Proširenje tabele */
    border-collapse: collapse; /* Uklanjanje duplih linija */
}

td, th {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2; /* Svetlija pozadina za zaglavlja */
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
</nav><br><br>

<?php
session_start();
$poruka = "";

// Provera da li je proizvod dodat u korpu
if (isset($_POST['kupi'])) {
    if (isset($_POST['sifra_proizvoda'], $_POST['naziv'], $_POST['cena'])) {
        $sifra_proizvoda = $_POST['sifra_proizvoda'];
        $naziv = $_POST['naziv'];
        $cena = $_POST['cena'];
        

        // Dodavanje proizvoda u sesiju (korpa)
        if (!isset($_SESSION['korpa'])) {
            $_SESSION['korpa'] = [];
        }

        $found = false;
        foreach ($_SESSION['korpa'] as &$item) {
            if ($item['sifra_proizvoda'] === $sifra_proizvoda) {
                $item['kolicina'] += 1; // Ako proizvod postoji, povećavamo količinu
                $found = true;
                break;
            }
        }
        unset($item);

        if (!$found) {
            $_SESSION['korpa'][] = [
                'sifra_proizvoda' => $sifra_proizvoda,
                'naziv' => $naziv,
                'cena' => $cena,
                'kolicina' => 1,
            ];
        }
    } else {
        $poruka = "Neki podaci nisu poslati ispravno!";
    }
}

// Ažuriranje količine u korpi
if (isset($_POST['azuriraj_korpu'])) {
    foreach ($_POST['kolicina'] as $sifra_proizvoda => $kolicina) {
        foreach ($_SESSION['korpa'] as &$item) {
            if ($item['sifra_proizvoda'] === $sifra_proizvoda) {
                $item['kolicina'] = $kolicina;
            }
        }
    }
}

// Završetak kupovine
if (isset($_POST['zavrsi_kupovinu'])) {
    if (!empty($_SESSION['korpa'])) {
        $ukupan_iznos = 0;
        foreach ($_SESSION['korpa'] as $item) {
            $ukupan_iznos += $item['cena'] * $item['kolicina'];
        }
        echo "<div class='hvala-poruka'>
                <h2>Hvala što kupujete kod nas!</h2>
                <p>Ukupan iznos vaše kupovine: <strong>{$ukupan_iznos} RSD</strong></p>
              </div>";
        // Brisanje korpe
        unset($_SESSION['korpa']);
    } else {
        echo "<p>Vaša korpa je prazna.</p>";
    }
    exit;
}

// Prikaz korpe
echo "<h1>Vaša korpa</h1>";
if (!empty($_SESSION['korpa'])) {
    echo "<form method='POST' action=''>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Opis</th><th>Količina</th><th>Ukupno</th></tr>";

    $ukupan_iznos = 0;

    foreach ($_SESSION['korpa'] as $item) {
        $ukupna_cena_proizvoda = $item['cena'] * $item['kolicina'];
        $ukupan_iznos += $ukupna_cena_proizvoda;

        // Prikaz proizvoda
        echo "<tr>";
        

        // Prikaz opisa iz baze
        $opis = "";
        $conn = new mysqli("localhost", "root", "", "zlatara");
        if ($conn->connect_error) {
            die("Konekcija nije uspela: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT sifra_proizvoda, vrsta_zlata, finoca_zlata, vrsta_kamena, gramaza_materijala, naziv_proizvoda FROM opis_proizvoda WHERE sifra_proizvoda = ?");
        $stmt->bind_param("s", $item['sifra_proizvoda']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $opis = "<strong>Naziv:</strong> {$row['naziv_proizvoda']}<br>
                     <strong>Šifra:</strong> {$row['sifra_proizvoda']}<br>
                     <strong>Vrsta zlata:</strong> {$row['vrsta_zlata']}<br>
                     <strong>Finoća zlata:</strong> {$row['finoca_zlata']}<br>
                     <strong>Vrsta kamena:</strong> {$row['vrsta_kamena']}<br>
                     <strong>Gramaža materijala:</strong> {$row['gramaza_materijala']}";
        } else {
            $opis = "<em>Opis nije dostupan</em>";
        }
        $stmt->close();
        $conn->close();

        echo "<td>{$opis}</td>";

        // Prikaz količine i ukupne cene
        echo "<td><input type='number' class='kolicina' name='kolicina[{$item['sifra_proizvoda']}]' value='{$item['kolicina']}' min='1' data-cena='{$item['cena']}' data-id='{$item['sifra_proizvoda']}'></td>";
        echo "<td id='ukupno_{$item['sifra_proizvoda']}' class='ukupno'>{$ukupna_cena_proizvoda} RSD</td>";
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td colspan='3' align='right'><strong>Ukupan iznos:</strong></td>";
    echo "<td><strong id='ukupan_iznos'>{$ukupan_iznos} RSD</strong></td>";
    echo "</tr>";
    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='azuriraj_korpu' value='Ažuriraj korpu'>";
    echo "<input type='submit' name='zavrsi_kupovinu' value='Završi kupovinu'>";
    echo "<button type='button' onclick='window.history.back();'>Nastavi kupovinu</button>";
    echo "</form>";
} else {
    echo "<p>Vaša korpa je prazna.</p>";
}

// Prikaz poruke
if (!empty($poruka)) {
    echo $poruka;
}
?>

<script>
    // Funkcija za ažuriranje cene kada se promeni količina
    document.querySelectorAll('.kolicina').forEach(input => {
        input.addEventListener('input', function () {
            const cena = parseFloat(this.getAttribute('data-cena'));
            const id = this.getAttribute('data-id');
            const nova_kolicina = this.value;
            const ukupno = cena * nova_kolicina;

            // Ažuriraj prikaz ukupne cene za proizvod
            document.getElementById('ukupno_' + id).textContent = ukupno + " RSD";

            // Ažuriraj ukupnu cenu za celu korpu
            let ukupan_iznos = 0;
            document.querySelectorAll('.ukupno').forEach(ukupno => {
                ukupan_iznos += parseFloat(ukupno.textContent);
            });
            document.getElementById('ukupan_iznos').textContent = ukupan_iznos + " RSD";
        });
    });
</script>

<footer>
<img src="slika.jpg" alt="Pozadina footera" class="footer-img">
    <p>&copy; 2024 Zlatara PIN</p>
</footer>
</body>
</html>