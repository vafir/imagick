<?php
namespace Thirteen\Imagick;

use Imagick as Imagemagick;

/**
 * Class Imagick
 *
 * @property    Imagemagick  imagick
 *
 * @uses        \Imagick
 *
 * @package     Thirteen\Imagick
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.2
 * @link        http://github.com/thirteen/imagick
 * @since       Class available since Release 0.1.0
 */
class Imagick
{
    /**
     * Imagick instance.
     *
     * @type Imagemagick
     */
    protected $imagick;


    /**
     * Create a new Imagick instance.
     *
     * @param  string  $file
     * @return Imagick
     */
    public function __construct($file = null)
    {
        if ($file) {
            $this->imagick = new Imagemagick($file);
        }
    }


    /**
     * Set the image to parse.
     *
     * @param  string  $file
     * @return Imagick
     */
    public function load($file)
    {
        return new self($file);
    }


    /**
     * Magic method. Wooooh!
     *
     * @param  string  $name
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($name, array $parameters = [])
    {
        $method   = $name;
        $suffixed = $name . 'Image';

        if (method_exists($this->imagick, $suffixed)) {
            $method = $suffixed;
        }

        return call_user_func_array([$this->imagick, $method], $parameters);
    }
}
