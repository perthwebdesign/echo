<?php 

	class UptimeShell extends Shell {
		
		var $tasks = array(
			'GetResponse'
		);
		
		var $uses = array(
			'Site',
			'Domain'
		);
		
		function main() {
			
		}
		
		function check() {
			
			foreach( $this->Domain->find('all') as $Domain ) {
				
				$this->out( $this->GetResponse->execute( $Domain['Domain']['name'] ) );
				
			}
			
			
		}
		
		
	}
	

?>
		