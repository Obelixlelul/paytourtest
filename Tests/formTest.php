<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use \Core\Database;
use \Model\Form;

/*
Apenas um teste unitário foi realizado suficiente para demonstrar o uso do phpunit
*/

class formTest extends TestCase
{

    //Teste para verificar se está sendo adicionado ao banco de dados
    public function testDatabaseInsertion()
    {

        $required = array(
            'nome' => 'Fulano da Silva', 
            'email' => 'Fulano@gmail.com', 
            'telefone' => '(84)998471133', 
            'cargo' => "Software Engineer", 
            'escolaridade' => "Superior",
            'resume_file_path' => "Path to file",
            'observations' => "Some observations",
            'ip' => '192.168.0.1',
            'time' => '2022-09-13 20:48:00',
        );

        $form = new Form();
        $this->assertTrue($form->addResume($required));

    }
}

?>