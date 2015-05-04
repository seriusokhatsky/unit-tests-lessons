<?php 

class SerializedPersister implements PersistenceGateway {

	function save(array $books, $filePath = '') {
		file_put_contents($filePath , serialize($books));
	}
	function loadFromFile($filePath) {
		if(!file_exists($filePath))
			return array();
		return unserialize( file_get_contents($filePath) );
	}
}

 ?>