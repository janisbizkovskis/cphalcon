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

use Phalcon\Http\Message\Request;
use UnitTester;

class WithAddedHeaderCest
{
    /**
     * Tests Phalcon\Http\Message\Request :: withAddedHeader()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-02-10
     */
    public function httpMessageRequestWithAddedHeader(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Request - withAddedHeader()');

        $data = [
            'Accept' => ['text/html'],
        ];

        $request = new Request('GET', null, 'php://memory', $data);

        $newInstance = $request->withAddedHeader(
            'Cache-Control',
            [
                'max-age=0',
            ]
        );

        $I->assertNotEquals($request, $newInstance);

        $expected = [
            'Accept' => ['text/html'],
        ];

        $I->assertEquals(
            $expected,
            $request->getHeaders()
        );

        $expected = [
            'Accept'        => ['text/html'],
            'Cache-Control' => ['max-age=0'],
        ];

        $I->assertEquals(
            $expected,
            $newInstance->getHeaders()
        );
    }

    /**
     * Tests Phalcon\Http\Message\Request :: withAddedHeader() - merge
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-02-10
     */
    public function httpMessageRequestWithAddedHeaderMerge(UnitTester $I)
    {
        $data = [
            'Accept' => ['text/html'],
        ];

        $request = new Request('GET', null, 'php://input', $data);

        $newInstance = $request->withAddedHeader(
            'Accept',
            [
                'text/json',
            ]
        );

        $I->assertNotEquals($request, $newInstance);

        $expected = [
            'Accept' => [
                'text/html',
            ],
        ];

        $I->assertEquals(
            $expected,
            $request->getHeaders()
        );

        $expected = [
            'Accept' => [
                'text/html',
                'text/json',
            ],
        ];

        $I->assertEquals(
            $expected,
            $newInstance->getHeaders()
        );
    }
}
