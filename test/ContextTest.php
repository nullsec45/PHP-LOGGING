<?php
namespace Test\PHPLOGGER;


use Monolog\Handler\StreamHandler;
use Monolog\Test\TestCase;
use Monolog\Logger;

class ContextTest extends TestCase{
    public function testContext(){
        $logger=new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("This is log message");
        $logger->info("Try login user", ["username" => "ramarff"]);
        $logger->info("Success login user", ["username" => "ramarff"]);
        self::assertNotNull($logger);
        // self::assertEquals(2, sizeof($logger->getHandlers()));
    }
}


?>