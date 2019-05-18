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

namespace Phalcon\Test\Unit\Http\Message\Request;

use InvalidArgumentException;
use Phalcon\Http\Message\Request;
use UnitTester;

class GetMethodCest
{
    /**
     * Tests Phalcon\Http\Message\Request :: getMethod()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-02-10
     */
    public function httpMessageRequestGetMethod(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Request - getMethod()');

        $request = new Request('POST');

        $I->assertEquals(
            'POST',
            $request->getMethod()
        );
    }

    /**
     * Tests Phalcon\Http\Message\Request :: getMethod() - empty
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-02-10
     */
    public function httpMessageRequestGetMethodEmpty(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Request - getMethod() - empty');

        $request = new Request();

        $I->assertEquals(
            'GET',
            $request->getMethod()
        );
    }

    /**
     * Tests Phalcon\Http\Message\Request :: getMethod() - exception
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-02-10
     */
    public function httpMessageRequestGetMethodWxception(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Request - getMethod() - exception');

        $I->expectThrowable(
            new InvalidArgumentException('Invalid or unsupported method UNKNOWN'),
            function () {
                $request = new Request('UNKNOWN');
            }
        );
    }
}
