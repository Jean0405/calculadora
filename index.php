<?php
    session_start();

    function sumar($n1, $n2){
        $_SESSION['num1'] = ($n1 + $n2);
    }

    function restar($n1, $n2){
        $_SESSION['num1'] = ($n1 - $n2);
    }

    function multiplicar($n1, $n2){
        $_SESSION['num1'] = ($n1 * $n2);
    }

    function dividir($n1, $n2){
        if ($n2 == 0) {
            $_SESSION['num1'] = "Error";
        }elseif ($n1 == -1 and $n2 == -1 ) {
            $_SESSION['num1'] = "Error";
        }else {            
             $_SESSION['num1'] = ($n1 / $n2);
        }
    }


    if (isset($_POST['numero'])) {
        if($_POST['numero'] == "c"){
            $_SESSION['num1'] = null;
        }else if($_POST['numero'] == "+" || $_POST['numero'] == "-" || $_POST['numero'] == "*" || $_POST['numero'] == "/"){
            $_SESSION['valor1'] =  $_SESSION['num1'];
            $_SESSION['operacion'] = $_POST['numero'];
            $_SESSION['num1'] = null;
        }else if($_POST['numero'] == "←"){
            $_SESSION['num1'] = substr($_SESSION['num1'],0, -1);
        }else if($_POST['numero'] == "="){
            $_SESSION['valor2'] = $_SESSION['num1'];
            switch ($_SESSION['operacion']) {
                case '+':
                    sumar($_SESSION['valor1'], $_SESSION['valor2']);
                    break;
                case '-':
                    restar($_SESSION['valor1'], $_SESSION['valor2']);
                    break;
                case '*':
                    multiplicar($_SESSION['valor1'], $_SESSION['valor2']);
                    break;
                case '/':
                    dividir($_SESSION['valor1'], $_SESSION['valor2']);
                    break;
            }
        }else{
            if (isset($_SESSION['num1'])) {
                $_SESSION['num1'] .= $_POST['numero'];
            } else {
                $_SESSION['num1'] =  $_POST['numero'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>CALCULADORA</title>
</head>
<body>
    <form class="container-fluid bg-warning" method="POST">
        <div class="row justify-content-center" style="height:100vh">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                <h1 class="fw-bold text-light">CALCULADORA</h1>
                <input class="col-10 col-sm-6 col-md-3 col-lg-3 my-2 p-2 rounded-pill border-0" style="outline:none;" type="text" name="resultado" value="<?php echo isset($_SESSION['num1']) ? $_SESSION['num1'] :0;?>">
                <div class="col-12 col-sm-8 col-md-5 col-lg-5 mt-4 d-flex justify-content-center">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="7">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="8">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="9">
                    <input class="btn btn-danger col-1 m-1 p-1" type="submit" name="numero" value="/">
                </div>
                <div class="col-12 col-sm-8 col-md-5 col-lg-5 d-flex justify-content-center m-1">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="4">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="5">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="6">
                    <input class="btn btn-danger col-1 m-1 p-1" type="submit" name="numero" value="*">
                </div>
                <div class="col-12 col-sm-8 col-md-5 col-lg-5 d-flex justify-content-center m-1">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="1">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="2">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="3">
                    <input class="btn btn-danger col-1 m-1 p-1" type="submit" name="numero" value="-">
                </div>
                <div class="col-12 col-sm-8 col-md-5 col-lg-5 d-flex justify-content-center m-1">
                    <input class="btn btn-danger col-1 m-1 p-1" type="submit" name="numero" value="←">
                    <input class="btn btn-dark col-1 m-1 p-1" type="submit" name="numero" value="0">
                    <input class="btn btn-danger fw-bold col-1 m-1 p-1" type="submit" name="numero" value=",">
                    <input class="btn btn-danger col-1 m-1 p-1" type="submit" name="numero" value="+">
                </div>
                <div class="col-12 col-sm-8 col-md-5 col-lg-5 d-flex justify-content-center m-1">
                    <input class="btn btn-secondary col-1 m-1 p-1" type="submit" name="numero" value="c">
                    <input class="btn btn-success col-3 m-1 ms-3 p-1" type="submit" name="numero" value="=">
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>