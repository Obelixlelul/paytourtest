Para instalar as dependencias
>Composer Install 

> Garantir que o php.ini está permitindo upload de arquivos com mais de 2MB

> É usado o mailtrap.io como servidor de email, lembrar de modificar os dados
da classe Email para os dados do seu servidor.
email para os seus dados.

> Para realizar os testes, usar o comando
./vendor/bin/phpunit Tests/formTest.php --colors

> O upload dos arquivos será feito na pasta files


## Criar o banco de dados MySQL

```
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

