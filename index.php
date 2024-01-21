<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
<h2>AES</h2>
<form method="post">
  <div class="form-group row">
    <label for="pesan" class="col-4 col-form-label">Nomor Pengiriman</label> 
    <div class="col-8">
      <input id="pesan" name="pesan" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="kunci" class="col-4 col-form-label">Tanggal Kirim</label> 
    <div class="col-8">
      <input id="kunci" name="kunci" type="text" required="required" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <label for="kunci" class="col-4 col-form-label">Kode Distributor</label> 
    <div class="col-8">
      <input id="kunci" name="kunci" type="text" required="required" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<?php if (isset($_POST['submit'])) {
    $pesan=filter_var($_POST['pesan'],FILTER_SANITIZE_STRING);
    $kunci=filter_var($_POST['kunci'],FILTER_SANITIZE_STRING);
    $algoaes="aes-128-ctr";
    $iv="1234567891011121";
    $chipertext=openssl_encrypt($pesan,$algoaes,$kunci,0,$iv);
    $data=base64_encode($chipertext);
    echo "File hasil encrpt : <br>".$data;
    include"qrcode/qrlib.php";
    $filename="temp/".date('YmdHis').".png";
    $errorCorrectionLevel = 'H';
    $matrixPointSize = 2;
    QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 1);   
    echo '<br>File QR : <br><img src="'.$filename.'">';
    include('bar128.php');
    echo '<br>Barcode : '.bar128($data);
}
