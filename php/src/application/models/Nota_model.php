<?php

class Nota_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getByAluno($aluno_id)
    {
        if (!$this->is_valid_id($aluno_id)) {
            return null;
        }

        $this->db->select('notas.*, disciplinas.nome AS disciplina');
        $this->db->from('notas');
        $this->db->join('disciplinas', 'notas.disciplina_id = disciplinas.id', 'left');
        $this->db->where('notas.aluno_id', $aluno_id);
        $query = $this->db->get();

        return $query->result();
    }

    private function is_valid_id($id)
    {
        return !empty($id) && is_numeric($id);
    }
}
