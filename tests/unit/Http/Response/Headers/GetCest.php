<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Http\Response\Headers;

use Phalcon\Http\Response\Headers;
use UnitTester;

class GetCest
{
    /**
     * Tests Phalcon\Http\Response\Headers :: get()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-05-08
     */
    public function httpResponseHeadersGet(UnitTester $I)
    {
        $I->wantToTest('Http\Response\Headers - get()');

        $headers = new Headers();
        $headers->set('Content-Type', 'text/html');

        $expected = 'text/html';
        $actual   = $headers->get('Content-Type');

        $I->assertEquals($expected, $actual);

        $headers->set('Content-Type', 'text/plain');

        $expected = 'text/plain';
        $actual   = $headers->get('Content-Type');

        $I->assertEquals($expected, $actual);
    }
}
