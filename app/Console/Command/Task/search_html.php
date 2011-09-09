<?php
	class SearchHtmlTask extends Shell {
		
	    function execute( $Needle, $Haystack ) {
			
			// Create the DOM Document
			$dom = new DOMDocument();
			 
			// Load the HTML
			@$dom->loadHTML($Haystack);
			 
			// Get the paths
			$xPath = new DOMXPath($dom);
			
			return $xPath->query( $Needle );

	    }
		
	}
?>
