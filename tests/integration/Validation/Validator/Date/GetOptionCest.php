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

namespace Phalcon\Test\Integration\Validation\Validator\Date;

use IntegrationTester;
use Phalcon\Test\Fixtures\Traits\ValidationTrait;
use Phalcon\Validation\Validator\Date;

/**
 * Class GetOptionCest
 */
class GetOptionCest
{
    use ValidationTrait;

    /**
     * Tests Phalcon\Validation\Validator\Date :: getOption()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function validationValidatorDateGetOption(IntegrationTester $I)
    {
        $I->wantToTest('Validation\Validator\Date - getOption()');

        $validator = new Date();

        $this->checkGetOption($I, $validator);
    }
}
