<?php
/**
 *  Badge
 *  This is an identification tag based on SVG
 * @author http://weibo.com/yakeing
 * @version 4.1
 * logo ≥14px
 * 97CA00 green
 * 8892BF purple
 * F66000 orange
 * 007EC6 blue
 *
 * 1024x768或800x600等标准的分辨率计算出来的dpi是一个常数：96
 * ===================================================
 *  1英寸=72磅,1磅=1/72英寸
 *  9磅(96) = 9*1/72=1/8 inch
*/
namespace php_badge;
class Badge{

    public $imageFontFile = 'DejaVu-Sans.ttf'; //font file path
    public $NonEnglishReg = '/[\x{4e00}-\x{9fa5}]/u'; //Non-English String //[Chinese]
    public $SimplexmlNo = false; //Simplexml Svg
    public $CacheControl = 'must-revalidate, max-age=600, public'; //no-cache
    public $Icon = false; //Svg Icon <path d="M23....." fill="#FFF"></path>
    public $viewBox = '-120 -85 1200 1200'; //Svg Icon x, y, Width, Height
    public $opacity = 1; //transparency (0.0 - 1)
    public $OutputNo = true; //Output

    private $imageFontSize = 8; //image font size
    private $svgFontSize = 110; //svg font size
    private $svgFontFamily = "DejaVu Sans,Verdana,Geneva,sans-serif,Microsoft YaHei"; //svg font family

    //construct
    public function svg($str){
        if(!is_numeric($this->opacity) || 0 > $this->opacity || 1 < $this->opacity){
            $this->opacity = 1;
        }
        if(!is_file($this->imageFontFile)){
            throw new Exception('ERROR: {$this->imageFontFile}  file does not exist');
        }
        if(!is_array($str)){
            $str = array(array((string)$str, '44CC11'));
        }
        $data = $this->GenerateData($str);
        if(true === $this->SimplexmlNo){
            $svg = $this->SimplexmlSvg($data);
        }else{
            $svg = $this->Assembly($data);
        }
        if(true ===  $this->OutputNo){
        	$this->Output($svg);
        }else{
            return $svg;
        }
    } //END

    //Generate Data
    //array('Version','007ec6',  '40')
    private function GenerateData($str){
        $data = array();
        foreach ($str as $v){
            $len = strlen($v[0]);
            $NonEnglish = preg_match_all($this->NonEnglishReg, $v[0]);
            $imageWidth = imagettfbbox($this->imageFontSize, 0, $this->imageFontFile, $v[0]);
            $wx = abs($imageWidth[4] - $imageWidth[0])+($NonEnglish*5)+1;
            if(($len%2 == 0)){
                --$wx; //even
            }else{
                ++$wx; //odd
            }
            $data[] = array($v[0], $v[1], $wx);
        }
        return $data;
    } //END

