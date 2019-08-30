<?php declare(strict_types=1);

namespace App\ProductPrice;

interface IProductPrice {
	public function getPrice(): int;
	public function getSpecialPrice(): int;
	public function getCountForSpecialPrice(): int;
}