<?php
declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Virgoolio\Virgool;

final class VirgoolTest extends TestCase {

   public function testUsernameIsEmpty(): void {
      $this->expectException(Virgoolio\Exception\Custom::class);

      new Virgool("");
   }

   public function testGetPosts(): void {
      $username = "virgool";
      $virgool = new Virgool($username);
      $posts = $virgool->get_posts();

      $this->assertIsArray($posts);
   }

}
