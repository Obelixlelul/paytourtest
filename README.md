# PayTout - Teste de admissão
Teste realizado com ojetivo de demonstrar conhecimento para a vaga com uso de PHP.

## Como rodar a aplicação
Crie um banco de dados MySQL com o script abaixo
```sql
CREATE DATABASE `paytour` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

CREATE TABLE `curriculos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `companyPosition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `education` varchar(45) NOT NULL,
  `observations` text,
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `send_time` timestamp NOT NULL,
  `resume_file_path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```
Clone o repositório em uma pasta acessível por um servidor Apache2
```console
$ git clone https://github.com/Obelixlelul/paytourtest.git
```
Com o Composer instalado globalmente, instale as dependências com o comando
```console
$ composer install
```

## Informações importantes
* Modificar os dados de acesso ao Banco de dados no arquivo Core/Database.php
* Garantir que o php.ini está permitindo upload de arquivos com mais de 1MB 
* O mailtrap.io está como servidor de email, certificar-se de alterar o arquivo Model/Email.php com os dados do seu servidor
* O upload dos arquivos do formulário será armazenado na pasta files

## Testes 
Para realizar testes insira o seguinte comando no terminal

```console
$ ./vendor/bin/phpunit Tests/formTest.php --colors
```
## Linuagens utilizadas
- PHP
- HTML
- CSS
- PHPMailer
- PHPUnit

## O que e aprendi com o projeto
- Como usar o PHPunit para gerar testes unitários
- Como usar o PHPMailer para disparo de emails
