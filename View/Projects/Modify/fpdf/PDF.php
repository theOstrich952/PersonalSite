<?php
    require_once '../include/databaseConnection.php';
    require('fpdf.php');

    $query = "SELECT * FROM products";
    $result = mysqli_query($con, $query);

    class PDF extends FPDF
    {
        //Header
        function Header()
        {
            $time = time();
            $this->Image('../images/utility/logo.jpg',10,10,60);
            $this->SetFont('Arial','',12);
            $this->MultiCell(0,5,"The Modify Store",0,0);
            $this->MultiCell(0,5,"DKIT",0,0);
            $this->MultiCell(0,5,"Dundalk",0,0);
            $this->MultiCell(0,5,"Co. Louth",0,0);
            $this->MultiCell(0,5,"Ireland",0,0);
            $this->MultiCell(0,5,"". date('d/m/y',$time) ."",0,0);
            $this->SetFont('Courier','I');
            $this->SetTextColor(34, 137, 187);
            $this->MultiCell(0,5,"Visit "."www.stancenation.com" . " for cool cars.",0,0);
        }
        //Footer
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            $this->Line(0, 280, 500, 280);
        }
    }
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 10, 10, 10);
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(10, 35);
    $pdf->Ln(12.5);
    
    
    //Heading
    $pdf->SetFont('Arial','I',30);
    $pdf->SetTextColor(000);
    $pdf->Cell(80);
    $pdf->Cell(30,10,'All Parts',0,1,'C', false);
    
    
    //Table
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(34, 137, 187);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(000);
    //$pdf->SetLineWidth(.3);
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,8,"Title",1,0,'C',true);
    $pdf->Cell(30,8,"Stock",1,0,'C',true);
    $pdf->Cell(110,8,"Details",1,0,'C',true);
    $pdf->Ln();
    
    $pdf->SetFillColor(208, 209, 209);
    $pdf->SetTextColor(0);
    $pdf->SetFont('Arial','',10);

    $fill = false;

    if($con)
    {
        while($db_field = mysqli_fetch_assoc($result))
        {
            $pdf->Cell(50,5,$db_field['title'], 'L', 0, 'L', $fill);
            $pdf->Cell(30,5,$db_field['stock'], 0, 0, 'L', $fill);
            $pdf->MultiCell(110, 5, $db_field['details'],'R','L',$fill);
            $fill =! $fill;
        }
        $pdf->Cell($db_field['details'],0,'','T');
            
        mysqli_close($con);
    }
    else
    {
        print "Error : Unable to connect to page.";
        mysqli_close($con);
    } 
    
    //Auto save.
    $pdf->Output('Parts.pdf', 'D');
?>