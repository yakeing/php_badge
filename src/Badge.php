<?php
/**
 *  Badge
 *  This is an identification tag based on SVG
 * @author http://weibo.com/yakeing
 * @version 3.6
 * logo ≥14px
 * 97CA00 green
 * 8892BF purple
 * F66000 orange
 * 007EC6 blue
*/
namespace php_badge;
class Badge{
	private $Fillet = 3;
	private $width = 80;
	private $height = 20;
	private $font_size = 11;
	private $font_family = "DejaVu Sans,Verdana,Geneva,sans-serif,Microsoft YaHei";
	private $stop_color = "#bbb"; //Linear progressive changing color
	private $text_x_shade = 0.5; //Font shadow X Offset
	private $text_y_shade = 1; //Font shadow Y Offset
	private $rect_arr = array(); //Base map Multidimensional Arrays [['x'=>0, 'color'=>10],...]
	private $text = array(); //Text Multidimensional Arrays [['x'=>10, 'y'=>10, 'color'=>10, 'text'=>'1.0'],...]

	//Print image
	public function SvgIcon($color1, $text1, $color2, $text2){
		$t1 = $this->StrCount($text1);
		$t2 = $this->StrCount($text2);
		$daub = array(
			array('width'=>0, 'x'=>0, 'color'=>'#'.$color1),
			array('width'=>8+$t2, 'x'=>8+$t1, 'p'=>4, 'color'=>'#'.$color2)
		);
		$text = array(
			array('x'=>3+$t1/2, 'y'=>14, 'color'=>"#EEF", 'text'=>$text1),
			array('x'=>12+$t1+$t2/2, 'y'=>14, 'color'=>"#010101", 'text'=>$text2)
		);
		$this->width = 16+$t1+$t2;
		$this->Parameter($daub, $text);
	} //END SvgIcon

	//Custom parameter
	public function Parameter($daub, $text){
		$this->daub = $daub;
		$this->text = $text;
	} //END Parameter

	//Statistical string
	private function StrCount($str){
		$PxSize = 7; //Pixel size
		$AllLen = strlen($str);
		$ZhLen = preg_match_all('/[\x{4e00}-\x{9fa5}]/u', $str); //-3.9px Chinese
		$UpperLen = preg_match_all('/[A-Z]/', $str); //8px uppercase letter
		//$LowerLen = preg_match_all('/[a-z]/', $str); //7px Lower case letters
		return ($PxSize*$AllLen)+$UpperLen-($ZhLen*9.99);
	} //END StrCount

	//Assembly
	private function Svg(){
		$rect = '';
		$width= $this->width;
		foreach ($this->daub as $key => $value){
			$path = '';
			if ($key !== 0) {
				$width =  $value['width'];
				$path .= '<path fill="'.$value['color'].'" d="M'.$value['x'].' 0h'.$value['p'].'v'.$this->height.'h-'.$value['p'].'z"/>';
			}
			$rect .= '<rect rx="'.$this->Fillet.'" x="'.$value['x'].'" width="'.$width.'" height="'.$this->height.'" fill="'.$value['color'].'"/>'.$path;
		}
		$rect .= '<rect rx="'.$this->Fillet.'" width="'.$this->width.'" height="'.$this->height.'" fill="url(#a)"/>';
		$g_text = '';
		foreach ($this->text as $v) {
			$g_text .= '<text x="'.($v['x']+$this->text_x_shade).'" y="'.($v['y']+$this->text_y_shade).'" fill="'.$v['color'].'" fill-opacity=".3">'.$v['text'].'</text>';
			$g_text .= '<text x="'.$v['x'].'" y="'.$v['y'].'">'.$v['text'].'</text>';
		}
		$g = '<g fill="#fff" text-anchor="middle" font-family="'.$this->font_family.'" font-size="'.$this->font_size.'">';
		$g .= $g_text;
		$g .= '</g>';
		$linearGradient = '<linearGradient id="a" x2="0" y2="100%">';
		$linearGradient .= '<stop offset="0" stop-color="'.$this->stop_color.'" stop-opacity=".1"/>';
		$linearGradient .= '<stop offset="1" stop-opacity=".1"/>';
		$linearGradient .= '</linearGradient>';
		return '<?xml version="1.0"?><svg xmlns="http://www.w3.org/2000/svg" width="'.$this->width.'" height="'.$this->height.'">'.$linearGradient.$rect.$g.'</svg>';
	}

	//Output code
	public function Out(){
		header('Content-Disposition: inline; filename="image.svg"');
		header ('Cache-Control: max-age=604800,public');
		header('Content-Type: image/svg+xml');
		echo $this->Svg();
	} //END Out
}
