<?php

require_once 'C:\xampp\htdocs\Restaurante\models\Usuario.php'; 
class UsuarioController
{
  private $model;

  public function __construct()
  {
    $this->model = new Usuario();
  }

  public function login()
  {
    $this->model->setCorreo($_POST['correo']);
    $this->model->setClave($_POST['clave']);
    $this->model->login();
    //si hay algo en error en el modelo retornarlo
    if ($this->model->getError()) {
      return $this->model->getError();
    }
  }
  public function index()
  {
    $registros = $this->model->searchUser();
    return $registros;
  }

  public function create()
  {
    $this->model->setNombre($_POST['nombre']);
    $this->model->setApellido($_POST['apellido']);
    $this->model->setCedula($_POST['Documento']);
    $this->model->setTelefono($_POST['telefono']);
    $this->model->setCorreo($_POST['correo']);
    $this->model->setClave($_POST['clave']);
    $this->model->setRol($_POST['IdRol']);

    if (!$this->validarContrasena($_POST['clave']) && !$this->validarCorreo()){
          //echo "Contraseña con parámetros no válidos";
          return false;
    }

     if ($this->model->RegistrarUser()) {
       
          return true;
    }
  }
  
  public function validarCorreo() {
  $posArroba = strpos($_POST['correo'], '@');
  if ($posArroba !== false) {
      $dominio = substr($_POST['correo'], $posArroba + 1);
      if (strlen($dominio) > 5) {
          return true;
          //echo "El campo después del '@' tiene más de 5 caracteres.";
      } else {
        return false;
          //echo "El campo después del '@' no cumple con el requisito de longitud.";
      }
  } else {
    return false;
      //echo "La dirección de correo electrónico no es válida.";
  }
}

  public function validarContrasena($contrasena) {
    // Verificar si contiene al menos un carácter especial
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $contrasena)) {
        return false;
    }
    
    // Verificar si contiene al menos una mayúscula
    if (!preg_match('/[A-Z]/', $contrasena)) {
        return false;
    }
    
    // Verificar si contiene al menos un número
    if (!preg_match('/\d/', $contrasena)) {
        return false;
    }
    
    // Si pasa todas las validaciones, la contraseña es segura
    return true;
}

  public function edit()
  {
    $this->model->setId($_GET['id']);
    $this->model->setNombre($_POST['nombre']);
    $this->model->setApellido($_POST['apellido']);
    $this->model->setCorreo($_POST['correo']);
    $this->model->setTelefono($_POST['telefono']);
    $this->model->setCedula($_POST['Documento']);
    $this->model->setRol($_POST['IdRol']);

    $respuesta = $this->model->EditUser();
    if ($respuesta) {
      header('Location: /Restaurante/views/admin/usuarios/BuscarUsuario.php');
    } else {
      echo "Error al editar usuario";
    }
  }

  public function delete()
  {
    $id = $_GET['id'];
    $this->model->setId($id);
    $respuestas = $this->model->deleteUser();
    if ($respuestas) {
      header('Location: /Restaurante/views/admin/usuarios/BuscarUsuario.php');
    } else {
      echo "Error al eliminar el usuario";
    }
  }

  public function search($campo, $valor)
  {
    $usuario = new Usuario();

   

    return $registros = $usuario->searchUserF($campo, $valor);
  }

  public function cerrarSesion()
  {
      session_start();
      session_unset();
      session_destroy();
  }
}

?>