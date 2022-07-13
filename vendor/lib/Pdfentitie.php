<?php
/**
 * Class Pdfcreator
 */
class Pdfentitie extends TCPDF {

    //Private attributes
    protected $author, $title, $subject, $keywords;

    //Page header
    public function Header() {
        // Logo
        $image_file = 'assets/img/mini.png';

        $this->Image($image_file, 10, 9, 62, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        $this->SetTextColor(53,148,225);
        // Title
        // set color for background
        $this->SetFillColor(255, 255, 255);
        $this->setCellMargins(110, 8, 1, 1);
        $this->MultiCell(80, 20, 'Devis : D20120001', 0, 'R', 'C', 0, '', 0, false, 'M', 'M');

        $this->SetTextColor(155,155,155);
        $this->setCellMargins(110, 5, 1, 1);
        $this->MultiCell(80, 31, 'Créé le : 07 décembre 2020 - 15:37', 0, 'R', 'C', 0, '', 0, false, 'M', 'M');
        // $this->Cell(200, 10, 'Devis : D20120s001', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->setCellMargins(110, 5, 1, 1);
        $this->MultiCell(80, 20, 'Numéro de TVA : -', 0, 'R', 'C', 0, '', 0, false, 'M', 'M');
        // $this->Cell(200, 10, 'Devis : D20120s001', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        




    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);


        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getKeywords() {
        return $this->keywords;
    }
}