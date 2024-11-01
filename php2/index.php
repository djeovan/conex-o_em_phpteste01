
<?php
$conn = new PDO('mysql:dbname=db_database;host=localhost', 'root', '');

$stmt = $conn->prepare("SELECT * FROM funcionario ORDER BY usuario");

$stmt->execute();

// fetchALL. Retorna um array contendo todas os registros remanescentes no conjunto de resultados(meu banco de dados)
// ->. Estou associando um retorno de um array, relacionado ao meu (banco de dados) 

$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
//PDO:: FETCH_ASSOC. Obtém uma linha de dados do conjunto de resultados e retorna-o como um array associativo
//como ja foi dito, vou elaborar um associação com os dados do (banco de dados). Cada chamada subsequente desta função retornará a -linha- seguinte do conjunto de resultados

//observe que vou tratar com mais de um elemento. foreach(). atribuido meus $results as linhas($rows)
//A cada iteração do loop, $row vai conter o valor do elemento atual do array $results.
//Assim, você pode acessar e manipular esse valor dentro do bloco de código do foreach
foreach($results as $row){

    foreach($row as $key => $value){
        echo "<strong> " . $key . " </strong> " . $value. " <br>";
    }
}





?>