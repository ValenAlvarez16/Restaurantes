<!DOCTYPE html>
<html>

<head>
	<title>Página de Pedidos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/restaurante/assets/estilos.css">
</head>

<body>

<main class="d-flex">

 <?php @include 'C:\xampp\htdocs\Restaurante\views\mesero\mesero.php' ?>

<div class="container">
    <form action="" method="post">
    <div class="row mt-5">
        <div class="col text-center">
            <h1 class="text-light text-center">Realiza un pedido</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-2"> <p class="text-light text-center" >Comida: </p></div>
        <div class="col-4">
        <select class="form-select" aria-label="Default select example" name="Comida">
            <option selected>Elija su comida</option>
            <option value="Magnam Tiste">Magnam Tiste</option>
            <option value="Aut Luia">Aut Luia</option>
            <option value="Eos Luibusdam">Eos Luibusdam</option>
            <option value="Est Eligendi">Est Eligendi</option>
            <option value="Laboriosam Direva">Laboriosam Direva</option>
        </select>
        </div>
        <div class="col-2"> <p class="text-light text-center" >Cantidad: </p></div>
        <div class="col-4">
        <input type="number" class="border border-0 rounded h-100" name="Cantidad" value="1">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-2"> <p class="text-light text-center" >Bebida: </p></div>
        <div class="col-6">
        <select class="form-select" name="Bebida" aria-label="Default select example">
            <option selected>Elija su bebida</option>
            <option value="1">Pepsi 2.5 L</option>
            <option value="2">Coca Cola 2.5 L</option>
            <option value="3">Agua Saborizada</option>
            <option value="4">Champagne</option>
            <option value="5">Jugo</option>
            <option value="6">Vino</option>
        </select>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-2"> <p class="text-light text-center" >Nro de la mesa: </p></div>
        <div class="col-6">
        <select class="form-select" name="Mesa" aria-label="Default select example">
            <option selected>Opción</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
        </div>
        <div class="col">
            <input type="submit" value="Confirmar" class='button-primario bg-primario text-white'>
        </div>
        <div class="col">
        </div>
    </div>
    <div class="row mt-5">
        <?php
            require_once('C:\xampp\htdocs\Restaurante\controllers\PedidoController.php');
            $pedidoController = new PedidoController();
            if (isset($_POST['Mesa']) && isset($_POST['Comida']) && isset($_POST['Cantidad']) && isset($_POST['Bebida'])){
                $pedidoController->create();
            }
                
        ?>
    </div>
    
    </form> 
    
</div>

</main>

	<!--<script src="/restaurante/scripts/comprobarEstado.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>