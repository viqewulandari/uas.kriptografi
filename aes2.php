<form method="post">
 <h2>Barcode Maker</h2>
 <input type="text" name="databarcode" placeholder="Ketik data barcodenya"><br>
 <button type="submit" name="bBuat">Buat Barcode</button><br>
</form>
<?php if (isset($_POST['bBuat'])) {
  $databarcode=$_POST['databarcode'];
  $kunci="UM Bengkulu";$iv="1234567891011121";$algo="aes-128-ctr";
  $databarcode=openssl_encrypt($databarcode,$algo,$kunci,0,$iv);
  include('bar128.php');
  echo bar128($databarcode);
  include('qrcode/qrlib.php');
  $filename=date('YmdHis').".png";
  QRcode::png($databarcode, $filename, "H", 6, 1); 
  echo '<br><img src="'.$filename.'">';
}
?>
