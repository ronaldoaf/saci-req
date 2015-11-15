# saci/req
HTTP requests and XPATH queries in a simpler way
<br />
<br />

##Install

Including to your current composer.json

Add this line into require in your composer.json:

"saci/req": "*"

and use autoload.php to include the classes

require 'vendor/autoload.php'
<br />
<br />
<br />
<br />
##Example usage
<br />

$req=New \Saci\Req('http://www.google.com');
<br />
echo $req->body;
<br />
$req->query("//a[@class='gbgt']");
