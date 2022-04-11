<?php
require_once dirname(__FILE__).'/../config.php'; ?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
            <style scoped="">
                .button-logout{
                    color: white;
                    border-radius: 4px;
                    background: rgb(150, 3, 30);
                }
            </style>
            <a href="<?php print(_APP_ROOT); ?>/app/secured2.php" class="pure-button">Przejdź do drugiej strony</a>
            <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="button-logout pure-button">Wyloguj</a>
        </div>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_x">Kwota: </label>
	<input id="id_x" type="text" name="x" value="" /><br />

    <label for="id_z">Na ile lat?: </label>
    <input id="id_z" type="text" name="z" value="" /><br />

    <label for="id_y">Oprocentowanie: </label>
    <input id="id_y" type="text" name="y" value="" /><br />
	<br/>
	<input type="submit" value="Oblicz" />
</form>

<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesieczna rata wynosi: '.$result; ?>
</div>
<?php } ?>

</body>
</html>