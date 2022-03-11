<?php

namespace Virgoolio;

use Virgoolio\Exception\Custom as CustomException;
use Virgoolio\Crawler;

class Virgool {

   /**
    * Goutte client
    *
    * @var Class
    */
   public $crawler;

   /**
    * Application configuration
    * @var Array
    */
   protected $config;

   /**
    * Initialize the crawler
    */
   public function __construct(string $username = "") {
      if(empty($username)) {
         throw new CustomException(CustomException::USERNAME_EMPTY);
      }

      $this->config = [
         "timeout" => 60,
         "username" => $username,
      ];

      $this->crawler = new Crawler($this->config);
   }

   /**
    * Fetch the latest posts
    *
    * @return Array
    */
   public function get_posts(): array {
      return $this->crawler->get_posts($this->config["username"]);
   }

}
