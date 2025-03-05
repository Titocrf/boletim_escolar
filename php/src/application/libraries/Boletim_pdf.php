<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'third_party/fpdf/fpdf.php');

class Boletim_pdf
{
    private $pdf;

    public function __construct()
    {
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', '', 12);
    }

    public function gerar_pdf($aluno, $notas)
    {
        // Título
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(200, 10, 'Boletim Escolar', 0, 1, 'C');

        // Corpo
        $this->pdf->SetFont('Arial', '', 12);

        // Verifica aluno
        if (empty($aluno)) {
            $this->pdf->Cell(40, 10, 'Nome: Nenhum aluno encontrado');
            $this->pdf->Output();
            return;
        }

        $this->pdf->Cell(40, 10, 'Nome: ' . utf8_decode($aluno->nome));
        $this->pdf->Ln(10);

        // Verificando notas
        if (empty($notas)) {
            $this->pdf->Cell(40, 10, 'Notas: Nenhuma nota registrada.');
            $this->pdf->Output();
            return;
        }

        //Monta as notas
        foreach ($notas as $nota) {
            $this->pdf->Cell(40, 10, 'Disciplina: ' . utf8_decode($nota->disciplina));
            $this->pdf->Ln(5);
            $this->pdf->Cell(40, 10, 'Nota: ' . utf8_decode($nota->nota));
            $this->pdf->Ln(10);
        }

        $this->pdf->Output();
    }
}
