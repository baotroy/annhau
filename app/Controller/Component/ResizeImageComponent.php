<?php

class ResizeImageComponent extends Component{

    //put your code here
    var $imageName;
    var $resizedImageName;
    var $newWidth;
    var $newHeight;
    var $srcImage;
    var $destImage;
    var $imageType;
    var $imageInfo;

    function load($filename) {
        $this->srcImage = $filename;
        $this->imageInfo = getimagesize($filename);
        $this->imageType = $this->imageInfo[2];
        if ($this->imageType == IMAGETYPE_JPEG) {
            $this->srcImage = imagecreatefromjpeg($filename);
        } elseif ($this->imageType == IMAGETYPE_GIF) {
            $this->srcImage = imagecreatefromgif($filename);
        } elseif ($this->imageType == IMAGETYPE_PNG) {
            $this->srcImage = imagecreatefrompng($filename);
        }
    }

    function save($filename, $imageType = IMAGETYPE_JPEG, $compression = 100) {
        if ($imageType == IMAGETYPE_JPEG) {
            imagejpeg($this->destImage, $filename, $compression);
        } elseif ($imageType == IMAGETYPE_GIF) {
            imagegif($this->destImage, $filename);
        } elseif ($imageType == IMAGETYPE_PNG) {
            imagepng($this->destImage, $filename);
        }
        return @chmod($filename, 0777) ? true : false;
    }
	
    function output() {
        header('Content-Type: image/jpeg');
        if ($this->image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->destImage);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            imagegif($this->destImage);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            imagepng($this->destImage);
        }
    }

    /**
     * Method ImageResizeClass::resizeImage()
     *
     * { Description :- 
     * 	This method resizes the image.
     * }
     */
    function resize($newWidth, $newHeight) {
        $old_x = imagesx($this->srcImage);
        $old_y = imagesy($this->srcImage);

        if ($old_x > $old_y) {
            $thumb_w = $newWidth;
            $thumb_h = $old_y * ($newHeight / $old_x);
        }

        if ($old_x < $old_y) {
            $thumb_w = $old_x * ($newWidth / $old_y);
            $thumb_h = $newHeight;
        }

        if ($old_x == $old_y) {
            $thumb_w = $newWidth;
            $thumb_h = $newHeight;
        }
        $this->destImage = imagecreatetruecolor($thumb_w, $thumb_h);
        imagecopyresized($this->destImage, $this->srcImage, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);
    }

    /**
     * Resize Image
     *
     * Takes the source image and resizes it to the specified width & height or proportionally if crop is off.
     * @access public
     * @author Jay Zawrotny <jayzawrotny@gmail.com>
     * @license Do whatever you want with it.
     * @param string $source_image The location to the original raw image.
     * @param string $destination_filename The location to save the new image.
     * @param int $width The desired width of the new image
     * @param int $height The desired height of the new image.
     * @param int $quality The quality of the JPG to produce 1 - 100
     * @param bool $crop Whether to crop the image or not. It always crops from the center.
     */
    function crop($width = 200, $height = 150, $quality = 100, $crop = true) {
        $old_width = $this->imageInfo[0];
        $old_height = $this->imageInfo[1];
        $new_width = $width;
        $new_height = $height;
        $src_x = 0;
        $src_y = 0;
        $current_ratio = round($old_width / $old_height, 2);
        $desired_ratio_after = round($width / $height, 2);
        $desired_ratio_before = round($height / $width, 2);

        if ($old_width < $width || $old_height < $height) {
            /**
             * The desired image size is bigger than the original image.
             * Best not to do anything at all really.
             */
            return false;
        }


        /**
         * If the crop option is left on, it will take an image and best fit it
         * so it will always come out the exact specified size.
         */
        if ($crop) {
            /**
             * create empty image of the specified size
             */
            $new_image = imagecreatetruecolor($width, $height);

            /**
             * Landscape Image
             */
            if ($current_ratio > $desired_ratio_after) {
                $new_width = $old_width * $height / $old_height;
            }

            /**
             * Nearly square ratio image.
             */
            if ($current_ratio > $desired_ratio_before && $current_ratio < $desired_ratio_after) {
                if ($old_width > $old_height) {
                    $new_height = max($width, $height);
                    $new_width = $old_width * $new_height / $old_height;
                } else {
                    $new_height = $old_height * $width / $old_width;
                }
            }

            /**
             * Portrait sized image
             */
            if ($current_ratio < $desired_ratio_before) {
                $new_height = $old_height * $width / $old_width;
            }

            /**
             * Find out the ratio of the original photo to it's new, thumbnail-based size
             * for both the width and the height. It's used to find out where to crop.
             */
            $width_ratio = $old_width / $new_width;
            $height_ratio = $old_height / $new_height;

            /**
             * Calculate where to crop based on the center of the image
             */
            $src_x = floor(( ( $new_width - $width ) / 2 ) * $width_ratio);
            $src_y = round(( ( $new_height - $height ) / 2 ) * $height_ratio);
        }
        /**
         * Don't crop the image, just resize it proportionally
         */ else {
            if ($old_width > $old_height) {
                $ratio = max($old_width, $old_height) / max($width, $height);
            } else {
                $ratio = max($old_width, $old_height) / min($width, $height);
            }

            $new_width = $old_width / $ratio;
            $new_height = $old_height / $ratio;

            $new_image = imagecreatetruecolor($new_width, $new_height);
        }

        /**
         * Where all the real magic happens
         */
        imagecopyresampled($new_image, $this->srcImage, 0, 0, $src_x, $src_y, $new_width, $new_height, $old_width, $old_height);

        $this->destImage = $new_image;
    }

}
