<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>
    <form action="#" method="GET">
        <label>Insira uma lista de dados: </label>
        <input type="text" name="dados" placeholder="Insira os dados"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        
        if(isset($_GET["dados"]))
        {
            //PEGANDO OS DADOS ATRAVÉS DO MÉTODO GET
            $dados = $_GET["dados"];
            $dados = str_replace(",", "", $dados);
            //EXPLODINDO OS DADOS DE FORMA QUE VIRE UM ARRAY
            $exDados = explode(" ", $dados);
            //CONTANDO QUANTOS DADOS EXISTEM NO ARRAY
            $qtdDados = count($exDados); 
          
            $i = 0;
            //EXPRESSÃO REGULAR PARA IDENTIFICAR SE O DADO É NUMÉRICO OU STRING
            $regex = '/[a-zA-Z ]/';
            $regex2 = '/[0-9 ]/';
        
            //ESTRUTURA DE REPETIÇÃO PARA ENCAMINHAR O DADO PARA SUA RESPECTIVA LISTA CONFORME SEU TIPO
            while($i <= $qtdDados){
               
                if(preg_match($regex, $exDados[$i])) {
                    $listaString[$i] = $exDados[$i];
                }
                
                elseif (preg_match($regex2, $exDados[$i])){
                    $listaNumeros[$i] = $exDados[$i];
                }
                $i++;

            }
          
            //EXIBIÇÃO DA LISTA
            echo "Lista de dados numéricos: ";
            $j = 0;
            do{
                echo $listaNumeros[$j] . "<br>";
                $j++;
            }while($j <= $i);

            echo "Lista de strings: ";
            $k = 0;
            do{
                echo $listaString[$k] . "<br>";
                $k++;
            }while($k <= $i);
        }
     
        
    ?>
       
 
</body>
</html>