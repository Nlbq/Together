<?php
/**
 * Class Notification
 */
class Notification {

    public static function create() {
        $_SESSION['notifications'] = array();
    }

    public static function send($message, $type, $expiry, $id="") {
        if (!empty($id)) {
            $_SESSION['notifications'][] = array('message' => $message, 'type' => $type, 'expiry' => $expiry, 'id' => $id);
        } else {
            $_SESSION['notifications'][] = array('message' => $message, 'type' => $type, 'expiry' => $expiry);
        }
    }

    public static function destroy($id) {
        for ($i=0; $i < count($_SESSION['notifications']); $i++) 
            if (isset($_SESSION['notifications'][$i]['id']))
                if ($_SESSION['notifications'][$i]['id'] == $id) {
                    unset($_SESSION['notifications'][$i]);
                    $_SESSION['notifications'] = array_values($_SESSION['notifications']);
                    return;
                }
    }

    public static function truncate() {
        $_SESSION['notifications'] = array();
    }

    public static function refresh() {
        foreach ($_SESSION['notifications'] as $key => $value)
            if ($value['expiry'] == 'once')
                unset($_SESSION['notifications'][$key]);

        $_SESSION['notifications'] = array_values($_SESSION['notifications']);
    }

    public static function display() {
        $str = '<script type=\"text/javascript\">';
        foreach ($_SESSION['notifications'] as $notification)
            if ($notification['expiry'] == 'once') {
                $str .= "$(function(){
                            new PNotify({
                                title: 'Notification',
                                text: '".addslashes($notification['message'])."',
                                type: '".$notification['type']."'
                            });
                    });";
            }

        $str .= "</script>";

        echo $str;
    }
}