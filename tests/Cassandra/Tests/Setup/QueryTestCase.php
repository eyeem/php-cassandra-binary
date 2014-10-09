<?php
/**
 * Created by IntelliJ IDEA.
 * User: lfronius
 * Date: 09/10/14
 * Time: 16:59
 * To change this template use File | Settings | File Templates.
 */

namespace evseevnn\Cassandra\Tests\Setup;
use evseevnn\Cassandra;

class QueryTestCase extends \PHPUnit_Framework_TestCase {

    private $connection;

    public function setUp()
    {
        $this->connection = new Cassandra\Database(['127.0.0.1:9042']);
        $this->connection->connect();
        $this->connection->query("DROP KEYSPACE IF EXISTS testkeyspace;");
        $this->connection->query("CREATE KEYSPACE testkeyspace");
    }

    public function tearDown()
    {
        $this->query("DROP KEYSPACE testkeyspace");
    }

}