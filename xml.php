<?php
$myXMLData =
"<?xml version='1.0' encoding='UTF-8'?>
<notes>
	<note>
		<to>Tove</to>
		<from>Jani</from>
		<heading>Reminder</heading>
		<body>Don't forget me this weekend!</body>
	</note>
	<note>
		<to>Brandon</to>
		<from>John</from>
		<heading>Yo</heading>
		<body>I want pizza!</body>
	</note>
</notes>";

$xml=simplexml_load_string($myXMLData);
echo $xml->note[1]->to;
?>