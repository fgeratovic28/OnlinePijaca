<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Pijaca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'bazapodataka.php'; ?>

<header>
        <h1>Dobrodošli na online pijacu!</h1>
        <nav>
            <ul>
                <li><a href="#">Početna</a></li>
                <li><a href="#proizvodi">Proizvodi</a></li>
                <li><a href="#preuzimanje">Katalog</a></li>
                <li><a href="#forma-registracija">Registracija</a></li>
            </ul>
        </nav>
</header>

<?php

    $marki_tekst = "Dobrodošli na Online pijacu. | Kod nas možete poručiti različite proizvode. | Proizvodi stižu na vašu adresu u roku od 2h. |";

    echo  "<marquee id='marki'>$marki_tekst</marquee>";

?>

    <div class="slider">
        <img src="pijace slike/liman.jpg" alt="Slika 1" class="trenutna-slika">
        <button id="prethodniBtn" class="dugme-slider prethodno-dugme">&lt;</button>
        <button id="sledeciBtn" class="dugme-slider sledece-dugme">&gt;</button>
    </div>

    <div id="pretraga">
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="kljucne-reci">Ključne reči:</label>
    <input type="text" id="kljucne-reci" name="kljucne-reci">

    <label for="kategorija">Kategorija:</label>
    <select id="kategorija" name="kategorija">
        <option value="">Sve kategorije</option>
        <option value="voće">Voće</option>
        <option value="povrće">Povrće</option>
        <option value="mlecni proizvodi">Mlečni proizvodi</option>
        <option value="hrana">Hrana</option>  
    </select>

    <button type="submit">Pretraži</button>
</form>
</div>


    <main>        
    <section id="proizvodi">

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kljucne-reci'])) {
   
    $kljucneReci = $_GET['kljucne-reci'];
    $kategorija = $_GET['kategorija'];

   
    $sql = "SELECT * FROM proizvodi WHERE ime LIKE '%$kljucneReci%'";

    
    if (!empty($kategorija)) {
        $sql .= " AND kategorija = '$kategorija'";
    }

 
    $rezultat = $conn->query($sql);

   
    if ($rezultat->num_rows > 0) {

        while($red = $rezultat->fetch_assoc()) {
            echo '<div class="proizvodi-kartica">';
            echo '<img src="' . $red["slika"] . '" alt="' . $red["ime"] . '">';
            echo '<h3>' . $red["ime"] . '</h3>';
            echo '<p>Cena: ' . $red["cena"] . ' dinara</p>';
            echo '<p>Kategorija: ' . $red["kategorija"] . '</p>';
            
            echo '<form class="dodaj-forma">';
            echo '<input type="hidden" name="proizvodId" value="' . $red["id"] . '">';
            echo '<input type="hidden" name="proizvodIme" value="' . $red["ime"] . '">';
            echo '<input type="hidden" name="proizvodCena" value="' . $red["cena"] . '">';
            echo '<input type="hidden" name="proizvodJedinica" value="' . $red["jedinica"] . '">';
            echo 'Količina: <input type="number" name="vidljiva-kolicina" value="1" min="1"> ' . $red["jedinica"];
            echo '<input type="hidden" name="kolicina" value="1">';
            echo '<button type="button" onclick="dodajUKorpu(this)">Dodaj u korpu</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo "Nema rezultata pretrage.";
    }
} else {
    $sql = "SELECT * FROM proizvodi";
    $rezultat = $conn->query($sql);

    if ($rezultat->num_rows > 0) {
      
        while($red = $rezultat->fetch_assoc()) {
            echo '<div class="proizvodi-kartica">';
            echo '<img src="' . $red["slika"] . '" alt="' . $red["ime"] . '">';
            echo '<h3>' . $red["ime"] . '</h3>';
            echo '<p>Cena: ' . $red["cena"] . ' dinara</p>';
            echo '<p>Kategorija: ' . $red["kategorija"] . '</p>';
            
            echo '<form class="dodaj-forma">';
            echo '<input type="hidden" name="proizvodId" value="' . $red["id"] . '">';
            echo '<input type="hidden" name="proizvodIme" value="' . $red["ime"] . '">';
            echo '<input type="hidden" name="proizvodCena" value="' . $red["cena"] . '">';
            echo '<input type="hidden" name="proizvodJedinica" value="' . $red["jedinica"] . '">';
            echo 'Količina: <input type="number" name="vidljiva-kolicina" value="1" min="1"> ' . $red["jedinica"];
            echo '<input type="hidden" name="kolicina" value="1">';
            echo '<button type="button" onclick="dodajUKorpu(this)">Dodaj u korpu</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo "Nema dostupnih proizvoda.";
    }
}
?>


</section>

        <section id="korpa">
            <h2>Korpa</h2>
            <p id="poruka-korpa"></p>
            <ul id="stavke-korpe"></ul>
            <p>Ukupno: <span id="ukupna-cena">0.00 din</span></p>
            <button id="dugme-kupovine" onclick="kupovina()">Kupi</button>
        </section>
    </main>

    <div id="preuzimanje">
    <h1>Katalog</h1>
    <a href="preuzmi_pdf.php">Klikni ovde da preuzmeš naš katalog!</a> 
</div>


<div id="vreme">
    <h1>Trenutno vreme i datum <br><span id="sat"></span></h1>
</div>

        <footer>
    <h2>Registracija</h2>
    <form id="forma-registracija" action="obrada_podataka.php" method="POST">
        <div id="poruka"></div>
        <label for="korisnicko_ime">Korisničko ime:</label>
        <input type="text" id="korisnicko_ime" name="korisnicko_ime" placeholder="Unesite korisnicko ime...">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="Unesite vas email...">
        <label for="broj_telefona">Broj telefona:</label>
        <input type="tel" id="broj_telefona" name="broj_telefona" placeholder="Unesite vas broj telefona(brojevima)">
        <label for="lozinka">Lozinka:</label>
        <input type="password" id="lozinka" name="lozinka" placeholder="Unesite lozinku(malo slovo, veliko slovo, znak...)">
        <button type="submit">Registruj se</button>
    </form>
</footer>

<script src ="script.js"></script>
    
</body>
</html>



