<?php
/**
 * Class Autoloader
 */
class Html {

    public static function css($file) {
        if (gettype($file) == 'array') {
            foreach ($file as $element) {
                if ($element[0] == '!') {
                    echo "\t" . '<link rel="stylesheet" type="text/css" href="'. T_HOST . '/' . substr($element, 1).'.css">' . "\n";
                } else {
                    echo "\t" . '<link rel="stylesheet" type="text/css" href="'. T_HOST .'/assets/css/'.$element.'.css">' . "\n";
                }
            }
        } else {
            if ($file[0] == '!') {
                echo "\t" . '<link rel="stylesheet" type="text/css" href="'. T_HOST . '/' . substr($file, 1).'.css">' . "\n";
            } else {
                echo "\t" . '<link rel="stylesheet" type="text/css" href="'. T_HOST .'/assets/css/'.$file.'.css">' . "\n";
            }
        }
    }

    public static function icon($file) {
        echo "\t" . '<link rel="icon" href="'.T_HOST.'/assets/img/icons/'.$file.'.ico">' . "\n";
    }

    public static function fonts($file) {
        echo "\t" . '<link href="'.$file.'" rel="stylesheet">' . "\n";
    }

    public static function js($file) {
        if (gettype($file) == 'array') {
            foreach ($file as $element) {
                if ($element[0] == '!') {
                    echo "\t" . '<script type="text/javascript" src="'.substr($element, 1).'.js"></script>' . "\n";
                } else {
                    echo "\t" . '<script type="text/javascript" src="'. T_HOST .'/assets/js/'.$element.'.js"></script>' . "\n";
                }
            }
        } else {
            if ($file[0] == '!') {
                echo "\t" . '<script type="text/javascript" src="'.substr($file, 1).'.js"></script>' . "\n";
            } else {
                echo "\t" . '<script type="text/javascript" src="'. T_HOST .'/assets/js/'.$file.'.js"></script>' . "\n";
            }
        }
    }

    public static function img($path, $alt='', $class="", $id="") {
        if (!empty($class))
            echo '<img src="'.T_HOST.'/assets/img/'.$path.'" alt="'.$alt.'" class="'.$class.'">';
        elseif(!empty($class) && !empty($id))
            echo '<img src="'.T_HOST.'/assets/img/'.$path.'" alt="'.$alt.'" class="'.$class.'" id="'.$id.'">';
        elseif(!empty($id))
            echo '<img src="'.T_HOST.'/assets/img/'.$path.'" alt="'.$alt.'" id="'.$id.'">';
        else
           echo '<img src="'.T_HOST.'/assets/img/'.$path.'" alt="'.$alt.'">'; 
    }

    public static function input($name, $label, $type="text", $placeholder="", $value='') {
        if ($type == 'textarea') {
            $str = '<div class="form-group">';
            $str .= '<label for="" class="mt-1 mb-1">'.$label.'</label>';
            $str .= '<textarea class="form-control mb-2" name="'.$name.'" id="" placeholder="'.$placeholder.'">'.$value.'</textarea>';
            $str .= '</div>';
        }else {
            $str = '<div class="form-group">';
            $str .= '<label for="" class="mt-1 mb-1">'.$label.'</label>';
            $str .= '<input type="'.$type.'" class="form-control mb-2" name="'.$name.'" id="" placeholder="'.$placeholder.'" value="'.$value.'" />';
            $str .= '</div>';
        }
        	
    	echo $str;
    }

    public static function select($name, $label, $data, $placeholder="", $dakey="", $value="") {
    	$str = '<div class="form-group">';
    	$str .= '<label for="">'.$label.'</label>';
    	$str .= '<select class="form-control form-control-lg" name="'.$name.'" >';
    	$str .= '<option value="">'.$placeholder.'</option>';
    	foreach ($data as $key => $item) {
    		if ($dakey == '') {
    			$str .= '<option value="'.$key.'">'.$item.'</option>';
    		} else {
    			$str .= '<option value="'.$item[$dakey].'">'.$item[$value].'</option>';
    		}
    		
    	}
    	$str .= '</select>';
    	$str .= '</div>';

    	echo $str;
    }
}