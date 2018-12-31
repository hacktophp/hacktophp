<?php
namespace Hack\UserDocumentation\Async\Intro\Examples\Curl;

require('vendor/autoload.php');

/**
 * @return \Sabre\Event\Promise<string>
 */
function curl_A()
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, string> */
        function () : \Generator {
            $x = (yield \HH\Asio\curl_exec("http://httpbin.org/delay/3"));
            return $x;
        }
    );
}
/**
 * @return \Sabre\Event\Promise<string>
 */
function curl_B()
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, string> */
        function () : \Generator {
            $y = (yield \HH\Asio\curl_exec("http://httpbin.org/delay/3"));
            return $y;
        }
    );
}
/**
 * @return \Sabre\Event\Promise<void>
 */
function async_curl()
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, void> */
        function () : \Generator {
            $start = \microtime(true);
            list($a, $b) = (yield \HH\Asio\v(array(curl_A(), curl_B())));
            var_dump($a, $b);
            $end = \microtime(true);
            echo "Total time taken: " . \strval($end - $start) . " seconds" . \PHP_EOL;
        }
    );
}

async_curl()->wait();
