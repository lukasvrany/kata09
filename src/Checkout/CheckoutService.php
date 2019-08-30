<?php declare(strict_types=1);

namespace App\Checkout;

use App\Checkout\CheckoutPriceCalculator\CheckoutPriceCalculator;
use App\ProductPrice\ProductPriceMap;

class CheckoutService implements ICheckoutService {

	private $checkout;
	private $productPriceMap;
	private $checkoutPriceCalculator;

	public function __construct() {
		$this->checkout = new Checkout();
		$this->productPriceMap = new ProductPriceMap();
		$this->checkoutPriceCalculator = new CheckoutPriceCalculator();
	}

	public function getTotal(): int {
		return $this->checkoutPriceCalculator->calculatePrice($this->productPriceMap->getData(), $this->checkout);
	}

	public function scan(string $sku): void {
		$this->checkout->add($sku);
	}
}