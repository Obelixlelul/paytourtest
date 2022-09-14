<?php

session_start();
require '../vendor/autoload.php';

// Get form inputs with sanitize methods

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$companyPosition = filter_input(INPUT_POST, 'companyPosition');
$education = filter_input(INPUT_POST, 'education', FILTER_SANITIZE_SPECIAL_CHARS);
$observations = filter_input(INPUT_POST, 'observations');
$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP);
$time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_SPECIAL_CHARS);

$errors = [];

// Input handling + file handling (Only remarks are optional)

$required = array(
    'nome' => ucfirst($name), 
    'email' => strtolower($email), 
    'telefone' => $phone, 
    'cargo' => $companyPosition, 
    'escolaridade' => $education,
    'arquivo' => $_FILES['file']['full_path']
);

// Verify if all mandatory inputs are present
foreach($required as $key => $field){
    if (!isset($field) || trim($field) == ''){
        $errors[] = ucfirst($key) .' é um campo obrigatório';
    }
}

$required['observations'] = $observations;
$required['ip'] = $ip;
$required['time'] = $time;


//Verifying extension and size of the uploaded file

$allowed = array('application/msword', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');

if($_FILES['file']['type'] !== ''){
    if (in_array($_FILES['file']['type'], $allowed)){
        if ($_FILES['file']['size'] <= 1048576){
            
            //Get the file extension
            $oldFileName = $_FILES['file']['name'];
            $findPoint = strripos($oldFileName, '.');
            $extension = substr($oldFileName, $findPoint);
    
            // Gives a random name to the file uploaded
            $fileName = substr(md5(time().rand(0, 1000)),0,10) . $extension;
            $filePath = dirname(__DIR__).'/files/'.$fileName;
            
            // Create file
            move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
            $required['resume_file_path'] = $fileName;
            
            //Changing file CHMOD to unlock file to write
            chmod($filePath, 0666);
    
        }else{
            $errors[] = "Tamanho máximo do arquivo é 1MB";
        }    
    }else {
        $errors[] = "Tipo de arquivo não permitido";
    }
} else {
    $errors[] = "Tamanho de upload não suportado pelo servidor";
}


/*
    > If there are no errors, send the success flag to index
    > If not, send the error messages to index
*/
if (empty($errors)){
    
    //Add to database

    $formModel = new Model\Form();
    $sendEmail = (new Model\Email())->send($required);

    if($formModel->addResume($required)){
        $_SESSION['success'] = true;

        //SEND EMAIL

        unset($_SESSION['error']);
        
    }else{
        $_SESSION['error'] = "Não conseguiu adicionar ao DB";
    }
    header("Location: ../");
    exit;
} else {
    $_SESSION['error'] = $errors;
    $_SESSION['inputs'] = $required;
    header("Location: ../");
    exit;    
}



 