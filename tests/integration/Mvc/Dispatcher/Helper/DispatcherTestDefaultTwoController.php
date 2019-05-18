<?php

namespace Phalcon\Test\Integration\Mvc\Dispatcher\Helper;

use Phalcon\Mvc\Controller;

/**
 * \Phalcon\Test\Integration\Mvc\Dispatcher\Helper\DispatcherTestDefaultTwoController
 * Dispatcher Controller for testing different dispatch scenarios
 *
 * @copyright (c) 2011-2017 Phalcon Team
 * @link          http://www.phalconphp.com
 * @author        Andres Gutierrez <andres@phalconphp.com>
 * @author        Nikolaos Dimopoulos <nikos@phalconphp.com>
 *
 * The contents of this file are subject to the New BSD License that is
 * bundled with this package in the file docs/LICENSE.txt
 *
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world-wide-web, please send an email to license@phalconphp.com
 * so that we can send you a copy immediately.
 */
class DispatcherTestDefaultTwoController extends Controller
{
    public function beforeExecuteRoute()
    {
        $this->trace('beforeExecuteRoute-method');
    }

    /**
     * Add tracing information into the current dispatch tracer
     */
    protected function trace($text)
    {
        $this->getDI()->getShared('dispatcherListener')->trace($text);
    }

    public function initialize()
    {
        $this->trace('initialize-method');
    }

    public function indexAction()
    {
        $this->trace('indexAction');
    }

    public function index2Action()
    {
        $this->trace('index2Action');
    }

    public function forwardLocalAction()
    {
        $this->trace('forwardLocalAction');

        $di = $this->getDI();

        $dispatcher = $di->getShared('dispatcher');

        $dispatcher->forward(
            [
                'action' => 'index2',
            ]
        );
    }

    public function forwardExternalAction()
    {
        $this->trace('forwardExternalAction');

        $di = $this->getDI();

        $dispatcher = $di->getShared('dispatcher');

        $dispatcher->forward(
            [
                'controller' => 'dispatcher-test-default',
                'action'     => 'index',
            ]
        );
    }

    public function exceptionAction()
    {
        $this->trace('exceptionAction');

        throw new Exception('An exception occurred.');
    }

    public function afterExecuteRoute()
    {
        $this->trace('afterExecuteRoute-method');
    }
}
