#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Prague');
setlocale('LC_ALL','cs_CZ.UTF8');

$rok = 2012;

$events=array(
'3.18' => 'Some event',
'6.29' => 'Petr - svátek',
);

for($mesic=1;$mesic<=12;$mesic++){
	$prvniden="$mesic/1/$rok 12:00:00";
	$prvniden=strtotime($prvniden);
	$pocetdni=date('t',$prvniden);

	$file=fopen('mesic-'.$mesic.'.tex','w');

	for($den=1;$den<=$pocetdni;$den++){
			$aktualniden="$mesic/$den/$rok 12:00:00";
			$aktualniden=strtotime($aktualniden);
			$mesic_h=strftime('%B',$aktualniden);
			fwrite($file,'\section*{'.$den.'. '.$mesic_h.' '.$rok.'}'."\n");
			
			fwrite($file,'\\ifthenelse{\\isodd{\\thepage}}{}{\hfill}\\large{'.strftime('%A',$aktualniden).'}'."\n");
			if(isset($events[$mesic.'.'.$den])){
				fwrite($file,'\\\\\\\\\\\\'.$events[$mesic.'.'.$den]."\n");
				$limit=19;
			}else{
				$limit=20;
			}

			for($baz=0;$baz<$limit;$baz++){
				fwrite($file,"\n\\noindent\\hrulefill\n");
			}

			fwrite($file,"\\clearpage\n");
	}

	fclose($file);

}
