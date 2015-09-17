<?php
namespace Examples\Transmisson;
require_once (dirname(__FILE__).'/../bootstrap.php');
use SparkPost\SparkPost;
use SparkPost\Transmission;
use GuzzleHttp\Client;
use Ivory\HttpAdapter\Guzzle6HttpAdapter;

$key = 'YOUR API KEY';
$httpAdapter = new Guzzle6HttpAdapter(new Client());
SparkPost::configure($httpAdapter, ['key'=>$key]);

try {
	$results = Transmission::send([
		"from"=>"From Envelope <from@sparkpostbox.com>",
		"recipients"=>[
			[
			"address"=>[
					"email"=>"john.doe@example.com"
				]
      ]
		],
		"template"=>"my-template"
	]);
	echo 'Congrats you can use your SDK!';
} catch (\Exception $exception) {
	echo $exception->getMessage();
}
?>
