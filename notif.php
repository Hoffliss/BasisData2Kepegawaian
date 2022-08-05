<?php

	$notif = (isset($_SESSION['notif'])) ? $_SESSION['notif'] : "";

	if($notif !== "") :
	?>

	<fieldset>
		<?=$notif ?>
	</fieldset>

	<?php
	unset($_SESSION['notif']);

	endif;
?>