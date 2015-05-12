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
     * it dynamically calls the methods and returns itself
     *
     * @test
     * @return void
     */
    public function it_dynamically_calls_the_methods_and_returns_itself()
    {
        $imagick = new Imagick(__DIR__ . '/image.jpg');

        $actual = $imagick
            ->gammaImage(true)
            ->despeckleImage();

        $this->assertInstanceOf('Thirteen\Imagick\Imagick', $actual);
    }


    /**
     * it can call methods even without the suffix
     *
     * @test
     * @return void
     */
    public function it_can_call_methods_even_without_the_suffix()
    {
        $imagick = new Imagick(__DIR__ . '/image.jpg');

        $actual = $imagick
            ->gamma(true)
            ->despeckle();

        $this->assertInstanceOf('Thirteen\Imagick\Imagick', $actual);
    }
}
