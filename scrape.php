<?php 

function get_marketcap(){
	$page = file_get_contents("https://eresearch.fidelity.com/eresearch/goto/evaluate/snapshot.jhtml?symbols=AMZN");

	//echo $page;

	$split = explode("Market Capitalization</th>", $page)[1];

	$split2 = explode("B", $split)[0];


	//874.71B</span></td>

	echo $split2;
}

 ?>