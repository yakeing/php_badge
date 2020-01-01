<?php
namespace php_badgeTest;
use php_badge;
use php_badge\Badge;
use PHPUnit\Framework\TestCase;
class php_badgeTest extends TestCase{
  public function testBadge(){
    //init
    $icon = false;
    $viewBox = '-250 -85 1200 1200';
    $Stroke = false;
    $opacity = 1;
    $SimplexmlNo = false; //Simplexml Svg
    $OutputNo = true; //Return string
    $path = dirname(__FILE__);
    $Badge = new Badge();
    $Badge->imageFontFile = $path.'/verdana.ttf'; //font file path

    //----------- Splicing --------------//
    $Splicing_db = array(
        array('hits','555'), //#555555
        array('12345','4C1') //#44CC11
    );
    $Splicing_ob = $Badge->svg($Splicing_db, $icon, $viewBox, $Stroke, $opacity, $SimplexmlNo, $OutputNo);
    file_put_contents('/tmp/Splicing.svg', $Splicing_ob);
    $this->assertFileExists('/tmp/Splicing.svg');
    $this->assertXmlFileEqualsXmlFile($path.'/Splicing.svg', '/tmp/Splicing.svg');

    //----------- Simplexml --------------//
     $Simplexml_db = array(
        array('build', '555'), //#555555
        array('passing', '4C1'), //#44CC11
    );
    $Simplexml_ob = $Badge->svg($Simplexml_db, $icon, $viewBox, $Stroke, $opacity, true, $OutputNo);
    file_put_contents('/tmp/Simplexml.svg', $Simplexml_ob);
    $this->assertFileExists('/tmp/Simplexml.svg');
    $this->assertXmlFileEqualsXmlFile($path.'/Simplexml.svg', '/tmp/Simplexml.svg');

    //----------- ICON --------------//
    $icon  = '<path d="M512 512m-273.07008 0a273.07008 273.07008 0 1 0 546.14016 0 273.07008 273.07008 0 1 0-546.14016 0Z"></path>';
    $Test_db = array(
        array('Test', '555') //#555555
    );
    $Splicing_ob = $Badge->svg($Test_db, $icon, $viewBox, $Stroke, $opacity, $SimplexmlNo, $OutputNo);
    //file_put_contents('/tmp/ICON.svg', $icon);
    //$this->assertFileExists('/tmp/ICON.svg');
    //$this->assertXmlStringEqualsXmlFile('/tmp/ICON.svg', $icon);

    /* ----------- ob_start --------------
    ob_start();
    $Badge->svg('Test', false, $viewBox, $Stroke, $opacity, $SimplexmlNo, $OutputNo);
    $start = ob_get_contents();
    ob_end_clean();
    //file_put_contents('/tmp/start.svg', $start);
    //$this->assertFileExists('/tmp/start.svg');
    //$this->assertXmlStringEqualsXmlFile('/tmp/start.svg', $start);
    */
  }
}
