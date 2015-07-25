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
	
