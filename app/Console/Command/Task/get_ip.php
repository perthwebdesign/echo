<?php
	class GetIpTask extends Shell {
		
	    function execute( $URL ) {

			$URL = preg_replace("/^http:\\/\\//", "", $URL);

			return gethostbyname( $URL );

	    }
		
	}
?>
