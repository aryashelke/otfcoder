<?php

if (!function_exists('pdf')) {
	function pdf(){
		return new \Smalot\PdfParser\Parser();
	}
}

if (!function_exists('is_null_or_empty')) {
	function is_null_or_empty($string){
		return (!isset($string) || trim($string) == '');
	}
}