    //simplexml Svg
    private function SimplexmlSvg($data){
        $string ='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>';
        $svg = simplexml_load_string($string);
        $svg->addAttribute('height', '20');
        $linearGradient = $svg->addChild('linearGradient');
        $linearGradient->addAttribute('id', 'b');
        $linearGradient->addAttribute('x2', '0');
        $linearGradient->addAttribute('y2', '100%');
            $stop = $linearGradient->addChild('stop');
            $stop->addAttribute('offset', '0');
            $stop->addAttribute('stop-color', '#bbb');
            $stop->addAttribute('stop-opacity', '.1');
            $stop = $linearGradient->addChild('stop');
            $stop->addAttribute('offset', '1');
            $stop->addAttribute('stop-opacity', '.1');
        $clipPath = $svg->addChild('clipPath');
        $clipPath->addAttribute('id', 'a');
            $rect = $clipPath->addChild('rect');
            $rect->addAttribute('height', '20');
            $rect->addAttribute('rx', '3');
            $rect->addAttribute('fill', '#fff');
        $gPath = $svg->addChild('g');
        $gPath->addAttribute('clip-path', 'url(#a)');
        $gtext = $svg->addChild('g');
        $gtext->addAttribute('fill', '#fff');
        $gtext->addAttribute('text-anchor', 'middle');
        $gtext->addAttribute('font-family',$this->svgFontFamily);//$this->svgFontFamily
        $gtext->addAttribute('font-size', $this->svgFontSize);//$this->svgFontSize
        $x = $M = $w = $width = 0;
        if(!is_bool($this->Icon)){
        	$x = 160;
            $w = 16;
        }
        foreach($data as $d){
            $w += $d[2]+10;
            $width += $w;
            $textLength = $d[2]*10;
            $p = 50+($d[2]*5);
            $x += $p;
            //---------- path -----------
            $path = $gPath->addChild('path');
            $path->addAttribute('fill', '#'.$d[1]);//fill
            $path->addAttribute('d', 'M'.$M.' 0h'.$w.'v20H'.$M.'z');//$M
            //------- text ---------
            $text = $gtext->addChild('text', $d[0]);//str
            $text->addAttribute('x', $x);//$x
            $text->addAttribute('y', '150');//150
            $text->addAttribute('fill', '#010101');
            $text->addAttribute('fill-opacity', '.3');
            $text->addAttribute('transform', 'scale(.1)');
            $text->addAttribute('textLength', $textLength);//$textLength
            $text = $gtext->addChild('text', $d[0]);//str
            $text->addAttribute('x', $x);//$x
            $text->addAttribute('y', '140');//140
            $text->addAttribute('transform', 'scale(.1)');
            $text->addAttribute('textLength', $textLength);//$textLength
            $x += $p;
            $M += $w;
            $w = 0;
        }
        $svg->addAttribute('width', $width);//$width
        $rect->addAttribute('width', $width);//$width
        $path = $gPath->addChild('path');
        $path->addAttribute('fill', 'url(#b)');
        $path->addAttribute('d', 'M0 0h '.$width.'v20H0z');//$width
        if(!is_bool($this->Icon)){
        	$addIco = $svg->addChild('svg');
            $icoPath = $addIco->addChild('path');
            $icon = simplexml_load_string($this->Icon);
            foreach($icon[0]->attributes() as $name => $value){
                $icoPath->addAttribute($name, $value);
            }
        	$addIco->addAttribute('viewBox', $this->viewBox);
        	$addIco->addAttribute('preserveAspectRatio', 'xMinYMid meet');
        	$addIco->addAttribute('opacity', $this->opacity);
        }
    return $svg->asXML();
    } //END

    //Assembly
    private function Assembly($data){
        $icons = $textLabel = $pathLabel = '';
        $x = $M = $w = $width = 0;
        if(!is_bool($this->Icon)){
        	$x = 160;
            $w = 16;
        }
        foreach ($data as $d){
            $w += $d[2]+10;
            $width += $w;
            $textLength = $d[2]*10;
            $p = 50+($d[2]*5);
            $x += $p;
            $pathLabel .= '<path fill="#'.$d[1].'" d="M'.$M.' 0h'.$w.'v20H'.$M.'z"/>';
            $textLabel .= '<text x="'.$x.'" y="150" fill="#010101" fill-opacity=".3" transform="scale(.1)" textLength="'.$textLength.'">'.$d[0].'</text>';
            $textLabel .= '<text x="'.$x.'" y="140" transform="scale(.1)" textLength="'.$textLength.'">'.$d[0].'</text>';
            $x += $p;
            $M += $w;
            $w = 0;
        }
        if(!is_bool($this->Icon)){
            $icons = '<svg viewBox="'.$this->viewBox.'" preserveAspectRatio="xMinYMid meet" opacity="'.$this->opacity.'">'.$this->Icon.'</svg>';
        }
return <<<EOB
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="{$width}" height="20">
    <linearGradient id="b" x2="0" y2="100%">
        <stop offset="0" stop-color="#bbb" stop-opacity=".1"/>
        <stop offset="1" stop-opacity=".1"/>
    </linearGradient>
    <clipPath id="a">
        <rect width="{$width}" height="20" rx="3" fill="#fff"/>
    </clipPath>
    <g clip-path="url(#a)">
        {$pathLabel}
        <path fill="url(#b)" d="M0 0h {$width}v20H0z"/>
    </g>
    <g fill="#fff" text-anchor="middle" font-family="{$this->svgFontFamily}" font-size="{$this->svgFontSize}">
       {$textLabel}
    </g>
    {$icons}
</svg>
EOB;
    } //END

    //Output code
    private function Output($svg){
        header('Content-Disposition: inline; filename="image.svg"');
        header('Cache-Control: '.$this->CacheControl);
        header('Content-Type: image/svg+xml');
        echo $svg;
    } //END Output
}
