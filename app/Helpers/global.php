<?php
use Illuminate\Http\Request;

if (! function_exists('success_message')) {

    /**
     * Return Success Message Response
     *
     * @param  mixed $data
     * @return void
     */
    function success_message($data = '')
    {
        return response()->json([
            'message' => 'success',
            'data' => $data
        ], 200);
    }
}

if (! function_exists('error_message')) {

    /**
     * Return Error Message Response
     *
     * @param  mixed $data
     * @param  int $code
     * @return void
     */
    function error_message($data = '', $code = 403)
    {
        return response()->json([
            'message' => 'success',
            'data' => $data
        ], $code);
    }
}

if (!function_exists('set_active')) {

    /**
     * Make the menu tag active if the request segment matches it
     *
     * @param  string $segment
     * @param  string $class
     * @return void
     */
    function set_active($segment, $class = 'active')  {
        return check_segment($segment, 2) ? $class : '';
    }

}

if (!function_exists('check_segment')) {

    /**
     * Check if the request segment is equal to the name
     *
     * @param  string $name
     * @param  int $part
     * @return bool
     */
    function check_segment($name, $part = 1) {
        return get_segment($part) == $name;
    }
}

if (!function_exists('get_segment')) {

    /**
     * Get the segment with the part number
     *
     * @param  int $part
     * @return string
     */
    function get_segment($part) {
        $request = Request();

        return $request->segment($part);
    }
}

if (! function_exists('get_count')) {

    /**
     * Get the count of records in the table
     *
     * @param  string $table
     * @return int
     */
    function get_count($table) {
        return DB::table($table)->get()->count();
    }
}

if (! function_exists('can_not_access')) {

    /**
     * Return the can not access this page response
     *
     * @return \Response
     */
    function can_not_access($type = 'error') {
        return response()->json([
            'message' => 'Can not Access this Page',
            'type' => $type
        ], 403);
    }
}

if (! function_exists('create_success')) {

    /**
     * Return created successfully response
     *
     * @param  mixed $data
     * @return \Response
     */
    function create_success($data) {
        return response()->json([
            'message' => 'Record Created Successfully',
            'type' => 'success',
            'data' => $data
        ], 200);
    }
}

if (! function_exists('edit_success')) {

    /**
     * Return edited successfully response
     *
     * @param  mixed $data
     * @return \Response
     */
    function edit_success($data, $quantity, $price) {

        $cartContent = Cart::getContent();
        $cartCount   = $cartContent->count();
        $subTotal    = Cart::getSubTotal();
        $quantity    = $quantity;
        $total       = Cart::getTotal();

        return response()->json([
            'message' => 'Record Edited Successfully',
            'type' => 'success',
            'data' => $data,
            'count' => $cartCount,
            'subtotal' => $subTotal,
            'quantity' => $quantity,
            'price' => $price,
            'total' => $total,
        ], 200);
    }
}

if (! function_exists('delete_success')) {

    /**
     * Return deleted successfully response
     *
     * @param  mixed $data
     * @return \Response
     */
    function delete_success($data = '') {
        $cartContent = Cart::getContent();
        $cartCount   = $cartContent->count();
        $subTotal    = Cart::getSubTotal();
        $total       = Cart::getTotal();

        return response()->json([
            'message' => 'Record Deleted Successfully',
            'type' => 'success',
            'data' => $data,
            'count' => $cartCount,
            'subtotal' => $subTotal,
            'total' => $total,
        ], 200);
    }
}

if (! function_exists('found_success')) {

    /**
     * Return founded successfully response
     *
     * @param  mixed $data
     * @return \Response
     */
    function found_success($data) {
        return response()->json([
            'message' => 'Record Founded Successfully',
            'type' => 'success',
            'data' => $data
        ], 200);
    }
}


if (!function_exists('get_request')) {

    /**
     * Get the request validation class if exists otherwise get the Request class
     *
     * @param  mixed $request
     * @return \Request
     */
    function get_request($request)
    {
        return is_object($request) ? $request : \Request();
    }
}

/**
 * Capitalize the first letter of first word to the given string
 *
 * @param  string $string
 * @return string
 */
function str_capitalize(string $string): string {

    $first_char = $string[0];

    return strtoupper($first_char) . ltrim($string, $first_char);
}


function convertMonthIdToName($month_number) {
    $months = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ];

    return array_key_exists($month_number, $months) ? $months[$month_number] : 0;
}
