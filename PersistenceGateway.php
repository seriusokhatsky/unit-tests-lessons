<?php 

interface PersistenceGateway {

	function save(array $books, $filePath = '');

	function loadFromFile($filePath);

}