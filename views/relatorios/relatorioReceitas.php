<?php
require('../../fpdf186/fpdf.php');
require('../../dao/manipuladados.php');

$busca = new manipuladados();
$busca->setTable("receitas");
$despesas = $busca->getAllDataTableByUser(1);



// Classe extendida da FPDF
class RelatorioPDF extends FPDF {
    function Header() {
        $titulo = "Relatório de Receitas";
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, utf8_decode($titulo), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

$pdf = new RelatorioPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 10);

$pdf->Cell(20, 10, 'ID', 1, 0, 'C');
$pdf->Cell(60, 10,utf8_decode('Descrição'), 1, 0, 'C');
$pdf->Cell(30, 10, 'Valor', 1, 0, 'C');
$pdf->Cell(40, 10, 'Data de Vencimento', 1, 0, 'C');
$pdf->Ln();

foreach ($despesas as $despesa) {
    $pdf->Cell(20, 10,utf8_decode( $despesa['id']), 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($despesa['descricao']), 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_decode($despesa['valor']), 1, 0, 'C');
    $pdf->Cell(40, 10, date('d/m/Y', strtotime($despesa['data'])), 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Output('relatorio_despesas.pdf', 'I');
?>
