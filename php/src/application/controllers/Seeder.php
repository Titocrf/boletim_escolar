<?php

class Seeder extends CI_Controller
{
    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        // Cria as tabelas se elas não existirem
        $this->create_tables();

        // Limpa os dados existentes nas tabelas
        $this->clear_tables();

        // Insere os dados nas tabelas
        $this->insert_data();

        echo "Dados inseridos com sucesso!";
    }

    private function create_tables()
    {
        $this->db->query("
            CREATE TABLE IF NOT EXISTS alunos (
                id SERIAL PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                matricula VARCHAR(20) UNIQUE NOT NULL
            );
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS disciplinas (
                id SERIAL PRIMARY KEY,
                nome VARCHAR(100) NOT NULL
            );
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS notas (
                id SERIAL PRIMARY KEY,
                aluno_id INT REFERENCES alunos(id),
                disciplina_id INT REFERENCES disciplinas(id),
                nota DECIMAL(4,2) NOT NULL
            );
        ");
    }

    private function clear_tables()
    {
        $this->db->query('TRUNCATE TABLE notas CASCADE');
        $this->db->query('TRUNCATE TABLE alunos CASCADE');
        $this->db->query('TRUNCATE TABLE disciplinas CASCADE');
    }

    private function insert_data()
    {
        $this->db->insert_batch('disciplinas', [
            ['id' => 1, 'nome' => 'Matemática'],
            ['id' => 2, 'nome' => 'Português'],
            ['id' => 3, 'nome' => 'Ciências']
        ]);

        $this->db->insert_batch('alunos', [
            ['id' => 1, 'nome' => 'Thiago Dionisio', 'matricula' => '123456'],
            ['id' => 2, 'nome' => 'Aline Moraes', 'matricula' => '156456']
        ]);

        $this->db->insert_batch('notas', [
            ['aluno_id' => 1, 'disciplina_id' => 1, 'nota' => 8.5],
            ['aluno_id' => 1, 'disciplina_id' => 2, 'nota' => 7.5],
            ['aluno_id' => 1, 'disciplina_id' => 3, 'nota' => 9]
        ]);
    }
}
