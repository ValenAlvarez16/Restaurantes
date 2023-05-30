<?php
require_once 'C:\xampp\htdocs\Restaurante\models\PedidoModel.php'; 

class PedidoController{
    private $model;

    public function __construct()
    {
      $this->model = new Cocina();
    }

    public function cancel()
    {
      $id = $_GET['id'];
      $this->model->setId($id);
      $respuestas = $this->model->cancelOrder();
      if ($respuestas) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
      } else {
        echo "Error al cancelar el pedido";
      }
    }

    public function calculate()
    {
      $id = $_GET['id'];
      $this->model->setId($id);
      $respuestas = $this->model->calculatePrice();
      if ($respuestas) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
      } else {
        echo "Error al calcular el precio del pedido";
      }
    }

    public function create()
    {
      try{
        require_once('C:\xampp\htdocs\Restaurante\controllers\ProductoController.php');
        $productoController = new ProductosController();
        $registro = $productoController->search('nombre', $_POST['Comida']);
        $idproducto;
        foreach ($registro as $row){
          $idproducto = $row['Id'];
        }
        $this->model->setFecha(date("Y-m-d h:i:s"));
        $this->model->setMesa($_POST['Mesa']);
        $this->model->setIdMesero($_SESSION['id']);
        $this->model->setEstado("Preparando");
        $this->model->RegistrarPedido();
        $registro = $this->model->searchProductID($this->model->getMesa(), $this->model->getIdMesero(), $this->model->getEstado());
        $idpedido;
        foreach ($registro as $row){
          $idpedido = $row['id'];
        }
        $this->model->RegistrarPedidoProducto($idpedido, $idproducto, $_POST['Cantidad']);
        $this->model->calculatePrice();
      }catch(exception){
       echo "<script>
            alert('Ha ocurrido un error. Por favor verifique que ha llenado todos los campos');
            </script>";
      }
      
    }

  
}
?>