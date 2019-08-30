<?php declare(strict_types=1);

namespace App\Checkout;

class Checkout implements ICheckout {

	private $data = array();

	public function add(string $sku): void {
		if (isset($this->data[$sku])) {
			$this->data[$sku]++;
		} else {
			$this->data[$sku] = 1;
		}
	}

	public function getAll(): array {
		return $this->data;
	}
}