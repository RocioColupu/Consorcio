<?php
    session_start();
    require_once ('../controlador/serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<?php
    require_once '../modelo/usuario.entidad.php';
    require_once '../controlador/usuario.model.php';

    //LOGICA
    $alm = new Usuario();
    $model = new UsuarioModel();
    if(isset($_REQUEST['action'])){
        switch($_REQUEST['action']){
            case 'actualizar':
                $alm->__SET('idusuario', $_REQUEST['idusuario']);
                $alm->__SET('usuario', $_REQUEST['usuario']);
                $alm->__SET('correo', $_REQUEST['correo']);
                $alm->__SET('clave', $_REQUEST['clave']);
                $alm->__SET('reclave', $_REQUEST['reclave']);
                $alm->__SET('descripcion', $_REQUEST['descripcion']);
                $model->Actualizar($alm);
                header('Location: EditarUser.php');
                break;

            case 'registrar':
                $alm->__SET('idusuario', $_REQUEST['idusuario']);
                $alm->__SET('usuario', $_REQUEST['usuario']);
                $alm->__SET('correo', $_REQUEST['correo']);
                $alm->__SET('clave', $_REQUEST['clave']);
                $alm->__SET('reclave', $_REQUEST['reclave']);
                $alm->__SET('descripcion', $_REQUEST['descripcion']);               
                $model->Registrar($alm);
                header('Location: EditarUser.php');
                break;

            case 'mostrar':
                $alm=$model->Obtener($_REQUEST['idusuario']);
                break;
        }
    }
?>
<!DOCTYPE HTML>
<html lang="es-pe">
	<head>
		<title>BIENVENIDOS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
           <div class="row">
                <div class="col-md-2">
                <img src="img/consorcio.png" class="img img-responsive"><br><br>
                        <a href="#" class="btn btn-info btn-block" role="button">Foros</a> 
                        <a href="#" class="btn btn-info btn-block" role="button">Personal</a>
                        <a href="#" class="btn btn-info btn-block" role="button">Normas técnicas</a>
                        <a href="#" class="btn btn-info btn-block" role="button">Boletines</a>
                        <a href="#" class="btn btn-info btn-block" role="button">Sistema ISO</a>
                        <a href="#" class="btn btn-info btn-block" role="button">Sugerencias</a>
                        <a href="../controlador/logout.php" class="btn btn-danger btn-block" role="button">Cerrar sesión</a>
                      
                </div>
                <div class="col-md-9">
                    <h1 class="text-center">CONSORCIO</h1>
                   <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="iniciar.php">CONSORCIO</a>
                            </div>
                                <ul class="nav navbar-nav">
                                <li><a href="panel.php">Inicio</a></li>
                                <li><a href="registro.php">Registro</a></li>
                                <li><a href="lista.php">Lista</a></li>
                                <li><a href="consulta.php">Consulta</a></li>
                                <li class="active"><a href="Editaruser.php">Editar</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                    <div class="col-md-12">
                            <form action="?action=<?php echo $alm->idusuario ? 'actualizar' : 'registrar'; ?>" method="post" role="form" enctype="multipart/form-data">
                                <center><h2>Actualizacion de Datos usuario</h2></center>
                                <fieldset class="form-group">
                                    <input type="hidden" name="idusuario" placeholder="Código " required size="10" class="form-control" value="<?php echo $alm->__GET('idusuario'); ?>"><br>
                                    <label for="usuario" >Nuevo Usuario :</label>
                                    <input type="text" name="correo" placeholder="Correo" required size="50" class="form-control" value="<?php echo $alm->__GET('correo'); ?>"><br>
                                    <label for="clave" >Nueva Clave :</label>
                                    <input type="password" name="clave" placeholder="Clave" required size="50" class="form-control" value="<?php echo $alm->__GET('clave'); ?>"><br>
                                    <label for="reclave" >Confirmar Nueva Clave :</label>
                                    <input type="password" name="reclave" placeholder="Confirmar Clave" required size="50" class="form-control" value="<?php echo $alm->__GET('reclave'); ?>"><br>
                                    <label for="descripcion" >Nueva Descripcion :</label>
                                    <input type="text" name="descripcion" placeholder="Descripcion" required size="50" class="form-control" value="<?php echo $alm->__GET('descripcion'); ?>"><br>
                                    <br>
                                    <br>
                                    <br>
                                </fieldset>
                                 <center>
                                     <input type="submit" value="Actualizar Datos"><br><br>
                                 </center>
                            </form>
                        </div>
                    </div>             
                    <div class="row">
                        <div class="col-md-12">	
                            <header>
                                <h2>REGISTRO</h2>
                            </header>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>USUARIO</th>
                                        <th>CORREO</th>
                                        <th>CLAVE</th>
                                        <th>RECLAVE</th>
                                        <th>DESCRIPCION</th>	
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php foreach($model->Listar() as $r): ?>
                                <tr>
                                    <td><?php echo $r->__GET('idusuario'); ?></td>
                                    <td><?php echo $r->__GET('usuario'); ?></td>
                                    <td><?php echo $r->__GET('correo'); ?></td>
                                    <td><?php echo $r->__GET('clave'); ?></td>
                                    <td><?php echo $r->__GET('reclave'); ?></td>
                                    <td><?php echo $r->__GET('descripcion'); ?></td>
                                    <td>
                                        <a href="?action=mostrar&idusuario=<?php echo $r->idusuario; ?>">Editar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        
                    </div>       
                </div>
                <div class="col-md-1">
                    <header>
                        <h2><small>Bienvenido </small><b><?php echo $_SESSION['usuario']; ?></b></h2>
					</header>                   
                </div>
            </div>
        </div>
        <div class="container">
           <div class="row">
               <div class="col-md-12">
                   				
				</div>			
            </div>
        </div>			
	</body>
</html>
<?php
}
else{
echo '<script>window.location="iniciar.php"; </script>';
}
$profile=$_SESSION['usuario'];
?>
