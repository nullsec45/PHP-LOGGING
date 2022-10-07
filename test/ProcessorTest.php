<?php
namespace Test\PHPLOGGER;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ProcessorTest extends TestCase{
    public function testProcessorRecord(){
        $logger=new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(function($record){
            $record["extra"]["name"]=[
                "firstName" => "Rama",
                "middleName" => "Fajar",
                "lastName" => "Fadhillah"
            ];
            return $record;
        });

        $logger->info("Hello World",["username" => "fajar"]);
        $logger->info("Hello World");
        $logger->info("Hello World Lagi");

        self::assertNotNull($logger);
    }
}
?>