<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">
      
    <?php

      switch ($_SESSION["perfil"]) {
            
            case 'Administrador':
              # code...
              include "inicio/".$inicio;
              break;
            case 'Administrativo':
              # code...
              include "inicio/".$inicio2;
              break;
            case 'Vendedor':
              # code...
              include "inicio/".$inicio2;
              break;
            case 'Tecnico':
              # code...
               include "reportes/caja-tecnico.php";
              break;
            
           
          }
     


    ?>

    </div> 

     <div class="row">
       
        <div class="col-lg-8">

          <?php

          switch ($_SESSION["perfil"]) {
            case 'Aministrador':
              # code...
              break;
            case 'Administrativo':
              # code...
              include "reportes/grafico-ventas2.php";
              break;
            case 'Vendedor':
              # code...
              // include "reportes/grafico-ventas2.php";
              break;
            case 'Tecnico':
              # code...
              // include "reportes/grafico-ventas2.php";
              break;
            
           
          }
          

          ?>

        </div>

        <div class="col-lg-4">

          <?php

           switch ($_SESSION["perfil"]) {
            case 'Aministrador':
              # code...
              // include "reportes/grafico-ventas2.php";
              break;
            case 'Administrativo':
              # code...
              // include "reportes/grafico-ventas.php";
              break;
            case 'Vendedor':
              # code...
              // include "reportes/grafico-ventas.php";
              break;
            case 'Tecnico':
              # code...
              // include "reportes/grafico-ventas2.php";
              break;
            
           
          }
           

        

          ?>

        </div>

       
         </div>

     </div>

  </section>
 
</div>

