<?php
namespace Test\PHPLOGGER;

use Monolog\Test\TestCase;
use Monolog\Logger;

class LoggerTest extends TestCase{
    public function testLogger(){
        $logger=new Logger("Test Logger");

        self::assertNotNull($logger);
    }

    public function testLoggerWithName(){
        $logger=new Logger(LoggerTest::class);

        self::assertNotNull($logger);
    }
}