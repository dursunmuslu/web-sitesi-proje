<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Website Tablo</h1>

<table id="customers">
  <tr>
    <th>Ad Soyad</th>
    <th>Konu Başlığı</th>
    <th>Tel. Numara</th>
    <th>Mail Adresi</th>
    <th>Mesaj</th>
  </tr>

  <?php

  session_start();
  
  if($_SESSION["user"]=="")
  {
    echo"<script>window.location.href='cikis.php'</script>";
  }
  else{

    include("baglanti.php");

    $sec="Select * From siteiletisim";
    $sonuc=$baglan->query($sec);

    if($sonuc->num_rows>0) //veri olup olmadığını kontrol eder
    {
      while($cek=$sonuc->fetch_assoc()){ //fetch_assoc verileri çekip tabloya atar

        echo"
      <tr>
        <td>".$cek['ad']."</td>
        <td>".$cek['telefon']."</td>
        <td>".$cek['mail']."</td>
        <td>".$cek['konu']."</td>
        <td>".$cek['mesaj']."</td>
    </tr>
      ";
      }
    }

    else{
      echo"Kayıtlı Veri Bulunamadı";
    }
  }
  ?>


  
</table>

</body>
</html>

