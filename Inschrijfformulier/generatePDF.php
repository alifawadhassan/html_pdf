<?php
require 'vendor/autoload.php';


// Variables
$name = "Tjerk Peters";
$medaille = "Ja, graag!";
$deel_nemer = "tr_";
$deel_name = "10";
$afstand = "10 kilometer";




//  Orientation PDF ( Portrait / landscape)
$mpdf = new \Mpdf\Mpdf([
  'orientation' => 'P'
]);


//  HTML AND CSS
$tableHtml = "";
$tableHtml = ' 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Results</title>
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<style>
</style>
  <main>
    <section class="main-page" >
      <div class="container">
        <div class="top position-relative">
          <img src="assets/images/top-banner.png" alt="banner-tope" class="img-fluid">
          <p class="numberTen position-absolute"
            style="line-height: 1;color: #ff0000; margin-top:-100px; text-align:center; left: 50%; transform: translateX(-70%);bottom: 0px;font-size: 90px;">
            10</p>
        </div>

        <div class="mid px-4">
          <div class="mid-top px-5 " style="text-align: center; ">
            <h2 style="font-size: 50px;">' . $name . '<br>
              Afstand: ' . $afstand . ' <br>
              Medaille: ' . $medaille . '</h2>
          </div>
          <br><br>
          <br>

          <div class="container">
  <table style="width: 100%;">
    <tr>
      <td style="width: 50%;">
        <div style="padding: 20px; text-align: left;">
          <h5 style="font-size: 25px;">Deelnemer:</h5>
          <h5 style="font-size: 25px;">' . $deel_nemer . ' </h5>
          <br><br>
          <h5 style="font-size: 25px;">Deelname:</h5>
          <h5 style="font-size: 25px;">' . $deel_name . '</h5>
        </div>
      </td>
      <td></td>
      <td style="width: 50%;">
        <div style="padding: 20px; text-align: right;">
          <img src="assets/images/qr.png" alt="r" class="img-fluid" style="width: 200px;">
        </div>
      </td>
    </tr>
    <tr>
      <td style="width: 50%;">
        <div style="padding: 20px; text-align: left;">
          <h5 style="font-size: 25px;">Noodnummers:</h5>
          <h5 style="font-size: 25px;">06 52 44 16 10</h5>
          <h5 style="font-size: 25px;">06 40 89 37 40</h5>
        </div>
      </td>
      <td></td>
      <td style="width: 50%;">
        <div style="padding: 20px;  margin-left:100px;">
          <img src="assets/images/bird.png" alt="r" style="width: 250px;">
        </div>
      </td>
    </tr>
  </table>
</div>


      </div>
    </section>
  </main>

</body>

</html>';

// Add the html to the PDF
$mpdf->WriteHTML($tableHtml);

$mpdf->SetHTMLFooter('<div class="foot" style="text-align: center; "><a href="www.vierdaagsekkesteren.nl" style="font-size:20px; color: blue " >www.vierdaagsekkesteren.nl</a></div>');

// Output the mpdf to the browser
$filePath = './PDFs/' . $name . '_' . uniqid() . '.pdf';

$mpdf->Output($filePath, 'F');

echo "PDF Generated Successfully";
