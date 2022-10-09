<?php
namespace Test\PHPLOGGER;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

class FormatterTest extends TestCase{
    public function testFormatter(){
        $logger=new Logger(Formatter::class);
        $handler=new StreamHandler("php://stderr");
        $handler->setFormatter(new JsonFormatter());
        $logger->pushHandler($handler);
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());

        $logger->info("Belajar PHP Logging",["username" => "ramarff"]);
        $logger->info("Belajar PHP Logging Lagi", ["username" => "nullsec"]);

        self::assertNotNull($logger);
    }

}