<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// ------------------------------------------------------------------------

if ( ! function_exists('chan_date'))
{
	function chan_date(){
		date_default_timezone_set('Asia/Shanghai');
		if(date("H") < 5) {
			$date = date("Y-m-d", time() -5 *3600);
		} else {
			$date = date("Y-m-d");
		}
		return $date;
	}
}
if(!function_exists("tx_yun_image_upload")) {
	function tx_yun_image_upload($filename) {
		$dir = dirname(__FILE__);
		//print $dir;
		require_once($dir . "/Tencentyun/Auth.php");
		require_once($dir . "/Tencentyun/Conf.php");
		require_once($dir . "/Tencentyun/Http.php");
		require_once($dir . "/Tencentyun/Image.php");
		require_once($dir . "/Tencentyun/ImageProcess.php");
		require_once($dir . "/Tencentyun/ImageV2.php");

	// 上传图片
		$uploadRet = Tencentyun\ImageV2::upload($filename, "chan0201");
		return $uploadRet;
	}
}
if ( ! function_exists('chan_output'))
{
	function chan_output($data){
		header('Content-type: application/json');
		echo json_encode($data);
	}
}
if ( ! function_exists('chan_img'))
{
	function chan_img($img_url){
		if(!empty($img_url) ) {
			if(preg_match("/http:/", $img_url)) {
				$img_path = $img_url;
			} else {
				$img_path = get_instance()->config->item("base_url") . $img_url;
			}
		}else {
			$img_path = '';
		}
		return $img_path;
	}
}
if(!function_exists("imagezoom")) {
	function imagezoom( $srcimage, $dstimage,  $dst_width, $dst_height, $backgroundcolor ) {
	    $dstimg = imagecreatetruecolor( $dst_width, $dst_height );
	    $color = imagecolorallocate($dstimg
	        , hexdec(substr($backgroundcolor, 1, 2))
	        , hexdec(substr($backgroundcolor, 3, 2))
	        , hexdec(substr($backgroundcolor, 5, 2))
	    );
	    imagefill($dstimg, 0, 0, $color);
	
	    if ( !$arr=getimagesize($srcimage) ) {
	    	echo "要生成缩略图的文件不存在";
	    	exit;
	    }
	
	    $src_width = $arr[0];
	    $src_height = $arr[1];
	    $srcimg = null;
	    $method = getcreatemethod( $srcimage );
	    if ( $method ) {
	        eval( '$srcimg = ' . $method . ';' );
	    }
	
	    $dst_x = 0;
	    $dst_y = 0;
	    $dst_w = $dst_width;
	    $dst_h = $dst_height;
	    if ( ($dst_width / $dst_height - $src_width / $src_height) > 0 ) {
	        $dst_w = $src_width * ( $dst_height / $src_height );
	        $dst_x = ( $dst_width - $dst_w ) / 2;
	    } elseif ( ($dst_width / $dst_height - $src_width / $src_height) < 0 ) {
	        $dst_h = $src_height * ( $dst_width / $src_width );
	        $dst_y = ( $dst_height - $dst_h ) / 2;
	    }
	
	    imagecopyresampled($dstimg, $srcimg, $dst_x, $dst_y, 0, 0, $dst_w, $dst_h, $src_width, $src_height);
	
	    // 保存格式
	    $arr = array(
	        'jpg' => 'imagejpeg', 'jpeg' => 'imagejpeg', 'png' => 'imagepng'
	    );
	    $ax = explode('.', $dstimage);
	    $x = array_pop($ax);
	    $suffix = strtolower($x);
	    if (!in_array($suffix, array_keys($arr)) ) {
	        echo "保存的文件名错误";
	        exit;
	    } else {
	        eval( $arr[$suffix] . '($dstimg, "'.$dstimage.'");' );
	    }
	    imagejpeg($dstimg, $dstimage);
	    imagedestroy($dstimg);
	    imagedestroy($srcimg);
	}

	function getcreatemethod( $file ) {
		$arr = array(
	                'FFD8FF' => "imagecreatefromjpeg('$file')"
	                , '89504E' => "imagecreatefrompng('$file')"
	        );
	        $fd = fopen( $file, "rb" );
	        $data = fread( $fd, 3 );
	
	        $data = str2hex( $data );
	
	        if ( array_key_exists( $data, $arr ) ) {
	                return $arr[$data];
	        } elseif ( array_key_exists( substr($data, 0, 4), $arr ) ) {
	                return $arr[substr($data, 0, 4)];
	        } else {
	                return false;
	        }
	}

	function str2hex( $str ) {
	        $ret = "";
	
	        for( $i = 0; $i < strlen( $str ) ; $i++ ) {
				$ret .= ord($str[$i]) >= 16 ? strval( dechex( ord($str[$i]) ) ) : '0'. strval( dechex( ord($str[$i]) ) );
	        }
	
	        return strtoupper( $ret );
	}
}
