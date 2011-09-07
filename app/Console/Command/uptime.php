<?php 

	class UptimeShell extends Shell {
		
		var $tasks = array(
			'GetResponse',
			'GetIp'
		);
		
		var $uses = array(
			'Site',
			'Domain'
		);
		
		function main() {
			
		}
		
		function check() {
			
			// foreach( $this->Domain->find('all', array( 'limit' => 10 ) ) as $Domain ) {
			foreach( $this->Domain->find('all') as $Domain ) {
				
				$this->out( $Domain['Domain']['name'] );
				$this->setResponseCode(
					$Domain['Domain']['id'], 
					$this->GetResponse->execute( $Domain['Domain']['name'] ) 
				);
				
				$this->setIpAddress(
					$Domain['Domain']['id'], 
					$this->GetIp->execute( $Domain['Domain']['name'] ) 
				);
				
			}
			
		}
		
		//.. sets a domain record based on the resonse code provided.
		private function setIpAddress($id, $IpAddress) {
				
			$Now = new DateTime;
			
			$this->data = $this->Domain->findById($id);
			$this->data['Domain']['ip_address'] = $IpAddress;
			$this->data['Domain']['updated'] = $Now->date;
			
			$this->Domain->save($this->data);
			
		}
		
		//.. sets a domain record based on the resonse code provided.
		private function setResponseCode($id, $Code) {
			
			$Now = new DateTime;
			
			$this->data = $this->Domain->findById($id);
			$this->data['Domain']['current_response'] = $Code;
			$this->data['Domain']['updated'] = $Now->date;
			
			$this->Domain->save($this->data);
			
		}
		
	}
	

?>
		