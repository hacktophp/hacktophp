<?php

namespace HH\Asio;

/**
 * @param string|resource $url_or_handle
 * @return \Sabre\Event\Promise<string>
 */
function curl_exec($url_or_handle): \Sabre\Event\Promise {
	if (is_string($url_or_handle)) {
		$ch = curl_init();
		// set URL. The httpbin.org test url will wait 5 seconds to respond.
		curl_setopt($ch, CURLOPT_URL, $url_or_handle);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//create the multiple cURL handle
		$url_or_handle = $ch;
	}

	return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, string> */
        function () use ($url_or_handle) : \Generator {
        	if (false) {
        		yield 1;
        	}

        	$time = microtime(true);
        	$result = \curl_exec($url_or_handle);

        	if (!is_string($result)) {
        		throw new \LogicException('$result should be a string');
        	}

        	return $result;
      	}
    );
}

/**
 * @param  array<Promise<T>>  $promises
 * @return Promise<array<T>>
 */
function v(array $promises) : \Sabre\Event\Promise {
	return \Sabre\Event\Promise\all($promises);
}