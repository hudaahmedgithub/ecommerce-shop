<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

if (!function_exists('uploadImage')) {

    /**
	 * Upload Image to Path
	 *
	 * @param  object $requestImage
	 * @param  string $uplPath
	 * @param  bool $update
	 * @param  string $oldImage
	 * @return string
	 */
	function uploadImage($requestImage, $uplPath, $update = false, $oldImage = '')
	{
		$image = $requestImage;
		$extension = $image->getClientOriginalExtension();

		if ($extension != 'svg') {
			list($width, $height) = getimagesize($image);

			if ($width == 0 || $height == 0)
				return 'invalid_dimensions';
		}

		if ($update != false)
			removeFile($oldImage);

		$uploadPath = rtrim($uplPath, '/');
		$newName = 'image_' . time() . '_' . mt_rand(1, 1000000000) . '.' . $extension;

		if ($pathToImage = $image->storeAs($uploadPath, $newName)) {

			return $pathToImage;

		} else {
			return 'unexpected_error';
		}
    }
}

if (!function_exists('uploadFile')) {

    /**
	 * Upload File to Path
	 *
	 * @param  object $requestFile
	 * @param  string $uplPath
	 * @param  bool $update
	 * @param  string $oldFile
	 * @return string
	 */
	function uploadFile($requestFile, $uplPath, $prefix = 'file', $update = false, $oldFile = '')
	{
		$file = $requestFile;

		if ($update != false)
			removeFile($oldFile);

		$extension = $file->getClientOriginalExtension();

		$uploadPath = rtrim($uplPath, '/');
		$newName = $prefix . '_' . time() . '_' . mt_rand(1, 1000000000) . '.' . $extension;

		if ($pathToFile = $file->storeAs($uploadPath, $newName)) {

			return $pathToFile;

		} else {
			return 'unexpected_error';
		}
    }
}

if (!function_exists('removeFile')) {

    /**
	 * Remove an Image
	 *
	 * @param  string $path
	 * @return bool
	 */
	function removeFile($path)
	{
		if (Storage::exists($path)) {
			Storage::delete($path);
			return true;
		}

		return false;
    }
}

if (!function_exists('validateImage')) {

    /**
	 * Validate the image field
	 *
	 * @return Validator
	 */
	function validateImage($request, $inputName = 'image', $mimes = 'jpeg,jpg,png,gif', $maxSize = 5000)
	{
		$valid = Validator::make($request, [
			"$inputName" => "bail|required|mimes:" . $mimes . "|max:" . $maxSize
		], [], [
			"$inputName.required" => 'The image is required',
            "$inputName.mimes" => 'The image must be in type of (jpeg, jpg, png, gif)',
            "$inputName.max" => 'The image can not be more than ' . ($maxSize/1024) . ' MB'
		]);

		return $valid->messages()->messages();
	}
}

if (!function_exists('compressImage')) {

    /**
	 * Compress The Image
	 *
	 * @param  string $source_url
	 * @param  string $destination_url
	 * @param  int $quality
	 * @return string
	 */
	function compressImage($source_url, $destination_url, $quality)
	{
		$info = getimagesize($source_url);

		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source_url);
		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source_url);
		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source_url);

		imagejpeg($image, $destination_url, $quality);

		return $destination_url;
	}
}
