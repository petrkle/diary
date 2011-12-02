#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Prague');

$year = $argv[1];
$lang = $argv[2];

setlocale(LC_ALL,$lang.'.UTF8');
require('events.'.$lang.'.php');


for($month=1;$month<=12;$month++){
	$firstday=strtotime("$month/1/$year 12:00:00");
	$file=fopen('month-'.$month.'.tex','w');

	for($day=1;$day<=date('t',$firstday);$day++){
			$thisday=strtotime("$month/$day/$year 12:00:00");

			$month_h=strftime('%B',$thisday);

			fwrite($file,'\section*{'.$day.'. '.$month_h.' '.$year.'}'."\n");
			
			fwrite($file,'\\ifthenelse{\\isodd{\\thepage}}{\\hfill}{}');
			fwrite($file,'\\large{'.strftime('%A',$thisday).'}'."\n\n\n");

			fwrite($file,'\\ifthenelse{\\isodd{\\thepage}}{\\hfill}{}');
			fwrite($file,'\\noindent\\large{'.$events[$month.'.'.$day].'}'."\n");

			for($baz=0;$baz<21;$baz++){
				fwrite($file,"\n\\noindent\\hrulefill\n");
			}

			fwrite($file,"\\clearpage\n");
	}

	fclose($file);

}
