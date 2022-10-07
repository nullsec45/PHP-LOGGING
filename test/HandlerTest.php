<?php
namespace Test\PHPLOGGER;

use Monolog\Handler\Handler;
use Monolog\Handler\SlackHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Test\TestCase;
use Monolog\Logger;

class HandlerTest extends TestCase{
    public function testHandler(){
        $logger=new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__."/../application.log"));
        // $logger->pushHandler(new SlackHandler());

        self::assertNotNull($logger);
        self::assertEquals(2, sizeof($logger->getHandlers()));
    }
}


?>