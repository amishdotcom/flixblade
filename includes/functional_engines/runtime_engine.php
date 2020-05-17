<?php
//To Grab Runtime Identifier into a general variable

ob_start(); //Start output buffer
foreach ($dp as $dps) {echo "".$dps['runtimeMinutes']."";}

$runtime_inp = ob_get_contents(); //Grab output
ob_end_clean(); //Discard output buffer

if ($runtime_inp == 1){$runtime = "$runtime_inp Minute";}

if ($runtime_inp > 1 && $runtime_inp < 60){$runtime = "$runtime_inp Minutes";}

if ($runtime_inp == 60){$runtime = "$runtime_inp Minutes&nbsp;&nbsp;&nbsp;&nbsp;(1 Hour)";}

if ($runtime_inp > 60 && $runtime_inp < 1440){
$d_run = floor ($runtime_inp / 1440);
$h_run = floor (($runtime_inp - $d_run * 1440) / 60);
$m_run = $runtime_inp - ($d_run * 1440) - ($h_run * 60);

$runtime = "$runtime_inp Minutes&nbsp;&nbsp;&nbsp;&nbsp;($h_run Hours : $m_run Minutes)";
}

if ($runtime_inp == 1440){
$runtime = "$runtime_inp Minutes&nbsp;&nbsp;&nbsp;&nbsp;(1 Day) / (24 Hours)";
}

if ($runtime_inp > 1440){
$d_run = floor ($runtime_inp / 1440);
$h_run = floor (($runtime_inp - $d_run * 1440) / 60);
$m_run = $runtime_inp - ($d_run * 1440) - ($h_run * 60);

$runtime = "$runtime_inp Minutes&nbsp;&nbsp;&nbsp;&nbsp;($d_run Days : $h_run Hours : $m_run Minutes)";
}

// Max Scope of Counter => Days
?>