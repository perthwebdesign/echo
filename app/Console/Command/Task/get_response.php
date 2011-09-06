<?php
	class GetResponseTask extends Shell {
		
	    function execute( $URL ) {
		
			$handle = curl_init( $URL );
			curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
			
			/* Get the HTML or whatever is linked in $url. */
			$response = curl_exec($handle);
			
			/* Check for 404 (file not found). */
			$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
			
			curl_close($handle);
						
			return $httpCode;
	    }
		
	}
?>
