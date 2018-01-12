<?=
  
page('home')->children()->visible()->flip()->limit(10)->feed(array(
  'title'       => $site->title(),
  'description' => $site->tagline(),
));

?>