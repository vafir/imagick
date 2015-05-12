<?php

use Imagick as Imagemagick;
use Thirteen\Imagick\Imagick;

/**
 * Class ImagickTest
 *
 * @uses        \Imagick
 * @uses        \Thirteen\Imagick\Imagick
 *
 * @package
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.1
 * @link        http://github.com/thirteen/imagick
 * @since       Class available since Release 0.1.0
 */
class ImagickTest extends PHPUnit_Framework_TestCase
{

    /**
     * it fetches all the methods from imagick
     *
     * @test
     * @return void
     */
    public function it_fetches_all_the_methods_from_imagick()
    {
        $class   = new ReflectionClass(Imagick::class);
        $imagick = Imagick::open(__DIR__ . '/image.jpg');

        $method = $class->getMethod('getNativeMethods');
        $method->setAccessible(true);

        $actual = $method->invoke($imagick);

        $this->assertNotNull($actual);
    }


    /**
     * it dynamically calls the methods and returns itself
     *
     * @test
     * @return void
     */
    public function it_dynamically_calls_the_methods_and_returns_itself()
    {
        $imagick = Imagick::open(__DIR__ . '/image.jpg');

        $actual = $imagick->despeckleImage();

        $this->assertInstanceOf('Thirteen\Imagick\Imagick', $actual);
    }
}
