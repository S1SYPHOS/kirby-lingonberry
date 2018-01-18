<?php

/*

---------------------------------------
Custom kirbytext() field method
---------------------------------------

This field method generates Markdown-formatted text without being enclosed
by <p> tags - see https://github.com/jbeyerstedt/kirby-plugin-kirbytextRaw

By Jannik Beyerstedt
GNU General Public License v3.0

*/

function ktRaw($content) {
  $text = kirbytext($content);
  return preg_replace('/(.*)<\/p>/', '$1', preg_replace('/<p>(.*)/', '$1', $text));
}

field::$methods['ktRaw'] = function($field) {
  return ktRaw($field->value);
};
