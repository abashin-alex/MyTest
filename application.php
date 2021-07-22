<?
//проверка формы отправленной аяксом

$name = $_POST['name'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];

function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);    
    return $value;
}

$name = clean($name);
$phone = clean($phone);
$mail = clean($mail);

if (!empty ($name) && !empty ($phone) && !empty ($mail)) {
	$mail_validate = filter_var($mail, FILTER_VALIDATE_EMAIL);
	if ($mail_validate) {
	//здесь код отправки почтового сообщения по SMTP
?>
	<div>Спасибо, <? echo $name; ?>! Ваше сообщение отправлено. В ближайшее время с Вами свяжутся, и Вы сможете уточнить подробности.</div>
<?		
	}
	else {
?>
	<div>Пожалуйста, проверьте адрес электронной почты!</div>
<?
	}
}
else {
?>	
	<div>Заполните, пожалуйста, все поля формы!</div>
<?
}
?>
