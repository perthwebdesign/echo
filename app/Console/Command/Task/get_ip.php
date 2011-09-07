<?php
	class GetIpTask extends Shell {
		
	    function execute( $URL ) {

			$URL = preg_replace("/^http:\\/\\//", "", $URL);
			$DNSArray = dns_get_record( $URL, DNS_A );
			
			return $DNSArray[0]['ip'];

	    }
		
	}
?>
