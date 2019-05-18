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

namespace Phalcon\Test\Integration\Forms\Element\File;

use IntegrationTester;

/**
 * Class GetNameCest
 */
class GetNameCest
{
    /**
     * Tests Phalcon\Forms\Element\File :: getName()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function formsElementFileGetName(IntegrationTester $I)
    {
        $I->wantToTest('Forms\Element\File - getName()');
        $I->skipTest('Need implementation');
    }
}
