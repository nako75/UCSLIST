<? 
session_start();
include "head.php";
include "system/db.php";

$site = htmlspecialchars(trim($_POST['site']));
$hacker = htmlspecialchars(trim($_POST['hacker']));
$description = htmlspecialchars(trim($_POST['description']));
$type = htmlspecialchars(trim($_POST['type']));
$note = htmlspecialchars(trim($_POST['note']));



$sunucu = $_POST['sunucu'];

if($_POST['gkodumuz'] == "123456" && $_POST['zgkod'] == "123456"){ // güvenlik kontrol

if( empty($site) OR empty($hacker) ){

echo "<center>Failed<br/><br/>";
echo '<a href="javascript:history.back(1)">Try again</a></center>';

} elseif( strlen($hacker) < 4 ) {

echo "<center>Server Name must be up 4 character !<br/><br/>";
echo '<a href="javascript:history.back(1)">Back</a></center>';

} elseif( strlen($hacker) > 200 ) {

echo "<center>Server Name Up to high!<br/><br/>";
echo '<a href="javascript:history.back(1)">back</a></center>';

} elseif( ereg("[<>]",$hacker) ) {

echo "<center>Server name has been used<br/><br/>";
echo '<a href="javascript:history.back(1)">back</a></center>';

} elseif( substr($site, 0, 7) != "http://")  {

echo "<center>Only support http:// url extension<br/><br/>";
echo '<a href="javascript:history.back(1)">Back</a></center>';

}  elseif( (!strstr($site,"."))){
echo '<script>alert("Url is Non Active or Blank");history.back(1);</script>';
die();
}  else {

  //Güvenlik Kodunu Temizle
  unset($_SESSION['guv']);



// KAYIT KONTROL

if ( strstr($site, "www") ){


$ilk = strpos($site, ".");
$orta = substr($site, $ilk+1);
$ilkson = strpos($orta, "/");
$orta = substr($site, $ilk+1, $ilkson+1);

$uzunluk = strlen($orta);
$son = substr($orta, $uzunluk-1);

if ($son == "/"){
$ara = substr($orta, 0, $uzunluk-1);
} else {
//$ara = $orta;
$ara = $site."/";
}

} else { // www yoksa


$orta = substr($site, 7);
$ilkson = strpos($orta, "/");
$orta = substr($orta, 0, $ilkson+1);

$uzunluk = strlen($orta);
$son = substr($orta, $uzunluk-1);

if ($son == "/"){
$ara = substr($orta, 0, $uzunluk-1);
} else {
$ara = $site."/";
}

} // www var mı kontrol
$altiay = 60 * 60  * 60 * 24 * 30 * 6;
$simdi = time();
$kontrol_yap = mysql_query("SELECT * FROM kayitlar WHERE url LIKE '%$site%'");
$kontrol = mysql_num_rows($kontrol_yap);

if($kontrol > 0){ // eskiden var mı kontrol

echo "<center>Url Failed or Check Again<br/><br/>";
echo '<a href="javascript:history.back(1)">Back</a></center>';

} else { // Eskiden yoksa

///site aç veya yanlış adresi göster ////

$crl = curl_init();

curl_setopt($crl, CURLOPT_TIMEOUT, "30");
curl_setopt($crl, CURLOPT_URL, "$site");
curl_setopt($crl, CURLOPT_HEADER, 0);
curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);

$icerik = addslashes(curl_exec($crl));

curl_close($crl);

if ($icerik == "") echo '<center>Error!<br /><br /><a href="javascript:history.back(1)">Back</a></center>';
else {

/// EKLEME ////

$tarih = time();
$ip = $_SERVER['REMOTE_ADDR'];
$hacker = addslashes($hacker);
$special="0";
if ((strstr($site,".gov")) or (strstr($site,".edu")) or (strstr($site,".mil")) or (strstr($site,".gob"))){
$special="1";
}
$ekle = @mysql_query("INSERT INTO kayitlar (id, hacker, url, description, type, note, icerik, tarih, onay, tur, defacerip)
VALUES('', '$hacker', '$site', '$description', '$type', '$note', '$icerik', '$tarih', '0','$special','$ip') ");

$kayit_bak = mysql_query("SELECT * FROM hackerlar WHERE hacker = '$hacker'");
$kayit_sayisi = mysql_num_rows($kayit_bak);

if ($kayit_sayisi > 0){ // daha önce kayıdı varsa
	
$ekle2 = mysql_query("UPDATE hackerlar SET onaysiz = onaysiz + 1, deface = deface + 1 WHERE hacker = '$hacker'");

} else { // daha önce kayıdı yoksa

$ekle2 = mysql_query("INSERT INTO hackerlar (id, hacker, onaysiz, onayli, deface) VALUES('', '$hacker', '1', '0', '1') ");

} // daha önce kayıt kontrol kapa

if ($ekle && $ekle2){

if ( $special=="1" ){
echo '<script>alert("Your Url Submitted has been Successfully Saved!"); document.location="../"; </script>';
}
else{
echo '<script>alert("Your Url Submitted has been Successfully Saved!"); document.location="../"; </script>';
}
} else {

echo "<center>ERRORRR..!<br /><br />";
echo '<a href="">N</a></center>';

} // ekle kontrol

} // Adres doğruluğu kontrol

} // Eskiden var mı kontrol

} // empty kontrol


} else { // submit kontrol

echo "<center>FAIL!<br/><br/>";
echo '<a href="javascript:history.back(1)">back</a></center>';

}

?>