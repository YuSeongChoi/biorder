<?php
$conn = mysqli_connect("127.0.0.1", "root", "20150285", "biorder");

 ?>

<!DOCTYPE html>
<html lang = "ko">
<head>
	<meta charset="utf-8">

  <style>
  a{
  text-decoration:none;
}
.item-list:hover{
	background-color:rgba(93,93,93,0.6);

}
.item-list{
  color : #3d3d3d;
	position: relative;
	cursor: pointer;
	display: block;
	overflow: hidden;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	-webkit-tap-highlight-color: transparent;
	vertical-align: middle;
	z-index: 1;
	transition: .3s ease-out;

}

.modal-window {
  position: fixed;
  background-color: rgba(1, 1, 1, 0.15);
  top: 0;
  right: 000;
  bottom: 0;
  left: 0;
  z-index: 999;
  opacity: 0;
  pointer-events: none;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

.modal-window:target {
  opacity: 1;
  pointer-events: auto;
}

.modal-window>div {
  width: 400px;
  position: relative;
  margin: 10% auto;
  padding: 2rem;
  background: #f3f3f3;
  color: #731414;
}

.modal-window header {
  font-weight: bold;
}

.modal-close {
  color: #aaa;
  line-height: 50px;
  font-size: 120%;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 70px;
  text-decoration: none;
}

.modal-close:hover {
  color: #000;
}

.modal-window h1 {
  font-size: 150%;
  margin: 0 0 15px;
}

.modal-basket {
	padding: 2px 16px;
	background-color : #5cb85c;
	color: white
}

div#wrap{
text-align: center; background-color: white;
}

div#menubar{
	margin: 0 auto;
	text-align: center; width:730px; height:80px;
	background-color:green;
	overflow:hidden;
	display:block;
}

div#mymenu{
	margin: 0 auto;
	width:730px; height:80px; text-align: center;
	background-color:green;
	overflow:hidden;
	display:block;
}

div#mainis{
	margin: 0 auto;
	width:730px; line-height:60px; height:530px; background-color: rgb(17, 232, 184);
	/* overflow:hidden; */
	text-align: center;
	vertical-align: middle;
	/* display: inline-inline-block;
	vertical-align:middle; */

	}
