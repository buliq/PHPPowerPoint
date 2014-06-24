<?php
/**
 * This file is part of PHPPowerPoint - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPowerPoint is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPowerPoint/contributors.
 *
 * @copyright   2009-2014 PHPPowerPoint contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 * @link        https://github.com/PHPOffice/PHPPowerPoint
 */

namespace PhpOffice\PhpPowerpoint\Tests\Shape;

use PhpOffice\PhpPowerpoint\Shape\Drawing;

/**
 * Test class for Drawing element
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\Shape\Drawing
 */
class DrawingTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $object = new Drawing();

        $this->assertEmpty($object->getPath());
    }
    
    /**
     * @expectedException \Exception
     * @expectedExceptionMessage File  not found!
     */
    public function testPathBasic()
    {
        $object = new Drawing();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setPath());
    }
    
    public function testPathWithoutVerifyFile()
    {
        $object = new Drawing();
    
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setPath('', false));
        $this->assertEmpty($object->getPath());
    }
    
    public function testPathWithRealFile()
    {
        $object = new Drawing();

        $imagePath = PHPPOWERPOINT_TESTS_BASE_DIR.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'PHPPowerPointLogo.png';
        //list($width, $height) = getimagesize($imagePath);
        
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setPath($imagePath, false));
        $this->assertEquals($imagePath, $object->getPath());
        $this->assertEquals(0, $object->getWidth());
        $this->assertEquals(0, $object->getHeight());
    }
    
    public function testGetSetDescription()
    {
        $object = new Drawing();
    
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setDescription());
        $this->assertEmpty($object->getDescription());
    
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setDescription('TEST'));
        $this->assertEquals('TEST', $object->getDescription());
    }
    
    public function testGetSetResizeProportional()
    {
        $object = new Drawing();
    
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setResizeProportional());
        $this->assertTrue($object->isResizeProportional());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setResizeProportional(false));
        $this->assertFalse($object->isResizeProportional());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setResizeProportional(true));
        $this->assertTrue($object->isResizeProportional());
    }
    
    public function testGetSetHeightWidth()
    {
        $object = new Drawing();
    
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setWidth());
        $this->assertEquals(0, $object->getWidth());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setHeight());
        $this->assertEquals(0, $object->getHeight());
    
        // Valeur : Resize Proportional (false)
        $value = rand(0, 100);
        $object->setResizeProportional(false);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setWidth($value));
        $this->assertEquals($value, $object->getWidth());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setHeight($value));
        $this->assertEquals($value, $object->getHeight());
        
//         // Valeur : Resize Proportional (true)
//         $value = rand(0, 100);
//         $object->setResizeProportional(true);
//         $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Drawing', $object->setWidth($value));
        
    }
}