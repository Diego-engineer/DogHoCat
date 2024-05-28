<?php
require '../../../tcpdf/tcpdf.php'; 

require_once('../../../Modelo/conexionBD.php');

class MYPDF extends TCPDF {

    public function LoadData() {
        $conexion = new conexionBD();

        if ($conexion->abrir() === 0) {
            die('Database connection error: ' . mysqli_connect_error());
        }

        $sql = "SELECT * FROM tbl_dinero";
        $conexion->consulta($sql);

        if (!$conexion->obtenerResult()) {
            die('Query error: ' . mysqli_error($conexion->obtenerConexion()));
        }

        $result = $conexion->obtenerResult();

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = array(
                $row['id_dinero'],
                $row['Documento'],
                $row['Tipo_Donacion'],
                $row['Valor'],
                $row['Lugar'],
                $row['Fecha'],
            );
        }

        return $data;
    }

    public function ColoredTable($header, $data) {
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');

        $colWidth = $this->getPageWidth() / count($header);

        foreach ($header as $col) {
            $this->Cell($colWidth, 7, $col, 1, 0, 'C', 1);
        }
        $this->Ln();

        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell($colWidth, 6, $col, 1, 0, 'C');
            }
            $this->Ln();
        }
        $this->Cell($colWidth * count($header), 0, '', 'T');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(800, 500), true, 'UTF-8', false);

$pdf->SetMargins(0, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('DogoCat');
$pdf->SetTitle('Reporte de Donaciones');
$pdf->SetSubject('Dogocat');
$pdf->SetHeaderMargin(8); 
$pdf->SetHeaderData('icono.jpg', 200, 'Reporte de Donaciones', 'Lista de Donaciones registradas en DogoCat');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();

$header = array('ID', 'Documento', 'Tipo De Donacion', 'Cantidad', 'Lugar', 'Fecha');

$data = $pdf->LoadData();

$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

$pdf->Output('Reporte De Donacion De Dinero.pdf', 'I');
?>