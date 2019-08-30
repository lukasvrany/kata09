<?php declare(strict_types=1);

namespace tests;

use App\Checkout\CheckoutService;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase {

	public function testTotalPrice(): void {
		$this->assertEquals(0, $this->price(""));
		$this->assertEquals(50, $this->price("A"));
		$this->assertEquals(80, $this->price("AB"));
		$this->assertEquals(115, $this->price("CDBA"));
		$this->assertEquals(100, $this->price("AA"));
		$this->assertEquals(130, $this->price("AAA"));
		$this->assertEquals(180, $this->price("AAAA"));
		$this->assertEquals(230, $this->price("AAAAA"));
		$this->assertEquals(260, $this->price("AAAAAA"));
		$this->assertEquals(160, $this->price("AAAB"));
		$this->assertEquals(175, $this->price("AAABB"));
		$this->assertEquals(190, $this->price("AAABBD"));
		$this->assertEquals(190, $this->price("DABABA"));
	}

	public function testIncremental(): void {$co = new CheckoutService();
		$this->assertEquals(  0, $co->getTotal());
		$co->scan("A");
		$this->assertEquals( 50, $co->getTotal());
		$co->scan("B");
		$this->assertEquals( 80, $co->getTotal());
		$co->scan("A");
		$this->assertEquals(130, $co->getTotal());
		$co->scan("A");
		$this->assertEquals(160, $co->getTotal());
		$co->scan("B");
		$this->assertEquals(175, $co->getTotal());
	}



	private function price(string $skus): int {
		$checkout = new CheckoutService();
		foreach (str_split($skus) as $sku) {
			$checkout->scan($sku);
		}
		return $checkout->getTotal();
	}
}
