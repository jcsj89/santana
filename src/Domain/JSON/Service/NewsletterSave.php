<?php

namespace App\Domain\JSON\Service;

use App\Domain\JSON\Data\NewsLetterJsonData;

/**
 * 
 */
class NewsletterSave
{
	private $newsletterJsonData;
	private $pathList=null;
	private $dataMail;
	private $mailer;

	function __construct(NewsLetterJsonData $newsletterJsonData)
	{
		$this->pathList = 'json/newsletter.json';
		$this->newsletterJsonData = $newsletterJsonData;			
	}

	public function getList()
	{
		if (file_exists( $this->pathList) ) {
			$readJSON = file_get_contents($this->pathList);
			$array = json_decode($readJSON, TRUE);
			return $this->newsletterJsonData->setArray($array);			
		}else{
			return FALSE;
		}				
	}

	public function saveNewEmail($email)
	{	
		if ( $this->getList() ) {
			if ( $this->newsletterJsonData->setItem($email) ) {				
				$json = json_encode( $this->newsletterJsonData->getItens() );
				$file = fopen($this->pathList,'w');
				fwrite($file, $json);
				fclose($file);
				return TRUE;		
			}
		}else{
			return FALSE;
		}		
	}

	
}//class