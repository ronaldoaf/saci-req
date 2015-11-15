<?php
namespace Req;
class Req
{
    private $defaults=[
		'method'=>'GET',
		'fields'=>[],
		'headers'=>[],
		'user_agent'=>'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2")',
		'ssl_verifyhost'=>0,
		'ssl_verifypeer'=>0,
		'proxy'=>NULL,
		'proxy_userpwd'=>'',
		'customs_curlopts'=>[]
	 	];
	 	
    public $headers; 
    public $header_size;	
    public $body;
    public $dom;
    
    public $url;
    public $current_url;
    
    public $xpath; 
    
    private $ch;
    
    function __construct($url="") 
    {
       
        $this->url=$url;
        
        $this->req($url);
        
        $this->current_url=curl_getinfo($this->ch, CURLINFO_EFFECTIVE_URL);
    }
    function req($url, $parms=[])
    {
	//Preenche os campos que não foram passados
	foreach($this->defaults as $field => $default) if( !array_key_exists ($field,$parms) ) $parms[$field]=$default;
	$this->ch = curl_init();
	curl_setopt($this->ch, CURLOPT_URL,$this->url);
	
	curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $parms['method']);
	curl_setopt($this->ch, CURLOPT_POSTFIELDS,$parms['fields']);
	
	curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);	
	
	curl_setopt($this->ch, CURLOPT_VERBOSE, true);
	curl_setopt($this->ch, CURLOPT_HEADER, true);
	
	      
        curl_setopt($this->ch, CURLOPT_USERAGENT,$parms['user_agent'] );
        
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $parms['headers']);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, $parms['ssl_verifyhost']);
	curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, $parms['ssl_verifypeer']);	
	curl_setopt($this->ch, CURLOPT_COOKIESESSION, true);
	curl_setopt($this->ch, CURLOPT_COOKIEJAR, "req_cookie.txt");
    	curl_setopt($this->ch, CURLOPT_COOKIEFILE,"req_cookie.txt");
    	
    	
    	if(!is_null($parms['proxy']) ) {
    		curl_setopt($this->ch, CURLOPT_PROXY, $parms['proxy']);
    		curl_setopt($this->ch, CURLOPT_PROXYUSERPWD, $parms['proxy_userpwd']);
    	}
 	
 	//Adiciona curlopts adicionais
 	foreach($parms['customs_curlopts'] as $curlopt => $value) curl_setopt($this->ch, constant($curlopt),$value);
 
 
 
 
	$response = curl_exec($this->ch);
	
	$this->header_size = curl_getinfo($this->ch, CURLINFO_HEADER_SIZE);
	$this->headers = substr($response, 0, $this->header_size);
	$this->body = substr($response, $this->header_size);
	$this->dom = new \DOMDocument();
	@$this->dom->loadHTML($this->body);
	
	$this->xpath = new \DOMXPath(  $this->dom );
    }
    
    
    function query($xpath_sting, $context_node=NULL)
    {
    	return( $this->xpath->query($xpath_sting,is_null($context_node) ? $this->dom : $context_node ) );
    
    }
   
    
    
    
    
}
?>
