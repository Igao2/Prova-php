<html>
    <meta charset="UTF-8">
<head><title>Prova</title></head>
<body>
    <form method="POST" action="#">
        Insira o codigo da carga:
        <br><br>
        <input type="text" name="codigo">
        <br><br>
        Escolha um destino:
        <br><br>
        <select name="selec">
            <option value="saopaulo">São Paulo</option>
            <option value="outros">Outros</option>
        </select>
        <br><br>
        Valor da nota:
        <input type="number" name="valor">
        <br><br>
        <input type="submit" name="sub" value="Enviar">
    </form>
</body>
</html>
<?php
if(isset($_POST['sub']))
{
    $codigo = $_POST['codigo'];
    $destino = $_POST['selec'];
    $valornota = $_POST['valor'];
   
 class Calculo {
    
    function getCodigo()
    {
        $codigo = $_POST['codigo'];
        return $codigo;
    }
    function getDestino()
    {
        $destino = $_POST['selec'];
        return $destino;
    }
    function getValor()
    {
        $valor = $_POST['valor'];
        return $valor;
    }
    function freteSp()
    {
        $val = Calculo::getValor();
        if($val<3000)
        {
            $valortotal = $val+(($val*5)/100);
            return $valortotal;
        }
        if($val>=3000 && $val<=5000)
        {
            $valortotal = $val+(($val*10)/100);
            return $valortotal;
        }
        if($val>5000)
        {
            $valortotal = $val+(($val*15)/100);
            return $valortotal;
        }
    }
    function freteOutros()
    {
        $val = Calculo::getValor();
        $valortotal = $val+(($val*20)/100);
        return $valortotal;
    }
    function ICMS()
    {
        $dest = Calculo::getDestino();
        if($dest == 'saopaulo'){
            $val= Calculo::freteSp();
            $icms = $val/0.88;
            return $icms;
        }
        else{
            $val = Calculo::freteOutros();
            $icms = $val/0.88;
            return $icms;
        }
    }
    function exibir()
    {
        $codigo = Calculo::getCodigo();
        $dest = Calculo::getDestino();
        $destino ='';
        if($dest == 'saopaulo')
        {
            $destino = 'São Paulo';
        }
        else{
            $destino = 'Outros';
        }
        $valortotal = Calculo::ICMS();
        $va = round($valortotal,2);
     
        echo "Código de Carga : $codigo <br> Destino : $destino <br> Valor Total a ser Pago: $va R$";
    }
 }
    $x= new Calculo;
    $x->exibir();
}

?>