<?php declare(strict_types=1);

namespace App\ProductPrice;

class ProductPriceMap {

	private $price_map = array();

	public function __construct() {
		$this->price_map["A"] = new ProductPrice(50, 130, 3);
		$this->price_map["B"] = new ProductPrice(30, 45, 2);
		$this->price_map["C"] = new ProductPrice(20);
		$this->price_map["D"] = new ProductPrice(15);
	}

	public function getData(): array {
		return $this->price_map;
	}

}