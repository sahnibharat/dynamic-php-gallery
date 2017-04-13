<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="w3.css">
<style type="text/css">

body
{
 background:#fff;
}
* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1111111111;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
.container {
  position: relative;
  float: left;
  width: 22%;
  margin: 1vw;

}

.image {
  display: block;
  width:100%;
 box-shadow:0px 0px 20px #cecece;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 100%;
  right: 5%;
  background-color: rgba(30,144,255,0.8);
  overflow: hidden;
  width: 0;
  height: 100%;
  transition: .5s ease;
}

.container:hover .overlay {
  width: 100%;
  left: 0%;
}

.text {
  color: white;
  font-size: 20px;
  font-size: 2vw;
  position: absolute;
  overflow-wrap: break-word;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.plus{
	font-size: 3vw;
	position: absolute;
	background-color: black;
	color: white;
	bottom: 0%;
	left: 0%;
	padding-left: 3%;
	padding-right: 3%;
	height: auto;
	white-space: nowrap;
	width: 4vw;
}
@media only screen and (max-width: 769px){
	.container{
		width: 47%;
    height: 35%;
	}
}
@media only screen and (max-width: 420px ){
  .container{
    width: 95%;
  }
}
</style>
</head>
<body>
<?php
$counter=0;
$folder_path = 'images/'; //image's folder path
$modal_path ='images/modal';
$num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);
$files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}");

$filecount=0;
if($num_files > 0)
{
  $folder = opendir($folder_path);
 while(false !== ($file = readdir($folder))) 
 {
  $file_path = $folder_path.$file;
  $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
  if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp') 
  {
    $filecount=$filecount+1;
   ?>
   <?php
$path_parts = strtolower(pathinfo($file ,PATHINFO_FILENAME));
?>
<div class="container">
  	<img class="image" src="<?php echo $file_path; ?>" alt="<?php echo $path_parts; ?>"  style="height:250px;margin:0px;">
    <div class="overlay cursor" onclick="openModal(); currentSlide(<?php echo $counter=$counter+1 ?>);" >
  		<div class="text" ><?php echo $path_parts; ?></div>
  		<div class="plus">&#43;</div>
  	</div>
</div>


            <?php
  }
 }
  ?>
 <div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  <?php
  $folder1=opendir($modal_path);
  $counter=0;
  while(false !== ($file = readdir($folder1))) 
 {
  $file_path = $folder_path.$file;
  $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
  if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp') 
  {
    $counter=$counter+1;
   ?>
   <?php
$path_parts = strtolower(pathinfo($file ,PATHINFO_FILENAME));
?>
    <div class="mySlides">
      <div class="numbertext"><?php echo $counter ?> / <?php echo $filecount ?></div>
      <img class="img-responsive" src="<?php echo $file_path; ?>" style="width:100%">
      <div class="caption-container">
      <p id="caption"><?php echo $path_parts; ?></p>
    </div>
    </div>
    <?php
}
} ?>
  </div>
</div>
<?php
}
else
{
 echo "the folder was empty !";
}

?>
<script type="text/javascript">
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html>