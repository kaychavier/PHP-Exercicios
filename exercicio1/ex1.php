<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
</head>
<body>
    <form action="#" method="GET">
            <label>Digite, em R$, o valor da comida por quilograma: </label>
            <input type="text" name="quilo" placeholder="R$"><br>
            <label>Digite, em R$, o valor da taxa do prato: </label>
            <input type="text" name="taxa" placeholder="R$"><br>
            <label>Digite, em KG, o valor do peso do prato: </label>
            <input type="text" name="peso" placeholder="Kg"><br>
            <input type="submit" value="Enviar">
    </form>
    <?php

        //PEGANDO OS DADOS ATRAVÉS DO MÉTODO GET
        $quiloComida = $_GET["quilo"];
        $taxaPrato = $_GET["taxa"];
        $pesoPrato = $_GET["peso"];

        //TROCANDO "," POR "." CASO O USUÁRIO DIGITE OS NÚMEROS DECIMAIS COM VÍRGULA
        $quiloComida = str_replace(",", ".", $quiloComida);
        $taxaPrato = str_replace(",", ".", $taxaPrato);
        $pesoPrato = str_replace(",", ".", $pesoPrato);
        
        //INFORMANDO A OBRIGATORIEDADE DA ENTRADA DE DADOS NUMÉRICOS CASO O USUÁRIO INSIRA LETRAS 
        $regex = '/[a-zA-Z ]/';
        
        if(preg_match($regex, $quiloComida)){
            echo "Digite apenas números!";
        }
        elseif(preg_match($regex, $taxaPrato)){
            echo "Digite apenas números!";
        }
        elseif(preg_match($regex, $pesoPrato)){
            echo "Digite apenas números!";
        }
        else{
        $pesoGrama = $pesoPrato * 1000;
        $precoTotal = ($quiloComida * $pesoPrato) - $taxaPrato;
        //LIMITANDO OS NÚMEROS A DUAS CASAS DECIMAIS
        $format_precoTotal = number_format($precoTotal, 2);
        echo "O prato de " . $pesoGrama . " grama(s) custa: R$" . $format_precoTotal . "<br>";
        }

    ?>
</body>
</html>
