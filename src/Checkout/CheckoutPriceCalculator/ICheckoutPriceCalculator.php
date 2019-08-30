<?php declare(strict_types=1);

namespace App\Checkout\CheckoutPriceCalculator;

use App\Checkout\ICheckout;

interface ICheckoutPriceCalculator {

	public function calculatePrice(array $productPriceMap, ICheckout $checkout): int;
}