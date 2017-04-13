<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
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

.row1 > .column1 {
  padding: 0 8px;
}

.row1:after {
  content: "";
  display: table;
  clear: both;
}

.column1 {
  float: left;
  width: 25%;
}

/* The modal01 (background) */
.modal01 {
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

/* modal01 Content */
.modal01-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The close1 Button */
.close1 {
  color: white;
  position: absolute;
  top: 10px;
  opacity:1;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: grey;
  text-decoration: none;
  cursor: pointer;
}

.myslide0s11 {
  display: none;
}

.cursor1 {
  cursor: pointer
}

/* next1 & prev1ious buttons */
.prev1,
.next1 {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: grey;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next1 button" to the right */
.next1 {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev1:hover,
.next1:hover {
  color:white;
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext1 {
  color: grey;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.img {
  margin-bottom: -4px;
}

.caption-container1 {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo1 {
  opacity: 0.6;
}

.active1,
.demo1:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
.container1 {
  position: relative;
  float: left;
  width: 22%;
  margin: 1vw;

}

.image1 {
  display: block;
  width:100%;
 box-shadow:0px 0px 20px #cecece;
  width: 100%;
  height: auto;
}

.overlay1 {
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

.container1:hover .overlay1 {
  width: 90%;
  left: 5%;
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
.modal01img{
  height:100%;
  width:auto;
  display:block;
  }
@media only screen and (max-width: 769px){
  .container1{
    width: 47%;
    height: 35%;
  }
  .text{
  font-size:3.5vw;
  }
  .modal01img{
  width:80%;
  }
}
@media only screen and (max-width: 420px ){
  .container1{
    width: 95%;
  }
}
</style>
</head>
<body>
<?php
$counter=0;
$folder_path = 'book/'; //image1's folder path
$modal01_path ='book/modal0';
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
<div class="container1">
    <img class="image1" src="<?php echo $file_path; ?>" alt="<?php echo $path_parts; ?>"  style="height:250px;margin:0px;">
    <div class="overlay1 cursor1" onclick="openmodal01(); currentslide0(<?php echo $counter=$counter+1 ?>);" >
      <div class="text" ><?php echo $path_parts; ?></div>
      <div class="plus">&#43;</div>
    </div>
</div>


            <?php
  }
 }
  ?>

 <div id="mymodal01" class="modal01">
  <span class="close1 cursor1" onclick="close1modal01()">&times;</span>
  <div class="modal01-content">
  <a class="prev1" onclick="plusslide0s1(-1)">&#10094;</a>
    <a class="next1" onclick="plusslide0s1(1)">&#10095;</a>
  <?php
  $folder1=opendir($modal01_path);
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
    <center><div class="myslide0s11">
      <div class="numbertext1"><?php echo $counter ?> / <?php echo $filecount ?></div>
      <img class="img-responsive" src="<?php echo $file_path; ?>">
      <div class="caption-container1">
      <p id="caption"><?php echo $path_parts; ?></p>
    </div>
    </div></center>
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
<div class="container"><a href="" style="float:left;text-decoration:none;">view more..</a></div>
<script type="text/javascript">
function openmodal01() {
  document.getElementById('mymodal01').style.display = "block";
}

function close1modal01() {
  document.getElementById('mymodal01').style.display = "none";
}

var slide0Index = 1;
showslide0s1(slide0Index);

function plusslide0s1(n) {
  showslide0s1(slide0Index += n);
}

function currentslide0(n) {
  showslide0s1(slide0Index = n);
}

function showslide0s1(n) {
  var i;
  var slide0s1 = document.getElementsByClassName("myslide0s11");
  var dots = document.getElementsByClassName("demo1");
  if (n > slide0s1.length) {slide0Index = 1}
  if (n < 1) {slide0Index = slide0s1.length}
  for (i = 0; i < slide0s1.length; i++) {
      slide0s1[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active1", "");
  }
  slide0s1[slide0Index-1].style.display = "block";
  dots[slide0Index-1].className += " active1";
}
</script>

</body>
</html>