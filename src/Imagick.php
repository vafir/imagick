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
 * @version     Release: 0.1.1
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
     * @param  Imagemagick  $imagick
     * @return Imagick
     */
    private function __construct(Imagemagick $imagick)
    {
        $this->imagick = $imagick;
    }


    /**
     * Create a new instance.
     *
     * @static
     * @param  string  $file
     * @return Imagemagick
     */
    public static function open($file)
    {
        return new Imagick(new Imagemagick($file));
    }


    /**
     * Get the native image magick methods.
     *
     * @return array
     */
    protected function getNativeMethods()
    {
        return get_class_methods(Imagemagick::class);
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
        return $this;
    }
}
