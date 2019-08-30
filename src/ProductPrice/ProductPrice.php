<?php declare(strict_types=1);

namespace App\ProductPrice;

class ProductPrice implements IProductPrice {

	private $price;
	private $specialPrice;
	private $countForSpecialPrice;

	public function __construct(
		int $price,
		int $specialPrice = null,
		int $countForSpecialPrice = null
	) {
		$this->price = $price;
		if ($specialPrice === null || $countForSpecialPrice === null) {
			$this->specialPrice = $price;
			$this->countForSpecialPrice = 1;
		} else {
			$this->specialPrice = $specialPrice;
			$this->countForSpecialPrice = $countForSpecialPrice;
		}
	}

	public function getPrice(): int {
		return $this->price;
	}

	public function getSpecialPrice(): int {
		return $this->specialPrice;
	}

	public function getCountForSpecialPrice(): int {
		return $this->countForSpecialPrice;
	}
}