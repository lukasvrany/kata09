<?php declare(strict_types=1);

namespace App\Checkout\CheckoutPriceCalculator;

use App\Checkout\ICheckout;
use App\ProductPrice\IProductPrice;

class CheckoutPriceCalculator implements ICheckoutPriceCalculator {

	public function calculatePrice(array $productPriceMap, ICheckout $checkout): int {
		$allSkus = $checkout->getAll();
		$totalPrice = 0;

		foreach ($allSkus as $sku => $count) {
			if (isset($productPriceMap[$sku])) {
				$productPrice = $productPriceMap[$sku];
				assert($productPrice instanceof IProductPrice);
				$totalPrice = $totalPrice
					+ (((int)($count / $productPrice->getCountForSpecialPrice())) * $productPrice->getSpecialPrice())
					+ (($count % $productPrice->getCountForSpecialPrice()) * $productPrice->getPrice());
			}
		}

		return $totalPrice;
	}
}