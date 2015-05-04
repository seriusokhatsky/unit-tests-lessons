<?php 

class SerializedPersistenceTest extends PHPUnit_Framework_TestCase {

	private static $persisterPath = '/tmp/persister.txt';

	function testItCanPersisteArrayTofile() {

		$books = [1,2,3,123123];
		$persister = new SerializedPersister();
		$persister->save($books, self::$persisterPath);

		$this->assertEquals($books, unserialize( file_get_contents(self::$persisterPath) ));

	}

	function testItCanLoadAnArrayFromFile() {

		$books = [1,2,3,123123];
		$persister = new SerializedPersister();
		$persister->save($books, self::$persisterPath);

		$this->assertEquals($books, $persister->loadFromFile(self::$persisterPath));

	}

	function testItWillNotBreakWhenWeTryToLoadFromInexistenceFile() {
		$persister = new SerializedPersister();
		$this->assertEquals(array(), $persister->loadFromFile('inexistenceFile.txt'));
	}

}