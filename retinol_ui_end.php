	<p>
		<a href=".">Strona główna</a> - 
		<a href="injury-register.php">Rejestr kontuzji</a> - 
		<?php
			if($ADMINCOND) {
				echo '<a href="injury-new.php">Wstaw kontuzję</a> - ';
			}
		?>
		<a href="/">Strona rodziny Lorkowskich</a>
	</p>
	<p>
		Motyw: <a href="theme.php?nt=0">klasyczny</a> - 
		<a href="theme.php?nt=1">prototyp</a>
	</p>
</div>