<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Boletim extends CI_Controller
{
    public $Aluno_model;
    public $Nota_model;
    public $boletim_pdf;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aluno_model');
        $this->load->model('Nota_model');
        $this->load->library('Boletim_pdf');
    }

    public function gerar_pdf($id_aluno)
    {
        $aluno = $this->Aluno_model->get($id_aluno);
        $notas = $this->Nota_model->getByAluno($id_aluno);

        $this->boletim_pdf->gerar_pdf($aluno, $notas);
    }
}
