<?php
namespace php_badgeTest;
use php_badge;
use php_badge\Badge;
use PHPUnit\Framework\TestCase;
class php_badgeTest extends TestCase{
  public function testBadge(){
    $path = dirname(__FILE__);
    $Badge = new Badge();
    $Badge->imageFontFile = $path.'/DejaVu-Sans.ttf'; //font file path
    //----------- STR --------------//
    $str = 'Test';
    ob_start();
      $Badge->svg($str);
    $ob_STR = ob_get_contents();
    ob_end_clean();
    //file_put_contents('/tmp/STR.svg', $ob_STR);
    //$this->assertFileExists('/tmp/STR.svg');
    //$this->assertXmlStringEqualsXmlFile('/tmp/STR.svg', $str);
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
  }
}
