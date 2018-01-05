<?php

class MultiselectField extends CheckboxesField {

  public $search = true;

  public static $assets = [
    'css' => [
      'style.css'
    ],
    'js' => [
      'script.js'
    ]
  ];

  public function __construct() {
    $this->icon = 'chevron-down';
  }

  public function input() {
    $value = func_get_arg(0);
    $input = parent::input($value);
    return str_replace('required', '', $input);
  }

  public function item($value, $text) {

    $label = new Brick('label');
    $label->addClass('input');
    $label->attr('data-focus', 'true');

    $text = new Brick('span', $this->i18n($text));
    $label->prepend($text);

    $input = $this->input($value);
    $label->prepend($input);

    if($this->readonly) {
      $label->addClass('input-is-readonly');
    }

    return $label;

  }

  public function content() {

    $display = new Brick('div');
    $display->addClass('input display');

    if($this->readonly()) {
      $display->addClass('input-is-readonly');
    }

    $display->attr(array(
      'tabindex' => 0
    ));

    $display->data(array(
      'field'    => 'multiselect',
      'search'   => $this->search ? 1 : 0,
      'readonly' => ($this->readonly or $this->disabled) ? 1 : 0
    ));

    $display->append('<div class="placeholder">&nbsp;</div>');

    $wrapper = new Brick('div');
    $wrapper->addClass('field-content input-with-multiselect');
    $wrapper->append($display);
    $wrapper->append($this->dropdown());
    $wrapper->append($this->icon());

    return $wrapper;

  }

  public function dropdown() {
    $dropdown = new Brick('div');
    $dropdown->addClass('list');

    $list = new Brick('ul');
    $item = new Brick('li');
    $item->addClass('list-item');
    foreach($this->options() as $key => $value) {
      $item->html($this->item($key, $value));
      $list->append($item);
    }
    $dropdown->append($list);

    if($this->search) {
      $dropdown->prepend('<input class="search-bar" placeholder="Type to filter options">');
    }

    return $dropdown;
  }


  public function label() {
    $label = parent::label();
    $label->attr('for', '');
    return $label;
  }

}
