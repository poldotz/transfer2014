<?php
class CustomPdf extends TCPDF {

    private $headerTitle;

    public function setHeaderTitle($text = ""){
        $this->headerTitle = $text;
    }

    public function getHeaderTitle(){
        return $this->headerTitle;
    }

    function Header() {
        //Logo
        //$this->Image('images/travel_002.png', 1, 2,35);
        $this->SetFont('courier','',8);
        $this->Cell(500,2,date('d-m-Y:H:i:s') . " - Pag. " . $this->PageNo() ,0,1,'C');
        $this->SetFont('courier','B',10);
        //Title
        $this->Cell(0,4,$this->getHeaderTitle(),0,1,'C');
        //Line break
        //$this->Ln(3);
    }

    //Page footer
    function Footer() {
        //Position at 1.5 cm from bottom
        //$this->SetY(-10);
        //courier italic 8
        //$this->SetFont('courier', 'I', 8);
        //$this->Image('images/logo2.png', 250, 190, 50);
        //$this->Image('images/logoPlimbilling.jpg', 0, 187,50);
        //Page number
        //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        //$this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    //Load data
    function LoadData($file) {
        //Read file lines
        $lines = file($file);
        $data = array ();
        foreach ($lines as $line)
            $data[] = explode(';', chop($line));
        return $data;
    }

    //Simple table
    function BasicTable($header, $data) {
        //Header
        // foreach($header as $col)
        // $this->Cell(40,7,$col,1);
        // $this->Ln();
        //Data
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }

    //Better table
    function ImprovedTable($header, $data) {
        //Column widths
        $w = array (
            40,
            35,
            40,
            45
        );
        //Header
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        //Data
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR');
            //$this->Cell($w[1], 6, $row[1], 'LR');
            //$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
            //$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
            $this->Ln();
        }
        //Closure line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    //Colored table
    function FancyTable($header, $data, $w) {
        //Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetFillColor(66, 139, 202);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('courier', '', 8);
        $pos = -1;
        $pos2 = -1;
        $pos3 = -1;
        $pos4 = -1;
        $pos5 = -1;
        $somma = 0.0;

        $this->setX(2);
        for ($i = 0; $i < count($header); $i++)
        {

            if($i<count($header))
            {
                if($header[$i] == "Autista"){
                    $pos = $i;
                }

                if($header[$i] == "Tipo")
                    $pos3 = $i;

                /*if($header[$i] == "Importo")
                    $pos4 = $i;*/

                /*if($header[$i] == "Costo")
                    $pos5 = $i;*/

                $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', 1);

            }
            /*else
            {
                if($header[$i] == "Costo")
                    $pos5 = $i;
                $this->Cell($w[$i] , 4, $header[$i], 1, 1, 'C', 1);//andiamo a capo
            }*/

        }

        $this->SetFillColor(66, 139, 202);
        $this->SetTextColor(0);
        $this->SetFont('courier', '', 8);
        //Data
        $fill = 0;
        $num = 1;
        $this->ln(8);
        foreach ($data as $row) {
            $this->setX(2);
            for ($i = 0; $i < count($row); $i++)
            {
                if($i < count($row)-1)
                {
                    if($i == 0)
                    {
                        $this->Cell(8, 6.5, $num, 0, 0, 'C', $fill);
                        if($row[$i]=="si")
                        {
                            $this->Line($this->GetX()-3,$this->GetY() + 3.25,295,$this->GetY() + 3.25);
                        }
                    }
                    else
                    {
                        if($i == $pos)
                        {
                            $this->Cell($w[$i], 6.5, $row[$i], 0, 0, 'C', $fill);
                            if(strlen($row[$i])==0)
                                $this->Line($this->GetX()-24,$this->GetY()+3.25,$this->GetX()-1,$this->GetY()+3.25);
                        }
                        else if($i == $pos3)
                        {
                            if($row[$i] == "VO")
                                $row[$pos4] = "";
                            $this->Cell($w[$i], 6.5, $row[$i], 0, 0, 'C', $fill);

                        }
                        else
                            $this->Cell($w[$i], 6.5, $row[$i], 0, 0, 'C', $fill);
                    }

                }
                else{
                    $this->Cell($w[$i] , 6.5, $row[$i], 0, 1, 'L', 0);
                }
            }
            $num=$num+1;
        }

    }
}
?>