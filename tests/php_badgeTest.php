<?php
namespace php_badgeTest;
use php_badge;
use php_badge\Badge;
use PHPUnit\Framework\TestCase;
class php_badgeTest extends TestCase{
  public function testBadge(){
    $str = 'Test';
    $path = dirname(__FILE__);
    $FontFile = $path.'/DejaVu-Sans.ttf'; //font file path
    $DBsvg = $path.'/DB.svg';
    $CIsvg = $path.'/CI.svg';
    $Badge = new Badge();
    $Badge->imageFontFile = $FontFile;
    //----------- STR --------------//
    ob_start();
      $Badge->svg($str);
    $ob_STR = ob_get_contents();
    ob_end_clean();
    //----------- DB --------------//
    $DB = array(
      array('state', '44CC11'),
      array('staging', 'F0CE1A'),
      array('testing', 'A0ABFC')
    );
    ob_start();
      $Badge->svg($DB);
    $ob_DB = ob_get_contents();
    ob_end_clean();
    //----------- CI --------------//
     $CI = array(
        array('build', '555'), //#555555
        array('passing', '4C1'), //#44CC11
    );
    $Badge->SimplexmlNo = true; //Simplexml Svg
    ob_start();
      $Badge->svg($CI);
    $ob_CI = ob_get_contents();
    ob_end_clean();
    file_put_contents('/tmp/DB.svg', $ob_DB);
    file_put_contents('/tmp/CI.svg', $ob_CI);
    file_put_contents('/tmp/STR.svg', $ob_STR);
    $this->assertFileExists('/tmp/DB.svg');
    $this->assertFileExists('/tmp/CI.svg');
    $this->assertFileExists('/tmp/STR.svg');
    //$this->assertXmlStringEqualsXmlFile('/tmp/STR.svg', $str);
    //$this->assertXmlFileEqualsXmlFile($DBsvg, '/tmp/DB.svg');
    //$this->assertXmlFileEqualsXmlFile($CIsvg, '/tmp/CI.svg');
  }
}
