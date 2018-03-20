<?php
/**
 * get_the_content() Formatted with tags, etc.
 * @return string [formatted html]
 */
function get_the_content_formatted() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}