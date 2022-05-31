<?php

/* This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */
namespace Phalcon\Logger;

use Exception;
use Phalcon\Logger\Exception as LoggerException;

/**
 * Phalcon Logger.
 *
 * A logger, with various adapters and formatters. A formatter
 * interface is available as well as an adapter one. Adapters can be created
 * easily using the built-in AdapterFactory. A LoggerFactory is also available
 * that allows developers to create new instances of the Logger or load them
 * from config files (see Phalcon\Config\Config object).
 */
class Logger extends \Phalcon\Logger\AbstractLogger implements \Phalcon\Logger\LoggerInterface
{


    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function alert(string $message, array $context = []): void
    {
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function critical(string $message, array $context = []): void
    {
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function debug(string $message, array $context = []): void
    {
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function emergency(string $message, array $context = []): void
    {
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function error(string $message, array $context = []): void
    {
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function info(string $message, array $context = []): void
    {
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function log($level, string $message, array $context = []): void
    {
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function notice(string $message, array $context = []): void
    {
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     * @throws Exception
     * @throws LoggerException
     */
    public function warning(string $message, array $context = []): void
    {
    }
}
