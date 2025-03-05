<?php
// Carregar a classe FPDF original
require_once(APPPATH . 'third_party/fpdf/fpdf.php');

class Pdf extends FPDF
{
    // Método para cabeçalho
    public function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Boletim Escolar - PDF', 0, 1, 'C');
        $this->Ln(5); // Quebra de linha
    }

    // Método para rodapé
    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }

    // Método para adicionar conteúdo ao PDF
    public function addBoletim($aluno, $notas)
    {
        $this->SetFont('Arial', '', 12);

        // Dados do aluno
        $this->Cell(0, 10, 'Nome: ' . $aluno->nome, 0, 1);
        $this->Cell(0, 10, 'Curso: ' . $aluno->curso, 0, 1);

        // Notas do aluno
        if (empty($notas)) {
            $this->Cell(0, 10, 'Não há notas registradas para este aluno.', 0, 1);
        } else {
            $this->Cell(0, 10, 'Nota 1: ' . $notas->nota1, 0, 1);
            $this->Cell(0, 10, 'Nota 2: ' . $notas->nota2, 0, 1);
            $this->Cell(0, 10, 'Nota 3: ' . $notas->nota3, 0, 1);
        }

        $this->Ln(10); // Quebra de linha
    }
}
