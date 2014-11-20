<?php
/**
 * Plugin Name: Grinding Levels Reviews
 * Plugin URI: http://dobsondev.com/portfolio/grinding-levels-reviews/
 * Description: A shortcode that allows you to post a review at the bottom of a post or page.
 * Version: 0.666
 * Author: Alex Dobson
 * Author URI: http://dobsondev.com/
 * License: GPLv2
 *
 * Copyright 2014  Alex Dobson  (email : alex@dobsondev.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/* Enqueue the Style Sheet */
function dobson_glr_enqueue_scripts() {
  wp_enqueue_style( 'grinding-levels-reviews', plugins_url( 'grinding-levels-reviews.css' , __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'dobson_glr_enqueue_scripts' );


/* Adds a shortcode for displaying PDF's Inline */
function dobson_glr_review_shortcode($atts) {
  extract(shortcode_atts(array(
    'score' => "0",
    'summary' => "The review summary.",
    'pros' => "No Pros",
    'cons' => "No Cons",
  ), $atts));

  $output = '<div class="gl-review">';

  // Start of the left side of the review which contains the
  // review score and the review summary
  $output .= '<div class="glr-left">';

  // The review score
  $output .= '<div class="glr-score">';
  $output .= $score;
  $output .= '</div><!-- END glr-score -->';

  // The review summary
  $output .= '<div class="glr-summary">';
  $output .= $summary;
  $output .= '</div><!-- END glr-summary -->';

  $output .= '</div><!-- END glr-left -->';

  // Start of the right side of the review which contains the
  // pros & cons list
  $output .= '<div class="glr-right">';

  // The pros & cons div which contains a pros ul along with a
  // cons ul
  $output .= '<div class="glr-proscons">';

  // The pros list
  $output .= '<ul class="glr-pros">';
  $pros_exploded = explode( ";", $pros);
  foreach ($pros_exploded as $pro) {
    $output .= '<li class="glr-pro">' . $pro . '</li>';
  }
  $output .= '</ul> <!-- END glr-pros -->';

  // The cons list
  $output .= '<ul class="glr-cons">';
  $cons_exploded = explode( ";", $cons);
  foreach ($cons_exploded as $con) {
    $output .= '<li class="glr-con">' . $con . '</li>';
  }
  $output .= '</ul> <!-- END glr-cons -->';

  $output .= '</div><!-- END glr-proscons -->';

  $output .= '</div><!-- END glr-right -->';

  $output .= '</div><!-- END gl-review -->';

  $output .= '<div style="clear: both;"></div>';

  return $output;
}
add_shortcode('gl_Review', 'dobson_glr_review_shortcode');

?>