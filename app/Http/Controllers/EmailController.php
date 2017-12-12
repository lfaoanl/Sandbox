<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
	protected $startURL;
	
	public function index() {
//		include base_path('vendor/phpclasses/email-scraper/email.scraper.php');
//		$scraper = new \scraper();
		$this->startURL = 'https://www.beren.nl/contact/';
		return [$this->getContents($this->startURL)];
    }
	
	function getContents($url)
	{
		$ch = curl_init(); // initialize curl handle
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
		curl_setopt($ch, CURLOPT_AUTOREFERER, false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,7);
		curl_setopt($ch, CURLOPT_REFERER, $this->startURL);
		curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
		curl_setopt($ch, CURLOPT_TIMEOUT, 50); // times out after 50s
		curl_setopt($ch, CURLOPT_POST, 0); // set POST method
		$buffer = curl_exec($ch); // run the whole process
		if (!$buffer) {
			throw new \Exception(curl_error($ch), curl_errno($ch));
		}
		curl_close($ch);
		
		return $buffer;
	}
	
	// Actually do the URLS
	function startScraping()
	{
		// Get page content
		$pageContent = $this->getContents($this->startURL);
		
		// Get list of all emails on page
		preg_match_all('/([\w+\.]*\w+@[\w+\.]*\w+[\w+\-\w+]*\.\w+)/is',$pageContent,$results);
		// Add the email to the email list array
		$insertCount=0;
		foreach($results[1] as $curEmail)
		{
			$insert = new Email([
				'email' => $curEmail
			]);
			$insert->save();
		}
		
		return $results;
		// Mark the page done
		
		// Get list of new page URLS is emails were found on previous page
//		preg_match_all('/href="([^"]+)"/Umis',$pageContent,$results);
//		$currentList = $this->cleanListURLs($results[1]);
//
//		$insertURLCount=0;
//		// Add the list to the array
//		foreach($currentList as $curURL)
//		{
//			$insert = mysql_query("INSERT INTO `workingurls` (`urlname`) VALUES ('$curURL')");
//			if($insert){$insertURLCount++;}
//		}
//
//		echo 'URLs found: '.number_format($insertURLCount).PHP_EOL;
//
//		$getURL = mysql_fetch_assoc(mysql_query("SELECT `urlname` FROM `workingurls` ORDER BY RAND() LIMIT 1"));
//		$remove = mysql_query("DELETE FROM `workingurls` WHERE `urlname`='$getURL[urlname]' LIMIT 1");
//
//		// Get the new page ready
//		$this->startURL = $getURL['urlname'];
//		$this->setStartPath();
//
//		// If no more pages, return
//		if($this->startURL == NULL){ return;}
//		// Clean vars
//		unset($results,$pageContent);
//		// If more pages, loop again
//		$this->startScraping();
	}
}
