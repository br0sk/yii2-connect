# yii2-connect
A Yii2 extension for http://getconnect.io/

This is an extension for Yii2 that makes it easy to use http://getconnect.io/.

Right now their PHP SDK only supports pushing events.

You can configure it in your application configuration like so:

	'connect' => [
		'class' => 'br0sk\connect\Connect',
		'projectId' => 'yourprojectid',
		'pushApiKey' 	=> 'yourpushapikey',
	]
	
**note:** You can find the project id and push API key in the control panel for you project [here](https://app.getconnect.io/#/projects).

Adding it to your `components` array.

Pushing an event is as easy as:

		$event = ['purchase' => ['item' => 'My item 1']];
		Yii::$app->connect->push('purchases', $event);

You can also push multiple events at once like this:

	$batch = [
  		'purchases' => [
			[
				'customer' => [
				'firstName' => 'Tom',
				'lastName' => 'Smith'
				],
				'product' => '12 red roses',
				'purchasePrice' => 34.95
			],
			[
				'customer' => [
				'firstName' => 'Fred',
				'lastName' => 'Jones'
				],
				'product' => '12 pink roses',
				'purchasePrice' => 38.95
			]
  		]
		];

	Yii::$app->connect->push($batch);


**Exception handling**

When pushing events, exceptions could be thrown, so you should either ignore or handle those exceptions gracefully.

Currently, the following exception could be thrown when pushing events:
* InvalidEventException - the event being pushed is invalid (e.g. invalid event properties)