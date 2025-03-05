<?php

class Aluno_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($aluno_id)
    {
        if (!$this->is_valid_id($aluno_id)) {
            return null;
        }

        $this->db->select('*');
        $this->db->from('alunos');
        $this->db->where('id', $aluno_id);
        $query = $this->db->get();

        return $query->row();
    }

    private function is_valid_id($id)
    {
        return !empty($id) && is_numeric($id);
    }
}
