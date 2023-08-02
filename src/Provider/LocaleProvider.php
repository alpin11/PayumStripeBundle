<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2021 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Payum\StripeBundle\Provider;

use CoreShop\Component\Core\Model\OrderInterface;

final class LocaleProvider implements LocaleProviderInterface
{
    public function getLocale(OrderInterface $order): ?string
    {
        $localeCode = $order->getLocaleCode();

        if (empty($localeCode)) {
            return null;
        }

        $gatewayLanguage = $localeCode;

        if (str_contains($gatewayLanguage, '_')) {
            $splitGatewayLLanguage = explode('_', $gatewayLanguage);
            $gatewayLanguage = array_shift($splitGatewayLLanguage);
        }

        return $gatewayLanguage;
    }
}