div#food{
	margin:0px auto;
	margin-left: 20px;
	margin-right: 20px;
	margin-top:50px;
	width:170px; height:170px; background-color: red;
	display:inline-block;
	overflow: hidden;

}
.Button {
	margin-top: 10px;
	margin-bottom: 10px;
	text-decoration:none;
	font-family:굴림체;
	background:#6e7570;
	background:-o-linear-gradient(90deg, #6e7570, #000000);
	background:-moz-linear-gradient( center top, #6e7570 5%, #000000 100% );
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #6e7570), color-stop(1, #000000) );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#6e7570', endColorstr='#000000');
	background:-webkit-linear-gradient(#6e7570, #000000);
	background:-ms-linear-gradient(#6e7570, #000000);
	background:linear-gradient(#6e7570, #000000);
	text-align: center;
	vertical-align: middle;
	-moz-border-radius:0 25px 0 25px;
	-webkit-border-radius:0 25px 0 25px;
	border-radius:0 25px 0 25px;
	display:inline-block;
	font-size:20px;
	color:#ffffff;
	width:140px;
	height:25px;
	padding:13px;
	border-color:#ffffff;
	border-width:2px;
	border-style:solid;
}

.Button:active {
	box-shadow:#d6d6d6 1px 0 2px;
	o-box-shadow:#d6d6d6 1px 0 2px;
	-moz-box-shadow:#d6d6d6 1px 0 2px;
	-webkit-box-shadow:#d6d6d6 1px 0 2px;
	position:relative;
	top:3px
}

.Button:hover {
	background:#000000;
	background:-o-linear-gradient(90deg, #000000, #6e7570);
	background:-moz-linear-gradient( center top, #000000 5%, #6e7570 100% );
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #000000), color-stop(1, #6e7570) );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#6e7570');
	background:-webkit-linear-gradient(#000000, #6e7570);
	background:-ms-linear-gradient(#000000, #6e7570);
	background:linear-gradient(#000000, #6e7570);
}


</style>
</head>


<div id = "wrap">
<div id="menubar">
<a href="rice.php" class='Button'>식사류</a>
<a href="noodle.php" class='Button'>라면/우동</a>
<a href="fries.php" class='Button'>튀김</a>
<a href="drink.php" class='Button'>음료</a>
</div>
<div id="mainis">
	<div id="food">
		<a href="#open-moda?id=katsdong" data-toggle="modal"><img src="가츠동.png" width="170" height="170"></a>
	</div>
	<div id="food">
		<a href="#open-moda?id=gyudong" data-toggle="modal"><img src="규동.png" width="170" height="170"></a>
	</div>
	<div id="food">
		<a href="#open-moda?id=sakedong" data-toggle="modal"><img src="연어덮밥.png" width="170" height="170"></a>
	</div>
	<div id="food">
	</div>
	<div id="food">
	</div>
	<div id="food">
	</div>
</div>
<div id="mymenu">

<?php

class Basket{

    public $menu, $num, $top1, $top2, $top3;

    function printBasket(){
      print_r($this);
    }

}

$object = new Basket;
if ($_POST){
$object->menu = $_POST['menu'];
$object->num = $_POST['num'];
$object->top1 = $_POST['topping1'];
$object->top2 = $_POST['topping2'];
$object->top3 = $_POST['topping3'];

file_put_contents('basket.txt', $_POST['menu'].$_POST['num'].$_POST['topping1'].$_POST['topping2'].$_POST['topping3']."\n", FILE_APPEND);
file_put_contents('show.txt', $_POST['menu'].$_POST['num'].'개'."\n", FILE_APPEND);
$str = file_get_contents('show.txt');
echo nl2br($str."\n");
}
?>

</div>

<div id="open-moda?id=katsdong" class="modal-window">

	<div id="modal-basket">
		주문하시겠습니까?
		 <a href="#modal-close" title="Close" class="modal-close">Close</a>
		 <p>
       <form action="index.php" method="post">
         메뉴 : <input type="text" name="menu" value="가츠동"><br>
         개수 : <input type="number" name="num" placeholder="갯수를 입력하세요"><br>
         토핑1 : <input type="checkbox" name="topping1"><br>
         토핑2 : <input type="checkbox" name="topping2"><br>
         토핑3 : <input type="checkbox" name="topping3"><br>

         <input type = "submit" value="장바구니 넣기">
       </form>
	 </p>
</div>
</div>

<div id="open-moda?id=gyudong" class="modal-window">

	<div id="modal-basket">
		주문하시겠습니까?
		 <a href="#modal-close" title="Close" class="modal-close">Close</a>
		 <p>
    <form action="index.php" method="post">
      메뉴 : <input type="text" name="menu" value="규동"><br>
      개수 : <input type="number" name="num"><br>
      토핑을 추가하시겠습니까? <br>
      토핑1 : <input type="checkbox" name="topping1"><br>
      토핑2 : <input type="checkbox" name="topping2"><br>
      토핑3 : <input type="checkbox" name="topping3"><br>

      <input type = "submit" value="장바구니 넣기">
    </form>
	 </p>
</div>
</div>

<div id="open-moda?id=sakedong" class="modal-window">

	<div id="modal-basket">
		주문하시겠습니까?
		 <a href="#modal-close" title="Close" class="modal-close">Close</a>
		 <p>
       <form action="index.php" method="post">
         메뉴 : <input type="text" name="menu" value="사케동"><br>
         개수 : <input type="number" name="num"><br>
         토핑1 : <input type="checkbox" name="topping1"><br>
         토핑2 : <input type="checkbox" name="topping2"><br>
         토핑3 : <input type="checkbox" name="topping3"><br>

         <input type = "submit" value="장바구니 넣기">
       </form>
	 </p>
</div>
</div>

</div>
</body>

</html>
