<?php
namespace php_badgeTest;
use php_badge;
use php_badge\Badge;
use PHPUnit\Framework\TestCase;
class php_badgeTest extends TestCase{
  public function testBadge(){
    $path = dirname(__FILE__);
    $Badge = new Badge();
    $Badge->imageFontFile = $path.'/verdana.ttf'; //font file path
    $Badge->OutputNo = false; //Return string
    //----------- Splicing --------------//
    $db_Splicing = array(
        array('hits','555555'),
        array('12345','4C1')
    );
    $ob_Splicing = $Badge->svg($db_Splicing);
    file_put_contents('/tmp/Splicing.svg', $ob_Splicing);
    $this->assertFileExists('/tmp/Splicing.svg');
    //$this->assertXmlFileEqualsXmlFile($path.'/Splicing.svg', '/tmp/Splicing.svg');
    //----------- Simplexml --------------//
    $Badge->SimplexmlNo = true; //Simplexml Svg
     $db_Simplexml = array(
        array('build', '555'), //#555555
        array('passing', '4C1'), //#44CC11
    );
    $ob_Simplexml = $Badge->svg($db_Simplexml);
    file_put_contents('/tmp/Simplexml.svg', $ob_Simplexml);
    $this->assertFileExists('/tmp/Simplexml.svg');
    //$this->assertXmlFileEqualsXmlFile($path.'/Simplexml.svg', '/tmp/Simplexml.svg');
    //----------- ICON --------------//
    $Badge->Icon  = '<path d="M512 512m-273.07008 0a273.07008 273.07008 0 1 0 546.14016 0 273.07008 273.07008 0 1 0-546.14016 0Z"></path>';
    $icon = $Badge->svg('Test');
    //file_put_contents('/tmp/ICON.svg', $icon);
    //$this->assertFileExists('/tmp/ICON.svg');
    //$this->assertXmlStringEqualsXmlFile('/tmp/ICON.svg', $icon);
    //----------- ICON2 --------------//
    $Badge->SimplexmlNo = false; //Simplexml Svg
    $Badge->OutputNo = true; //Output
    $Badge->opacity = 1.1; //error transparency 
    ob_start();
      $Badge->svg('Test');
    $icon2 = ob_get_contents();
    ob_end_clean();
    //file_put_contents('/tmp/ICON2.svg', $icon2);
    //$this->assertFileExists('/tmp/ICON2.svg');
    //$this->assertXmlStringEqualsXmlFile('/tmp/ICON2.svg', $icon2);
  }
}
