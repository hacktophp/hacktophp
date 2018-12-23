<?php
namespace Facebook\HHAST\__Private;

use HH\Lib\Tuple as Tuple;
final class ParserConcurrencyLease implements \IDisposable
{
    /**
     * @var int
     */
    const LIMIT = 16;
    /**
     * @var int
     */
    private static $active = 0;
    private function __construct()
    {
        self::$active++;
    }
    /**
     * @return \Sabre\Event\Promise<ParserConcurrencyLease>
     */
    public static function getAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, ParserConcurrencyLease> */
            function () : \Generator {
                while (self::$active >= self::LIMIT) {
                    (yield Tuple\from_async(\HH\Asio\usleep(100000), \HH\Asio\later()));
                }
                return new self();
            }
        );
    }
    /**
     * @return void
     */
    public function __dispose()
    {
        self::$active--;
    }
}

