<?php

namespace Virgoolio;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Virgoolio\Parse\Post;

class Crawler {

   const METHOD_GET = "GET";
   const BASE_URL = "https://virgool.io/@";
   const POST_SELECTOR = ".streamItem-post";
   const POST_TITLE_SELECTOR = ".streamItem--title";
   const POST_SUMMARY_SELECTOR = ".streamItem--summary";
   const POST_METADATA_SELECTOR = ".postStreamItem-meta-postInfo--item";
   const POST_IMAGE_SELECTOR = ".streamItem--img";

   /**
    * Goutte crawler client
    *
    * @var Class
    */
   private $client;

   /**
    * Initialize the crawler client
    */
   public function __construct(array $config) {
      $this->client = new Client(HttpClient::create([
         "timeout" => $config["timeout"],
      ]));
   }

   /**
    * Fetch the latest posts
    *
    * @return Array
    */
   public function get_posts(string $username): array {
      $request = $this->client->request(self::METHOD_GET, self::BASE_URL . $username);
      $posts = [];

      $posts = $request->filter(self::POST_SELECTOR)->each(function($item) {
         $title = $item->filter(self::POST_TITLE_SELECTOR)->each(function($item) {
            return trim($item->text());
         });

         $summary = $item->filter(self::POST_SUMMARY_SELECTOR)->each(function($item) {
            return trim($item->text());
         });

         $metadata = $item->filter(self::POST_METADATA_SELECTOR)->each(function($item) {
            return trim($item->text());
         });

         $image = $item->filter(self::POST_IMAGE_SELECTOR)->each(function($item) {
            return $item->image()->getUri();
         });

         return [
            "title" => $title[0],
            "summary" => $summary[0],
            "metadata" => $metadata,
            "image" => $image,
         ];
      });

      return $posts;
   }

}
