<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Alumno Mesa</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
	 
    <?php
		$id=$_POST['id'];

        require 'conexion.php';
        


        $consulta_ins = "SELECT * FROM inscripcion WHERE alumno_ins='$id'";

        


        if (!($resultado_ins = mysqli_query($conexion, $consulta_ins))) {
            echo "Hubo un error en la consulta de datos de: Inscripción!";
            exit();
        }

            
        
        $consulta_al= "SELECT * FROM mesa_examen WHERE id='$id'";
            $resultado_al = mysqli_query($conexion, $consulta_al);
            $col_al= mysqli_fetch_row($resultado_al);
	?>
	<header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
   
    <br>
    <h2 align="center">Mesas Inscriptas para el Alumno:<i> <?php echo $col_al[1]?></i></h2>
    <section class="centro">
        
        <center>
        
        <table class="tabla">
        	
        	<th>Materia</th>
        	<th>Condición</th>
            <th>Asistencia</th>
            <th>Nota</th>
            <th>Fecha de Mesa</th>
            <th>Se inscribió el:</th>
            <?php
        		while ($col_ins= mysqli_fetch_row($resultado_ins)) {
        			echo "<tr align='center'>";
                        $consulta_m= "SELECT * FROM mesa_examen WHERE id='$col_ins[1]'";
                        $resultado_m = mysqli_query($conexion, $consulta_m);
                        $col_m= mysqli_fetch_row($resultado_m);


        			echo "<td>$col_m[1]</td>";
        			

        				$consulta_cond= "SELECT * FROM condicion WHERE id='$col_ins[2]'";
                        $resultado_cond = mysqli_query($conexion, $consulta_cond);
                        $col_cond= mysqli_fetch_row($resultado_cond);
        			echo "<td>$col_cond[1]</td>";

                    echo "<td>$col_ins[5]</td>";
        			echo "<td>$col_ins[6]</td>";

        			echo "<td>$col_m[6]</td>";
        			echo "<td>$col_ins[4]</td>";
                   
                   
        			echo "</tr>";
        		}
        		
        		
        		mysqli_close($conexion);
                /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */                
        	?>
        </table>
        
        </center>
    </section>
    <div align="center" style="margin-top: 0;">
        <input type="button" onclick="history.back()" name="volver" value="Volver" style=" border-radius: 4px; height: 25px;"><br>
         
    </div>
</body>
</html>