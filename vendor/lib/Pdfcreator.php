<?php
/**
 * Class Pdfcreator
 */
class Pdfcreator  {

    //Private attributes
    private $pdf_class, $pdf_head;

    //Constructor
    public function __construct() {


        // create new PDF document
        $this->pdf_class = new Pdfentitie(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



        // sdisplay($this->pdf_class)
        // set document information
        




        // display(PDF_HEADER_LOGO);
       

       
    }

    public function setPDFHead($array) {
        $this->pdf_head = $array;
    }

 
    public function print_pdf() {
        $this->pdf_class->SetCreator('Assistant Lozako');
        $this->pdf_class->SetAuthor($this->pdf_head[0]);
        $this->pdf_class->SetTitle($this->pdf_head[1]);
        $this->pdf_class->SetSubject($this->pdf_head[2]);
        $this->pdf_class->SetKeywords($this->pdf_head[3]);
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $this->pdf_class->Output('MonPDF.pdf', 'I');

    }


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