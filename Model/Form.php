<?php

namespace Model;

use Core\Database;
use \PDOException;

class Form extends Database
{

    public function addResume($array){
        try {
            $sql = 'INSERT INTO curriculos(name, email, phone, companyPosition, education, observations, ip, send_time, resume_file_path) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
    
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$array['nome'], $array['email'], $array['telefone'], $array['cargo'], $array['escolaridade'], $array['observations'], $array['ip'], $array['time'], $array['resume_file_path']]);
            return true;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

};
