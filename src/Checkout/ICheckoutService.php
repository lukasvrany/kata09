<?php declare(strict_types=1);

namespace App\Checkout;

interface ICheckoutService {

	public function getTotal(): int;
	public function scan(string $sku): void;
}