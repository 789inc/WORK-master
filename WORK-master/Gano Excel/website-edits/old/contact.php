<?php
function show_files($id)
{
    
    
set_data("TRAINING,id=$id");
if (data(file1)<>'') {
 
if(substr(data(file1), -3)=='jpg' || substr(data(file1), -3)=='png' || substr(data(file1), -3)=='gif') 
{
$pic='skin/images/jpg2.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}


if(substr(data(file1), -3)=='pdf' ) 
{
$pic='skin/images/4.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

if(substr(data(file1), -3)=='doc' || substr(data(file1), -4)=='docx') 
{
$pic='skin/images/3.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

echo '<a target="_blank" href="geadmin/'.data(file1).'"><img style="margin:3px;" src="'.$pic.'"></a>';    
}



if (data(file2)<>'') {
 
if(substr(data(file2), -3)=='jpg' || substr(data(file2), -3)=='png' || substr(data(file2), -3)=='gif') 
{
$pic='skin/images/jpg2.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}


if(substr(data(file2), -3)=='pdf' ) 
{
$pic='skin/images/4.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

if(substr(data(file2), -3)=='doc' || substr(data(file2), -4)=='docx') 
{
$pic='skin/images/3.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

echo '<a target="_blank" href="geadmin/'.data(file2).'"><img style="margin:3px;" src="'.$pic.'"></a>';    
}
if (data(file3)<>'') {
 
if(substr(data(file3), -3)=='jpg' || substr(data(file3), -3)=='png' || substr(data(file3), -3)=='gif') 
{
$pic='skin/images/jpg2.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}


if(substr(data(file3), -3)=='pdf' ) 
{
$pic='skin/images/4.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

if(substr(data(file3), -3)=='doc' || substr(data(file3), -4)=='docx') 
{
$pic='skin/images/3.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

echo '<a target="_blank" href="geadmin/'.data(file3).'"><img style="margin:3px;" src="'.$pic.'"></a>';    
}
if (data(file4)<>'') {
 
if(substr(data(file4), -3)=='jpg' || substr(data(file4), -3)=='png' || substr(data(file4), -3)=='gif') 
{
$pic='skin/images/jpg2.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}


if(substr(data(file4), -3)=='pdf' ) 
{
$pic='skin/images/4.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

if(substr(data(file4), -3)=='doc' || substr(data(file4), -4)=='docx') 
{
$pic='skin/images/3.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

echo '<a target="_blank" href="geadmin/'.data(file4).'"><img style="margin:3px;" src="'.$pic.'"></a>';    
}

if (data(file5)<>'') {
 
if(substr(data(file5), -3)=='jpg' || substr(data(file5), -3)=='png' || substr(data(file5), -3)=='gif') 
{
$pic='skin/images/jpg2.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}


if(substr(data(file5), -3)=='pdf' ) 
{
$pic='skin/images/4.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

if(substr(data(file5), -3)=='doc' || substr(data(file5), -4)=='docx') 
{
$pic='skin/images/3.png';
// <img src="skin/images/1.png">vid&nbsp;<img src="skin/images/2.png">&nbsp;<img src="skin/images/3.png">&nbsp;<img src="skin/images/4.png">    
}

echo '<a target="_blank" href="geadmin/'.data(file5).'"><img style="margin:3px;" src="'.$pic.'"></a>';    
}


}
?><head>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="lib/slick/slick.min.js"></script>
  <script type="text/javascript" src="js/parallax.js"></script>
<link rel="stylesheet" type="text/css" href="css/contact2.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>

<link rel="stylesheet" type="text/css" href="lib/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="skin/style2.css">
<link rel="stylesheet" type="text/css" href="css/cafe.css">
	<script src="js/jquery.tiles-gallery.js"  type="text/javascript"></script>
	<link href="css/jquery-tilesgallery.css" rel="Stylesheet" />

<link type="text/css" rel="stylesheet" href="lib/lightSlider/css/lightSlider.css" />
<script src="lib/lightSlider/js/jquery.lightSlider.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
</head>

<body>

<style type="text/css">

#cboxes td p{

font-size:14px;
}
	
	#cboxes{
	margin: 1% auto !important;
}
</style>

<div class="contact-wrapper wrapper" >

    <!-- NAVBAR -->

 <?php include 'navbar2.php';?>

    <!-- Top Slider -->

<div  class="ganocafe5-contact" align="center">

<table width=100% cellspacing=0 cellpadding=0>
<tr>
<td style="width:50%;" valign="top">
    <div class="sidetd1-contact"></div>
</td>
<td style="width:1000px;max-height:382px;">
    <div style="width:999px;max-width:999px;">
    
 <ul id="lightSlider-1" style="padding: 0px !important;">
	  
<?php 
  set_data("SLIDER,location='contact'");
    $slides=collection();
    foreach ($slides as $slide)
    {
    echo '<li>
	<div class="contact-social-list">
	    <div class="contact-slider">	
		<div class="contact-social-list-inner">
		<img height=86 style="z-index: 0; float: left; margin-left: -80px; margin-top: -10px;" src="skin/images/igano-logo.png">
	  <h3 style="color:white;">FIND US AT:</h3>

  <a href="<?php echo $fblink;?>" class="contact-social-a"><img src="skin/images/ifacebook.png"></a>
  <a href="<?php echo $twlink;?>" class="contact-social-a"><img src="skin/images/itwitter.png"></a>
  <a href="<?php echo $inlink;?>" class="contact-social-a"><img src="skin/images/iinstagram.png"></a>
  <a href="<?php echo $lilink;?>" class="contact-social-a"><img src="skin/images/ilinkedin.png"></a>
  <a href="<?php echo $ytlink;?>" class="contact-social-a"><img src="skin/images/iyoutube.png"></a>
  </div><img height=382 style="z-index: 0; float:none;" src="geadmin/'.$slide[image].'"></div>
		</div>
		<div class="contact-corporate-inner">
		    <img src="skin/images/american-flag-150x90.png" width="60" style="position: relative;padding: 10px;">
			<h3>US Corporate Headquarters</h3>

			<p><b>Chino Hills, CA</b>
		<br>15439 Dupont Ave, Chino, California 91710
		<br>
		<br>(626) - 480 - 7550 Corporate
		<br>(626) - 338 - 8081 Customer Support
			</p>
  </div>
		</div></div>
  </li>';     
    }
?>    
     
</ul>
</div>
</td>
<td style="width:50%;" valign="top" >
<div class="sidetd2-contact" style="background-color: 514e49p"></div>
</td>
</tr>
</table>
	</div>
      <div style="height:auto;background-size:contain;width:100%;"class="contact-outer content-container" align="center">
      		<div class="map-holder" width="100%" align="center">
			<span class="lightSlider-1-map-overlay"><img src="skin/images/map-overlay.png"></span>
		  </div>
  <div class="ge-contact">
    <table	align="center" id="cboxes" width=1024>
     <tr>
      <td class="cols-4 gec-col corporate-opportunity-centers" valign="top"><h3>Corporate Opportunity Centers</h3>
          <p>
					<strong>Chino Hills, CA</strong>
						<br><a href="https://www.google.com/maps/place/15435+Dupont+Ave,+Chino,+CA+91710/" target="_blank">15345 Fairfield Ranch Road, Suite 160,
                      <br>Chino Hills, CA 91706</a>
						<br>Monday, Wednesday, Friday: 9:00am - 6:00pm
						<br>Tuesday: 9:00am - 9:00pm
						<br>Thursday: 9:00am - 9:00pm
						<br>Saturday: 10:00am - 3:00pm
                    </p>
                    <p>
                      <strong>US Corporate Headquarters</strong>
                      <br>Irwindale, CA
                      <br><a href="https://www.google.com/maps/place/4981+N+Irwindale+Ave+%23800,+Irwindale,+CA+91706/" target="_blank">4981 N. Irwindale Ave., Ste. 800,
                      <br>Irwindale, CA 91706</a>
                      <br>Monday, Wednesday, Friday: 9:00am - 6:00pm
						<br>Tuesday: 9:00am - 9:00pm
						<br>Thursday: 9:00am - 9:00pm
						<br>Saturday: 10:00am - 3:00pm
         			 </p>
                    <p>
                       <strong>Rialto, CA</strong>
                       <br><a href="https://www.google.com/maps/place/223+S+Riverside+Ave,+Rialto,+CA+92376/" target="_blank">223 South Riverside Ave,
                      	<br>Rialto, CA 92376</a>
						<br>Monday-Friday: 8:00am - 5:00pm
						<br>Saturday: Closed
                    </p>
                    <p>
                  <strong>Fresno, CA</strong>
						<br><a href="tel:15598920727" target="_blank" class="contact-phone">(559) - 892 - 0727</a>
						<br><a href="https://www.google.com/maps/place/3632+W+Shaw+Ave,+Fresno,+CA+93711/" target="_blank">3632 West Shaw Avenue,
                      	<br>Fresno, CA 93711</a>
						<br>Monday-Friday: 10:00am - 7:00pm
						<br>Saturday: Closed
        		  </p>
                    <p>
			         <strong>Las Vegas, NV</strong>
						<br><a href="tel:17028002668" target="_blank" class="contact-phone">(702) - 800 - 2668</a>
						<br><a href="https://www.google.com/maps/place/4712+W+Sahara+Ave+%232,+Las+Vegas,+NV+89102/" target="_blank">4712 West Sahara Ave #2
                      	<br>Las Vegas, NV 89102</a>
						<br>Monday-Friday: 10:00am - 7:00pm
						<br>Saturday: Closed

		                  </p>
                    <p>
                      <strong>Denver, CO</strong>
						<br><a href="tel:13034688654" target="_blank" class="contact-phone">(303) - 468 - 8654</a>
						<br><a href="https://www.google.com/maps/place/4621+Peoria+St+h,+Denver,+CO+80239/" target="_blank">4621 Peoria St. Suite H
                      	<br>Denver, CO 80239</a>
						<br>Monday-Friday: 10:00am - 7:00pm
						<br>Saturday: 10:00am - 3:00pm
                    </p>
                    <p>
					<strong>Cordelia</strong>
					<br><a href="tel:17075636262" target="_blank" class="contact-phone">(707) - 563 - 6262</a>
					<br><a href="https://www.google.com/maps/place/4455+Central+Way+c,+Fairfield,+CA+94534/" target="_blank">4455 S Central Way Suite C
                    <br>Fairfield, CA 94534</a>
					<br>Monday-Friday: 8:30am - 5:30pm
					<br>Saturday: Closed
                    </p>
                    </td>
</div>
<div class="ge-contact">
      <td class="cols-4 gec-col the-amercias" valign="top"><h3>The Americas</h3>
          <p>
					<strong>Gano Excel México:</strong>
					<br><a href="https://www.google.com/maps/place/Calle+Lucerna+26,+Juárez,+06600+Juárez,+CDMX,+Mexico/" target="_blank">Dirección: Lucerna # 26 (esquina Abraham González) Col. Juárez Del. Cuauhtémoc México D.F. C.P. 06600.</a>
						<br><a href="tel:+525541950598" target="_blank" class="contact-phone">Teléfono: +52 55 4195 0598</a>
			  			<br><a href="mailto:atencionaclientes@ganoexcel.mx" target="_blank">Email: atencionaclientes@ganoexcel.mx</a>
						<br><a href="http://www.ganoexcel.mx" target="_blank">Web: www.ganoexcel.mx</a>
                    </p>
                    <p>
                      <strong>Gano Excel Guatemala:</strong>
						<br>Dirección: 12 Calle 1-25 Zona 10, Edificio Geminis 10, Torre Norte, Local 214 Y 214 A. Ciudad de Guatemala, Guatemala.
						<br><a href="tel:+50222131000" target="_blank" class="contact-phone">Teléfono: (+502) 22131000</a>
						<br><a href="http://ganoitouch.com.gt/" target="_blank">Web: http://ganoitouch.com.gt/</a> 
                    </p>
                    <p>
                      <strong>Gano Excel Panamá:</strong>
						<br>Dirección: Ciudad de Panamá, Panamá. Vía España, calle primera El Carmen y Ave. Ramón Arias, plaza Korintho, local comercial No.2.
						<br><a href="tel:+5073020807" target="_blank" class="contact-phone">Teléfono: (+507) 3020807</a>
						<br><a href="mailto:pedidos@ganoitouch.com.pa" target="_blank">Email: pedidos@ganoitouch.com.pa</a>
						<br><a href="http://www.ganoitouch.com.pa/" target="_blank">Web: www.ganoitouch.com.pa</a>
         			 </p>
                    <p>
					<strong>Gano iTouch El Salvador:</strong>
						<br><a href="tel:+50325112900" target="_blank" class="contact-phone">Teléfono: +503 2522 2900</a>
						<br><a href="mailto:servicios@ganoitouch.com.sv" target="_blank">Email: servicios@ganoitouch.com.sv</a>
						<br><a href="http://www.ganoitouch.com.sv/" target="_blank">Web:www.ganoitouch.com.sv</a>
		                  </p>
                    <p>
					<strong>Gano iTouch Costa Rica:</strong>
						<br><a href="tel:+50640202400" target="_blank" class="contact-phone">Teléfono: +506 40202400</a>
						<br><a href="mailto:servicios@ganoitouch.co.cr" target="_blank">Email: servicios@ganoitouch.co.cr</a>
						<br><a href="http://www.ganoitouch.co.cr" target="_blank">Web: www.ganoitouch.co.cr</a>
                    </p>
</td>
</div>
</div>

<div class="ge-contact">


<!-- <h3>twitter</h3> -->
</div>
<!-- <img src="img/contact/twitter.png"> -->
<div class="ge-contact">
      <td class="cols-4 gec-col south-america" valign="top">
          <p>
                      Gano Excel Panamá:
						<br>Dirección: Ciudad de Panamá, Panamá. Vía España, calle primera El Carmen y Ave. Ramón Arias, plaza Korintho, local comercial No.2.
						<br>Teléfono: (+507) 3020807
						<br><a href="mailto:pedidos@ganoitouch.com.pa">Email: pedidos@ganoitouch.com.pa</a>
						<br><a href="http://www.ganoitouch.com.pa/" target="_blank">Web:www.ganoitouch.com.pa</a>

                    </p>
                    <p>
                       Gano Excel Colombia:
						<br>Dirección: Avenida 19 N° 134a -06, Bogotá
						<br>Teléfono: +57 1 7423399 / 01 8000 18 42 66
						<br><a href="mailto:info@ganoexcel.com.co">Email: info@ganoexcel.com.co</a>
						<br><a href="http://www.ganoexcel.com.co/" target="_blank">Web:www.ganoexcel.com.co</a>

                    </p>
                    <p>
                       Gano Excel Perú:
						<br>Dirección:
						<br>Sede corporativa en Miraflores: Av. Angamos Oeste 554
						<br>Sucursal Los Olivos: Av. Antúnez de Mayolo 1393 (referencia: Cruce con av. Universitaria)
						<br>Sucursal Chiclayo: Calle Juan Cuglievan N° 874
						<br>Sucursal Arequipa: Av. Lima 100, edificio Nasya II, Yanahuara
						<br>Teléfono:
						<br>Central telefónica: +51 01 7480630
						<br>Línea RPC: 994818294
						<br>Línea RPM: #950082841
						<br>Web:
						<br><a href="http://www.gano-itouch.com.pe/" target="_blank">Web: http://www.gano-itouch.com.pe/</a>
						<br><a href="http://peru.ganoitouch.biz" target="_blank">Oficina Virtual: http://peru.ganoitouch.biz</a>
						<br><a href="https://www.facebook.com/ganoitouch.pe" target="_blank">Facebook: www.facebook.com/ganoitouch.pe</a>
						<br><a href="https://www.youtube.com/user/ganoitouchoficial" target="_blank">YouTube: https://www.youtube.com/ganoitouchoficial</a>
          </p>
                    <p>
			         Gano Excel Ecuador:
						<br>Dirección: Av. 12 de Octubre N24 - 100 y Madrid, Quito, Ecuador
						<br><a href="tel:+593023815260" target="_blank" class="contact-phone">Teléfono: (+593) 02 – 3815260</a>
						<br><a href="http://ganoitouch.com.ec/" target="_blank">Web: http://ganoitouch.com.ec/</a>
		                  </p></td>
</div>
</div>       
<!-- <img src="img/contact/twitter.png"> -->
 <td class="cols-4 twit-col fb-col" valign="top">
 <div class="twitter-container">
<a class="twitter-timeline" href="https://twitter.com/ganoexcel" data-widget-id="589209632482021376">Tweets by @ganoexcel</a>
</div>
 <div class="corporate-headquarters google-map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.7268665457214!2d-117.93698618478368!3d34.10213688059245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2d7f8426f5ba3%3A0xf1edc6570103d451!2s4981+N+Irwindale+Ave+%23800%2C+Irwindale%2C+CA+91706!5e0!3m2!1sen!2sus!4v1505951839883" width="230" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>

	 </div>
<!-- <h3>facebook</h3> -->
</div>
      </tr>
      </table>
      <br><br>
</div>

<!--FOOTER-->

</div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>

<?php include "footer.php" ?>
