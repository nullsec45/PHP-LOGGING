<?php
namespace Test\PHPLOGGER;

use Monolog\Logger;
use Monolog\Test\TestCase;
use Monolog\Handler\StreamHandler;

class LoggingTest extends TestCase{
    public function testLogging(){
        $logger=new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__."/../application.log"));
 
        $logger->info("Belajar Pemrograman PHP Logging");
        $logger->info("Ini Informasi Aplikasi Logging");
    
        self::assertNotNull($logger);
    }
}

?>