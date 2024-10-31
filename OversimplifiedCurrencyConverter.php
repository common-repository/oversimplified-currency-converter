<?php
/*
Plugin Name: Oversimplified Currency Converter
Author: Luis Lohse
Version: 1.0.0
Description: Gives you a shortcode to display a currency converter on your page.
*/

// If this file is called directly, abort.
if ( ! defined( "WPINC" ) ) {
  die;
}

wp_register_style( "oversimplified_currency_converter", plugins_url( "style.css", __FILE__ ) );
wp_enqueue_style( "oversimplified_currency_converter" );

wp_register_script( "oversimplified_currency_converter_script", plugins_url( "app.js", __FILE__ ) );
wp_enqueue_script( "oversimplified_currency_converter_script" );


function oversimplified_currency_converter_function( $atts = [], $content = null, $tag = '' ) {

  $atts = shortcode_atts(
          array(
              'from' => 'dollar',
              'to' => 'euro'
          ), $atts, $tag
      );

  $from = sanitize_text_field( $atts["from"] );
  $to = sanitize_text_field( $atts["to"] );


	return '<div class="oversimplified_currency_converter_container" data-from=' . esc_attr( $from ) . ' data-to=' . esc_attr( $to ) . '>
            <div><input type="text" class="oversimplified_currency_converter_from"><span class="oversimplified_currency_converter_unit oversimplified_currency_converter_unit_from">$</span></div>
            <img class="oversimplified_currency_converter_conversion_symbol" src="' . plugins_url( "assets/conversion_symbol.png", __FILE__ ) . '"></img>
            <div><input type="text" class="oversimplified_currency_converter_to"><span class="oversimplified_currency_converter_unit oversimplified_currency_converter_unit_to">€</span></div>
          </div>';
}

if ( !shortcode_exists( "oversimplified_currency_converter" ) ) {
  add_shortcode( "oversimplified_currency_converter", "oversimplified_currency_converter_function" );
}
