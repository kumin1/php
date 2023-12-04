<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sklep_ubraniowy";


$conn = new mysqli($servername, $username, $password);
if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $produktID = $_POST['klientID']
    $imie = $_POST['imie']
    $nazwisko = $_POST['nazwisko']
    $numer_telefonu = $_POST['numerTelefonu']

    $sql = 'INSERT INTO klienci (klientID,imie,nazwisko,numer_telefonu) VALUES ('$klientID','$imie','$nazwisko','$numer_telefonu')';
    
    $produktID = $_POST['produktID']
    $nazwa_produktu = $_POST['nazwaProduktu']
    $stan_magazynu = $_POST['stanMagazynu']
    $typ_produktu = $_POST['typProduktu']
    $cena_produktu = $_POST['cenaProduktu']

    $sql = 'INSERT INTO produkty (produktID,nazwaProduktu,stanMagazynu,typProduktu,cenaProduktu) VALUES ('$produktID','$nazwa_produktu','$stan_magazynu','$typ_produktu','$cena_produktu')';
    
    $data_zamowienia = $_POST['dataZamowienia']  

    $sql = 'INSERT INTO zamowienia (dataZamowienia) VALUES ('$data_zamowienia')';

    if($conn -> query($sql)===TRUE){
        echo('dodano')
    }else{
        echo('error')
    }
    
}
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "stworzono baze danych\n";
} else {
    echo "error tworzenia bazy danych " . $conn->error;
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS klienci (
    klientID INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    numer_telefonu VARCHAR(15) NOT NULL
)";
if ($conn->query($sql) == TRUE) {
    echo "stworzono tabele klienci\n";
} else {
    echo "Error tworzenia tabeli klienci " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS produkty (
    produktID INT AUTO_INCREMENT PRIMARY KEY,
    nazwa_produktu VARCHAR(100) NOT NULL,
    stan_magazynu INT NOT NULL,
    typ_produktu VARCHAR(50) NOT NULL,
    cena_produktu VARCHAR(2000) NOT NULL
)";
if ($conn->query($sql) == TRUE) {
    echo "stworzono tabele produkty\n";
} else {
    echo "Error tworzenia tabeli produkty" . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS zamowienia (
    zamowienieID INT AUTO_INCREMENT PRIMARY KEY,
    klientID INT,
    FOREIGN KEY (klientID) REFERENCES klienci(klientID),
    data_zamowienia DATE NOT NULL,
    produktID INT,
    FOREIGN KEY (produktID) REFERENCES produkty(produktID)
)";
if ($conn->query($sql) == TRUE) {
    echo "stworzono tabele zamowienia\n";
} else {
    echo "Error tworzenia tabeli za" . $conn->error;
}



$conn->query("INSERT INTO klienci VALUES ('21','Mathilda','Harris','372515895')");
$conn->query("INSERT INTO klienci VALUES ('79','Jeff','Roy','173626168')");
$conn->query("INSERT INTO klienci VALUES ('1','Virginia','Sanders','661935222')");
$conn->query("INSERT INTO klienci VALUES ('53','Annie','Miller','201915852')");
$conn->query("INSERT INTO klienci VALUES ('89','Tillie','Higgins','715346631')");
$conn->query("INSERT INTO klienci VALUES ('78','Milton','Thornton','759169162')");
$conn->query("INSERT INTO klienci VALUES ('52','Jeff','Rogers','101910868')");
$conn->query("INSERT INTO klienci VALUES ('16','Franklin','Cross','292730371')");
$conn->query("INSERT INTO klienci VALUES ('82','Millie','Morales','276283343')");
$conn->query("INSERT INTO klienci VALUES ('67','Jerome','Waters','932559697')");

$conn->query("INSERT INTO produkty VALUES ('12','a','9','kurtka','1452')");
$conn->query("INSERT INTO produkty VALUES ('29','b','21','spodnie','1407')");
$conn->query("INSERT INTO produkty VALUES ('22','c','15','buty','989')");
$conn->query("INSERT INTO produkty VALUES ('25','d','96','rekawiczki','681')");
$conn->query("INSERT INTO produkty VALUES ('61','e','61','koszulka','1389')");
$conn->query("INSERT INTO produkty VALUES ('78','f','41','pas','1484')");
$conn->query("INSERT INTO produkty VALUES ('13','g','18','spodnie','820')");
$conn->query("INSERT INTO produkty VALUES ('14','h','27','kurtka','123')");
$conn->query("INSERT INTO produkty VALUES ('45','i','45','buty','1122')");
$conn->query("INSERT INTO produkty VALUES ('79','j','83','szalik','336')");

$conn->close();
?>
