<?php
declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Virgoolio\Virgool;

final class VirgoolTest extends TestCase {

   public function testFake(): void {
      $this->assertTrue(Virgool::test());
   }

}



