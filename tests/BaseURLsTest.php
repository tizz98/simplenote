<?php

class BaseURLsTest extends TestCase {

	// Simple tests of URLs when a user isn't logged in

	public function testIndexURL()
	{
		$response = $this->action('GET', 'WelcomeController@index');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testRegisterURL()
	{
		$response = $this->action('GET', 'RegistrationController@create');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testLoginURL($value='')
	{
		$response = $this->action('GET', 'SessionsController@create');

		$this->assertEquals(200, $response->getStatusCode());
	}
}
