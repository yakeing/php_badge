<?php
/**
 *  Badge
 *  This is an identification tag based on SVG
 * @author http://weibo.com/yakeing
 * @version 5.0
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

    public $imageFontFile = 'verdana.ttf'; //font file path
    public $NonEnglishReg = '/[\x{4e00}-\x{9fa5}]/u'; //Non-English String //[Chinese]
    public $CacheControl = 'must-revalidate, max-age=600, public'; //no-cache

    private $imageFontSize = 8; //image font size
    private $svgFontSize = 110; //svg font size
    private $svgFontFamily = "DejaVu Sans,Verdana,Geneva,sans-serif,Microsoft YaHei"; //svg font family

    /* svg
    * $str = array(array('Version','007ec6')...)
    * $icon = false / path (<path d="M23....." fill="#FFF"></path>)
    * $viewBox = string (x, y, Width, Height)
    * $Stroke = bool (path Stroke)
    * $opacity = 0.0 - 1 (transparency)
    * $SimplexmlNo = bool (Simplexml / Assembly)
    * $OutputNo = bool (Output)
    */
    public function svg($str, $icon=false, $viewBox='-250 -85 1200 1200', $Stroke=false, $opacity=1, $SimplexmlNo=false, $OutputNo=false){
        if(!is_numeric($opacity) || 0 > $opacity || 1 < $opacity){
            $opacity = 1;
        }
        if(!is_file($this->imageFontFile)){
            throw new Exception('ERROR: {$this->imageFontFile}  file does not exist');
        }
        $data = $this->GenerateData($str, $icon, $viewBox, $Stroke, $opacity);
        if(true ===  $SimplexmlNo){
            $svg = $this->SimplexmlSvg($data);
        }else{
            $svg = $this->Assembly($data);
        }
        if(false ===  $OutputNo){
            $this->Output($svg);
        }else{
            return $svg;
        }
    } //END svg

    //Generate Data
    private function GenerateData($str, $icon, $viewBox, $Stroke, $opacity){
        $data = array('icon' => $icon, 'viewBox' => $viewBox, 'opacity' => $opacity);
        $i = $x = $M = $w = 0;
        if(!is_bool($icon)){
            $x = 180;
            $w = 18;
        }
        if(true === $Stroke){
            $StrokeColour = $str[0][1];
        }else if(false !== $Stroke){
            $StrokeColour = $Stroke;
        }
        $all = count($str)-1;
        // foreach ($str as $i => $v){
        foreach ($str as $v){
            $len = mb_strlen($v[0], 'utf8'); //strlen
            $NonEnglish = preg_match_all($this->NonEnglishReg, $v[0]);
            $imageBox = imagettfbbox($this->imageFontSize, 0, $this->imageFontFile, $v[0]);
            $StrWidth = abs($imageBox[2] - $imageBox[0])+($NonEnglish*5);
            if(($len%2 != 0)){
                ++$StrWidth; //odd
            }// --$wx; //even
            $w += $StrWidth+10;
            $textLength = $StrWidth*10;
            $p = 50+($StrWidth*5);
            $x += $p;
            if(0 == $all){
                $w -= 4;
                $path_d = $this->PathD($M, $w, 'alone');
            }else if(0 == $i){
                $path_d = $this->PathD($M, $w, 'first');
            }else if($all == $i){
                $w -= 4;
                $path_d = $this->PathD($M, $w, 'last');
            }else{
                $path_d = $this->PathD($M, $w, 'middle');
            }
            if(!$Stroke){ // false
                $StrokeColour = $v[1];
            }
            $data['list'][$i] = array(
                'path' => array('fill'=>$v[1], 'stroke'=>$StrokeColour, 'd'=>$path_d),
                'text' => array('x'=>$x, 'textLength'=>$textLength, 'string'=>$v[0])
            );
            $x += $p;
            $M += $w;
            $w = 0;
            ++$i;
        }
        $M += 0.5;
        $data['width'] = $M+3;
        $data['Last_path_d'] = $this->PathD(0, $M, 'alone');
        return $data;
    } //END

    //Assembly
    private function Assembly($data){
        $icons = $textLabel = $pathLabel = '';
        foreach ($data['list'] as $d){
            $pathLabel .= '<path fill="#'.$d['path']['fill'].'" fill-rule="nonzero" stroke="#'.$d['path']['stroke'].'" d="'.$d['path']['d'].'"/>';
            $textLabel .= '<text x="'.$d['text']['x'].'" y="150" fill="#010101" fill-opacity=".3" transform="scale(.1)" textLength="'.$d['text']['textLength'].'">'.$d['text']['string'].'</text>';
            $textLabel .= '<text x="'.$d['text']['x'].'" y="140" transform="scale(.1)" textLength="'.$d['text']['textLength'].'">'.$d['text']['string'].'</text>';
        }
        if(!is_bool($data['icon'])){
            $icons = '<svg viewBox="'.$data['viewBox'].'" preserveAspectRatio="xMinYMid meet" opacity="'.$data['opacity'].'">'.$data['icon'].'</svg>';
        }
        $pathLabel .= '<path fill="url(#a)" d="'.$data['Last_path_d'].'"/>';
return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="'.$data['width'].'" height="20"><linearGradient id="a" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><g fill="none" fill-rule="evenodd">'.$pathLabel.'</g><g fill="#fff" text-anchor="middle" font-family="'.$this->svgFontFamily.'" font-size="'.$this->svgFontSize.'">'.$textLabel.'</g>'.$icons.'</svg>';
    } //END


    //simplexml Svg
    private function SimplexmlSvg($data){
        $string ='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20">';
        $string .='<linearGradient id="a" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/>';
        $string .='<stop offset="1" stop-opacity=".1"/></linearGradient></svg>';
        $svg = simplexml_load_string($string);
        $svg->addAttribute('width', $data['width']);
        $gPath = $svg->addChild('g');
        $gPath->addAttribute('fill', 'none');
        $gPath->addAttribute('fill-rule', 'evenodd');
        $gtext = $svg->addChild('g');
        $gtext->addAttribute('fill', '#fff');
        $gtext->addAttribute('text-anchor', 'middle');
        $gtext->addAttribute('font-family',$this->svgFontFamily);
        $gtext->addAttribute('font-size', $this->svgFontSize);
        foreach ($data['list'] as $d){
            //---------- path -----------
            $path = $gPath->addChild('path');
            $path->addAttribute('fill', '#'.$d['path']['fill']);
            $path->addAttribute('fill-rule', 'nonzero');
            $path->addAttribute('stroke', '#'.$d['path']['stroke']);
            $path->addAttribute('d', $d['path']['d']);
            //------- text ---------
            $text = $gtext->addChild('text', $d['text']['string']);
            $text->addAttribute('x', $d['text']['x']);//$x
            $text->addAttribute('y', '150');//150
            $text->addAttribute('fill', '#010101');
            $text->addAttribute('fill-opacity', '.3');
            $text->addAttribute('transform', 'scale(.1)');
            $text->addAttribute('textLength', $d['text']['textLength']);
            $text = $gtext->addChild('text', $d['text']['string']);
            $text->addAttribute('x', $d['text']['x']);
            $text->addAttribute('y', '140');
            $text->addAttribute('transform', 'scale(.1)');
            $text->addAttribute('textLength', $d['text']['textLength']);
        }
        $path = $gPath->addChild('path');
        $path->addAttribute('fill', 'url(#a)');
        $path->addAttribute('d', $data['Last_path_d']);
        if(!is_bool($data['icon'])){
            $xmlS = $svg->addChild('svg');
            $icon = simplexml_load_string('<svg>'.$data['icon'].'</svg>');
            /* get svg icon <s><x><t><t2>...<s>
            $icon = simplexml_load_string($data['icon']);
            // $svg->getDocNamespaces() xmlns:xxx=xxx
            $xmlS = $svg->addChild($icon->getName());
            foreach($icon->attributes() as $k => $v){
                $xmlS->addAttribute($k,$v);
            } */
            foreach($icon->children() as $child){
                $xmlP = $xmlS->addChild($child->getName());
                foreach($child->attributes() as $k => $v){
                    $xmlP->addAttribute($k,$v);
                }
            }
            $xmlS->addAttribute('viewBox', $data['viewBox']);
            $xmlS->addAttribute('preserveAspectRatio', 'xMinYMid meet');
            $xmlS->addAttribute('opacity', $data['opacity']);
        }
    return $svg->asXML();
    } //END

    //path d attribute
    private function PathD($M, $w, $position){
        $left_upper = 'C.5 2.5143  0.5215 .5 3.0046 .5';
        $right_upper = 'c2.459 0 2.4905 1.6715 2.4905 3.7805';
        $right_down = 'c0 2.1105 -0.0334 3.7805 -2.4905 3.7805';
        $left_down = 'C2.518 19.5 .5 19.4857 .5 18.0052';
        switch($position) {
            case 'alone':
                // 1-2-4-3
                $d = 'M.5 4.9948'.$left_upper.'H'.$w.$right_upper.'v11.439'.$right_down.'H3.0046'.$left_down.'V4.9948z';
                break;
            case 'first':
                $d = 'M.5 4.9948'.$left_upper.'H'.$w.'v19H3.0046'.$left_down.'V4.9948z';
                break;
            case 'middle':
                $M +=0.5;
                $d = 'M'.$M.' .5h'.$w.'v19H'.$M.'z';
                break;
            case 'last':
                $M +=0.5;
                //$w +=0.5095;
                $d = 'M'.$M.' .5h'.$w.$right_upper.'v11.439'.$right_down.'H'.$M.'V.5z';
                break;
        }
        return $d;
    } //END PathD

    //Output code
    private function Output($svg){
        header('Content-Disposition: inline; filename="image.svg"');
        header('Cache-Control: '.$this->CacheControl);
        header('Content-Type: image/svg+xml');
        echo $svg;
    } //END Output
}
