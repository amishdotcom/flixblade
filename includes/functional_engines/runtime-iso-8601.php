<?php
//To Grab Runtime for json-ld engine for title

ob_start(); //Start output buffer
foreach ($dp as $dps) {echo "".$dps['runtimeMinutes']."";}

$runtime_inp = ob_get_contents(); //Grab output
ob_end_clean(); //Discard output buffer

if ($runtime_inp == 1){$runtime_jld = "PT1M";}

if ($runtime_inp > 1 && $runtime_inp < 60){$runtime_jld = "$runtime_inp ----";
	$runtime_jld = str_replace(" ----","M",$runtime_jld);}

if ($runtime_inp == 60){$runtime_jld = "PT1H";}

if ($runtime_inp > 60 && $runtime_inp < 1440){
$d_run = floor ($runtime_inp / 1440);
$h_run = floor (($runtime_inp - $d_run * 1440) / 60);
$m_run = $runtime_inp - ($d_run * 1440) - ($h_run * 60);

$runtime_jld = "PT$h_run ----";
$runtime_jld = str_replace(" ----","H",$runtime_jld);
$runtime_jld = "$runtime_jld$m_run ----";
$runtime_jld = str_replace(" ----","M",$runtime_jld);
}

if ($runtime_inp == 1440){
$runtime_jld = "1D";
}

if ($runtime_inp > 1440){
$d_run = floor ($runtime_inp / 1440);
$h_run = floor (($runtime_inp - $d_run * 1440) / 60);
$m_run = $runtime_inp - ($d_run * 1440) - ($h_run * 60);

$runtime_jld = "$d_run ----";
$runtime_jld = str_replace(" ----","DT",$runtime_jld);
$runtime_jld = "$runtime_jld$h_run ----";
$runtime_jld = str_replace(" ----","H",$runtime_jld);
$runtime_jld = "$runtime_jld$m_run ----";
$runtime_jld = str_replace(" ----","M",$runtime_jld);
}

// Max Scope of Counter => Days
?>