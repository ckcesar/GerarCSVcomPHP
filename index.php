<?php

$con = \Yii::$app->db; //conexão com banco de dados;

$sqlate = $con->createCommand("select * from customer ");
$resposta = $sqlate->queryAll();

$arquivo1 = fopen('arquivo/relme.csv', 'w');      //Abrir o arquivo, limpa-lo e escrever uma nova linha;
$arquivo2 = fopen('arquivo/relme.csv', 'a+','1'); // escrever linhas a partir da segunda posição;

$dados = array(
    array('Código','Nome','Inscrição Estadual','CNPJ','Status','Rua','Bairro','Numéro','CEP','Cidade','Estado','Data de Cadastro','Data de Alteração')
);

if($arquivo1){

    foreach($dados as $linha1){
      fputcsv($arquivo1, $linha1);
    }
    fclose($arquivo1);

    foreach ($resposta as $linha2) {
        fputcsv($arquivo2, $linha2);
    }
    fclose($arquivo2);
}