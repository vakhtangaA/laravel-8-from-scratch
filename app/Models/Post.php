<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post {

  public function __construct(public $title, public $excerpt, public $date, public $body, public $slug) {

    $this->title = $title;

    $this->excerpt = $excerpt;

    $this->date = $date;

    $this->body = $body;

    $this->slug = $slug;
  }



  public static function find($slug) {

    $posts = static::all();

    return $posts->firstWhere('slug', $slug);
  }

  public static function all() {
    return collect(File::files(resource_path("posts/")))
      ->map(fn ($file) => YamlFrontMatter::parseFile($file))
      ->map(
        fn ($document) =>
        new Post(
          $document->title,
          $document->excerpt,
          $document->date,
          $document->body(),
          $document->slug,
        )
      );
  }
}
