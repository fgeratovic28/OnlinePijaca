const trenutnaSlika = document.querySelector('.trenutna-slika');
const prethodniDugme = document.getElementById('prethodniBtn');
const sledeciDugme = document.getElementById('sledeciBtn');



const slike = [
    "pijace slike/liman.jpg",
    "pijace slike/futoska.jpg",
    "pijace slike/detelinara.jpg"
];
let trenutniIndeksSlike = 0;

function prikaziSledecuSliku() {
    trenutniIndeksSlike++;
    if (trenutniIndeksSlike >= slike.length) {
        trenutniIndeksSlike = 0;
    }
    azurirajSliku();
}

function prikaziPrethodnuSliku() {
    trenutniIndeksSlike--;
    if (trenutniIndeksSlike < 0) {
        trenutniIndeksSlike = slike.length - 1;
    }
    azurirajSliku();
}

function azurirajSliku() {
    trenutnaSlika.src = slike[trenutniIndeksSlike];
}




const interval = setInterval(prikaziSledecuSliku, 4000);

prethodniDugme.addEventListener('click', prikaziPrethodnuSliku);
sledeciDugme.addEventListener('click', prikaziSledecuSliku);

function dodajUKorpu(button) {
    console.log('Kliknuto na dugme "Dodaj u korpu"');
    
    
    const forma = button.closest('.dodaj-forma');
    console.log('Forma:', forma);
    
    
    const proizvodId = forma.querySelector('input[name="proizvodId"]').value;
    const proizvodIme = forma.querySelector('input[name="proizvodIme"]').value;
    const proizvodCena = parseFloat(forma.querySelector('input[name="proizvodCena"]').value);
    const proizvodJedinica = forma.querySelector('input[name="proizvodJedinica"]').value;
    const kolicina = parseInt(forma.querySelector('input[name="vidljiva-kolicina"]').value);
    console.log('Proizvod ID:', proizvodId);
    console.log('Proizvod Ime:', proizvodIme);
    console.log('Proizvod Cena:', proizvodCena);
    console.log('Proizvod Jedinica:', proizvodJedinica);
    console.log('Količina:', kolicina);

   
    const listaKorpe = document.getElementById('stavke-korpe');
    console.log('Lista korpe:', listaKorpe);
    
  
    const stavkaKorpe = document.createElement('li');
    stavkaKorpe.textContent = `${proizvodIme} x ${kolicina} ${proizvodJedinica} - ${(proizvodCena * kolicina).toFixed(2)} din`;
    console.log('Novi <li> element:', stavkaKorpe);
    
   
    listaKorpe.appendChild(stavkaKorpe);
    
    
    const ukupnaCenaElement = document.getElementById('ukupna-cena');
    const trenutnaCena = parseFloat(ukupnaCenaElement.textContent);
    ukupnaCenaElement.textContent = (trenutnaCena + (proizvodCena * kolicina)).toFixed(2);
    
    console.log('Proizvod dodat u korpu.');
}


function kupovina() {
    console.log('Kupovina funkcija pozvana');
    
   
    const listaKorpe = document.getElementById('stavke-korpe');
    
   
    listaKorpe.innerHTML = '';
 
    const ukupnaCena = document.getElementById('ukupna-cena');
    ukupnaCena.textContent = '0.00 din';
    
    
    const porukaKorpe = document.getElementById('poruka-korpa');
    porukaKorpe.innerText = 'Hvala na kupovini.';
    porukaKorpe.style.display = 'block';
    
    
    setTimeout(function() {
        porukaKorpe.style.display = 'none';
    }, 2000);
    
    console.log('Kupovina funkcija završena');
}


 
 function azurirajSat() {
    
    var trenutnoVreme = new Date();
    
   
    var sati = trenutnoVreme.getHours();
    var minuti = trenutnoVreme.getMinutes();
    var sekunde = trenutnoVreme.getSeconds();

    
    var dan = trenutnoVreme.getDate();
    var mesec = trenutnoVreme.getMonth() + 1;
    var godina = trenutnoVreme.getFullYear();

    
    sati = ("0" + sati).slice(-2);
    minuti = ("0" + minuti).slice(-2);
    sekunde = ("0" + sekunde).slice(-2);
    dan = ("0" + dan).slice(-2);
    mesec = ("0" + mesec).slice(-2);

    
    document.getElementById("sat").textContent = dan + "." + mesec + "." + godina + ", " + sati + ":" + minuti + ":" + sekunde;

   
    setTimeout(azurirajSat, 1000);
}


window.onload = azurirajSat;



