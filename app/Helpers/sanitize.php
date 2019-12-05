<?php

if (!function_exists('sanitizeString')) {

    /**
	 * Santize a given fields to be a valid string
	 *
	 * @return array
	 */
	function sanitizeString()
	{
		$fields = func_get_args();
		$sanitized = [];

		foreach ($fields as $field) {
			$str = strip_tags($field);
			$str = filter_var($str, FILTER_SANITIZE_STRING);
			$str = htmlentities($str, ENT_QUOTES, "UTF-8");
			array_push($sanitized, $str);
		}

		return $sanitized;
	}

}

if (!function_exists('sanitizeInteger')) {

    /**
	 * Sanitize a given fields to be a valid integers
	 *
	 * @return array
	 */
	function sanitizeInteger(...$fields)
	{
		$sanitized = [];

		foreach ($fields as $field) {
			$num = filter_var($field, FILTER_SANITIZE_NUMBER_INT);
			array_push($sanitized, $num);
		}

		return $sanitized;
	}
}

if (!function_exists('sanitizeFloat')) {

	/**
	 * Sanitize a given fields to be a valid Float
	 *
	 * @return array
	 */
	function sanitizeFloat()
	{
		$fields = func_get_args();
		$sanitized = [];

		foreach ($fields as $field) {
			$num = filter_var($field, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
			array_push($sanitized, $num);
		}

		return $sanitized;
	}
}

if (!function_exists('sanitizeEmail')) {

	/**
	 * Santize a given fields to be a valid email
	 *
	 * @return array
	 */
	function sanitizeEmail()
	{
		$fields = func_get_args();
		$sanitized = [];

		foreach ($fields as $field) {
			$email = filter_var($field, FILTER_SANITIZE_EMAIL);
			array_push($sanitized, $email);
		}

		return $sanitized;
	}
}

if (!function_exists('sanitizeUrl')) {

	/**
	 * Santize a given fields to be a valid url
	 *
	 * @return array
	 */
	function sanitizeUrl()
	{
		$fields = func_get_args();
		$sanitized = [];

		foreach ($fields as $field) {
			$str = filter_var($field, FILTER_SANITIZE_URL);
			$str = htmlentities($str, ENT_QUOTES, "UTF-8");
			array_push($sanitized, $str);
		}

		return $sanitized;
    }
}
