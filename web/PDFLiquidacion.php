<?php

require('../pdf/fpdf.php');

class PDF extends FPDF {

    function LoadData($file) {
        $lines = file($file);
        $data = array();
        foreach ($lines as $line) {
            $data[] = explode(';', trim($line));
        }
        return $data;
    }

    function BasicTable($header, $data) {
        foreach ($header as $col) {
            $this->Cell(40, 7, $col, 1);
        }
        $this->Ln();
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(40, 6, $col, 1);
            }
            $this->Ln();
        }
    }

}

$pdf = new PDF();
$cabecera = array("Periodo", "Nombre", "Rut Empleado", "Dias Trabajado", "Sueldo",
    "Horas Extras", "Aguinaldo", "Bonos", "Salud",
    "Afp", "Seguro Cesantia", "Gratificacion",
    "Total Horas Trabajadas", "Alcance Liquido", "Total Haberes");
$datos = $pdf->LoadData("liquidacion.csv");
$pdf->SetFont("Arial", "I", 10);
$pdf->AddPage("L","A4");
$pdf->BasicTable($cabecera, $datos);
$pdf->Output();
