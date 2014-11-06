<?php

namespace evseevnn\Cassandra\Tests;

use evseevnn\Cassandra;

class QueryTimestampTest extends Setup\QueryTestCase
{

		public function testTimestampColumn()
		{
				self::$connection->query('CREATE TABLE TimestampTest (foo timestamp PRIMARY KEY, bar timestamp)');
				self::$connection->query(
						'INSERT INTO TimestampTest (foo, bar) VALUES (:foo, :bar)',
						['foo' => 1410993581, 'bar' => 1415290229]
				);
				$result = self::$connection->query('SELECT * FROM TimestampTest WHERE foo = :foo', ['foo' => 1410993581]);
				$this->assertEquals(1410993581, $result[0]['foo']);
				$this->assertEquals(1415290229, $result[0]['bar']);
		}


}