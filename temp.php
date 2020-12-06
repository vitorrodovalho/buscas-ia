<?php

$dado = array(	'A' => array(	'B' => 12,
								'C' => 14),
				'B' => array(	'C' => 9,	
								'D' => 38),
				'C' => array(	'D' => 24,	
								'E' => 7),
				'D' => array(	'E' => 13,
								'G' => 9),
				'E' => array(	'D' => 13,
								'G' => 29),
				'F' => array(),
				'G' => array());

$heuristica = array(	'A' => 30, 
						'B' => 26, 
						'C' => 21,
						'D' => 7, 
						'E' => 22, 
						'F' => 26,
						'G' => 0);

$_POST = array(	"ponto" => array ( "A", "B", "C", "D", "E", "F", "G" ),
	 	 		"heuristica" => array ( "30", "26", "21", "7", "22", "26", "0" ),
  				"ponto_filho1" => array ( "B", "C", "D", "E", "D", "", ""),
  				"valor_filho1" => array ( "12", "9", "24", "13", "13", "", "" ),
  				"ponto_filho2" => array ( "C", "D", "E", "G", "G", "", "" ),
  				"valor_filho2" => array ( "14", "38", "7", "9", "29", "",  "" ));
?>