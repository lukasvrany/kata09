<?php declare(strict_types=1);

namespace App\Checkout;

interface ICheckout {

	public function add(string $sku): void;
	public function getAll(): array;
}