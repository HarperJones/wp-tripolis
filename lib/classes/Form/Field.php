<?php
/*
 * @author: petereussen
 * @package: wp-tripolis
 */

namespace WPTripolis\Form;


use WPTripolis\Wordpress\Template;

class Field
{
  protected $form;

  public $label;
  public $required = false;
  public $id;
  public $type = 'string';
  public $default = '';
  public $options = false;

  protected $source;

  public function __construct($definition,$form = null)
  {
    $this->form = $form;

    $this->label    = $definition['altlabel'] ?: $definition['field']['label'];
    $this->required = $definition['field']['required'];
    $this->id       = $definition['field']['id'];
    $this->type     = strtolower($definition['field']['type']);
    $this->default  = $definition['field']['default'];
    $this->source   = $definition['field'];

    if ( $this->type === 'picklist' ) {
      $this->options = [];

      foreach( $definition['field']['options']['picklistItem'] as $optionset ) {
        $this->options[$optionset['key']] = $optionset['value'];
      }
    }
  }

  public function __toString()
  {
    set_query_var('wpfield',$this);

    $template = new Template();
    return $template->get('templates/field',$this->type);
  }
}