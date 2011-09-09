<?php
	class GetHtmlTask extends Shell {
		
	    function execute( $URL ) {

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $URL);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			                                                'User-Agent: "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.15) Gecko/2009101601 Firefox/3.0.15 GTB6 (.NET CLR 3.5.30729)"'
			                                            ));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			 
			$cHTML = curl_exec($ch);
			 
			$nTries = 1;
			while (($nTries < 3) && (curl_error($ch))) {
			    echo "Try $nTries - curl error: " . curl_error($ch);
			    echo("\t$cSearchURL\n\n");
			    $cHTML = curl_exec($ch);
			    $nTries++;
			} // ends while (($nTries < 3) && (curl_error($ch)))
			 
			if (curl_error($ch)) {
			    echo "Curl error: " . curl_error($ch);
			    echo("\n$cSearchURL\n");
			 
			    exit();
			} // ends if (curl_error($ch))
			
			return $cHTML;

	    }
		
	}
?>
