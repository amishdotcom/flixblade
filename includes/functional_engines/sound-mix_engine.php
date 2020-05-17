<?php

if($dps['sound_mix'] == 'n/A' OR $dps['sound_mix'] == ''){unset($sound_mix);}
else {
	$sound_mix = $dps['sound_mix'];
	$sound_mix = str_replace(" | ","<br>",$sound_mix);}

?>