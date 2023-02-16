<?php

$routePath = realpath(__DIR__ . '/..');
return [
	'dataTableHeaderColor'=>'bgColor',
	'route_path'=>$routePath.'/routes/ext.routes/',	
	'lang_path'=>$routePath.'/resources/lang/en/',
	'model_path'=>$routePath.'/app/',	
	'view_path'=>$routePath.'/resources/views/',
	'controller_path'=>$routePath.'/app/Http/Controllers/',
];

?>