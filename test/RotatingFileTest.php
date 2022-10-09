<?php
namespace Test\PHPLOGGER;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class RotatingFileTest extends TestCase{
    public function testRotating(){
        $logger=new Logger(RotatingFileTest::class);
        $logger->pushHandler(new RotatingFileHandler(__DIR__."/../app.log", 10, Logger::INFO));
        
        $logger->info("Belajar PHP");
        $logger->info("Belajar PHP OOP");
        $logger->info("Belajar PHP Web");
        $logger->info("Belajar PHP Database");

        self::assertNotNull($logger);
    }
}
?>