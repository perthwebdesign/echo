<?php 

	class UptimeShell extends Shell {
		
		var $tasks = array(
			'GetResponse',
			'GetIp',
			'GetHtml',
			'SearchHtml'
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
				
				$ResponsCode = $this->GetResponse->execute( $Domain['Domain']['name'] );
				
				$this->setResponseCode(
					$Domain['Domain']['id'], 
					$ResponsCode
				);
				
				$this->setIpAddress(
					$Domain['Domain']['id'], 
					$this->GetIp->execute( $Domain['Domain']['name'] ) 
				);
				
				
				if( $ResponsCode == "200" ) {
					$HTML = $this->GetHtml->execute( $Domain['Domain']['name'] );
					
					$GeneratorTag = $this->SearchHtml->execute( "/html/head/meta[@name='generator']", $HTML );
					
		 			if( !is_null( $GeneratorTag->item(0) ) ) {
		 
		 				$this->out($GeneratorTag->item(0)->getAttribute("content"));
					
					}
				}
				
				
			}
			
		}
		
		//.. sets a domain record based on the resonse code provided.
		private function setIpAddress($id, $IpAddress) {
				
			$Now = new DateTime;
			
			$this->data = $this->Domain->findById($id);
			$this->data['Domain']['ip_address'] = $IpAddress;
			$this->data['Domain']['updated'] = @$Now->date;
			
			$this->Domain->save($this->data);
			
		}
		
		//.. sets a domain record based on the resonse code provided.
		private function setResponseCode($id, $Code) {
			
			$Now = new DateTime;
			
			$this->data = $this->Domain->findById($id);
			$this->data['Domain']['current_response'] = $Code;
			$this->data['Domain']['updated'] = @$Now->date;
			
			$this->Domain->save($this->data);
			
		}
		
	}
	

?>
		