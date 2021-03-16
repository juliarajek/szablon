<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>
<h3>Kalkulator kredytowy</h2>

<form class="pure-form pure-form-stacked" action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">

<fieldset>
    <label for="id_x"> Podaj kwote kredytu: </label>
    <input id="id_x" type="text" name="x" value="<?php out($x) ?>" /> <br/><br>

    <label for="id_y"> Podaj na ile lat: </label>
    <input id="id_y" type="text" name="y" value="<?php out($y) ?>" /> <br><br>

    <label for="id_z"> Podaj oprocentowanie: </label>
    <input id="id_z" type="text" name="z" value="<?php out($z) ?>" /> <br>
</fieldset><br>	
<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>	
<div class="messages">
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
<br>
<?php
//wyświeltenie listy informacji, jeśli istnieją
if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
<?php if (isset($wynik)){ ?>
	<h4>Odsetki:</h4>
	<p class="res">
<?php print($wynik); ?></
</p>
<?php $razem = $wynik + $x;?>
            <h4>Łącznie do spłaty:</h4>
            <p class="res">
<?php print($razem); ?>
	</p>
<?php } ?>
        

</div>
<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>