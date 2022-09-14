Para instalar as dependencias
>Composer Install 

> Garantir que o php.ini está permitindo upload de arquivos com mais de 2MB

> É usado o mailtrap.io como servidor de email, lembrar de modificar os dados
da classe Email para os dados do seu servidor.
email para os seus dados.

> Para realizar os testes, usar o comando
./vendor/bin/phpunit Tests/formTest.php --colors

> O upload dos arquivos será feito na pasta files
