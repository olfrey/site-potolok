<?php
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}

if (isset($_POST['square'])) {$square = $_POST['square'];}
if (isset($_POST['materials'])) {$materials = $_POST['materials'];}
if (isset($_POST['level'])) {$level = $_POST['level'];}
if (isset($_POST['when'])) {$when = $_POST['when'];}
if (isset($_POST['question'])) {$question = $_POST['question'];}
$message;

if ($name) {
	$message .= "Имя: $name";
}

if ($phone) {
	$message .= "\nТелефон: $phone";
}

if ($square) {
	$message .= "\nПлощадь потолка: $square";
}

if ($materials) {
	if ($materials == "matovie") {
		$message .= "\nМатериалы: Матовые";
	} else if ($materials == "glancivie"){
		$message .= "\nМатериалы: Глянцевые";
	} else if ($materials == "tkanevie"){
		$message .= "\nМатериалы: Тканевые";
	} else if ($materials == "satinovie"){
		$message .= "\nМатериалы: Сатиновые";
	} else if ($materials == "other"){
		$message .= "\nМатериалы: Другие";
	} else {
		$message .= "\nМатериалы: Еще не знаю";
	}
}

if ($level) {
	if ($level == 1) {
		$message .= "\nУровней: Один";
	} else if ($level == 2){
		$message .= "\nУровней: Два или более";
	} else{
		$message .= "\nУровней: Еще не знаю";
	}
}

if ($when) {
	if ($when == "now") {
		$message .= "\nКогда: Уже сейчас";
	} else if ($when == "week"){
		$message .= "\nКогда: Через неделю-две";
	} else{
		$message .= "\nКогда: Присматриваю  “на будущее”";
	}
}

if ($question) {
	$message .= "\nВопрос: $question";
}



$headers = "Content-type: text/plain; charset = UTF-8";
$subject = "Новый заказ с сайта";

$to = "olfrey@ya.ru";
$send = mail($to, $subject, $message, $headers);

$to = "e5ash.bro@gmail.com";
$send = mail($to, $subject, $message, $headers);
?>