<?php
	header("Content-type: text/xml");	
	include 'config/config.php';
	$connection=mysqli_connect($db['hostname'],$db['username'],$db['password'],$db['database']);
				$query = "SELECT * FROM ProjectProducts";
				$result = mysqli_query($connection,$query);
				$_xml = '<?xml version="1.0"?>';
				$_xml .="<sandwiches>";
				while ($row = @ mysqli_fetch_array($result)) 
					{ 
					$_xml .="<sandwich>";
					$_xml .="<sandwich_name>".$row["Name"]."</sandwich_name>";
					$_xml .="<sandwich_price>". $row["Price"] ."</sandwich_price>";
					$_xml .="<sandwich_description>".$row["Description"] . "</sandwich_description>";
					$_xml .="</sandwich>";
					} 
				$_xml .="</sandwiches>";
				$xmlobj = new SimpleXMLElement($_xml);
				$xsl = new DOMDocument;
				$xsl -> load('sandwiches.xsl');
				$proc = new XSLTProcessor;
				$proc -> importStylesheet($xsl);
				echo $proc -> transformToXML($xml);
?>