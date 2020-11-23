<div class="container">
    <div class="row">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p class="lead">Hola, me llamo</p>
            <h1 class="display-4"><?php echo $mostrar_mas->nombre?></h1>
        </div>
    </div>

    <div class="row pub">
        <form action="">
            <div class="form-group col-md-3">
                
            </div>

            <div class="form-group col-md-6">
                <div class="form-group shadow-textarea">
                     <label for="publicar">Crear publicación</label>
                     <textarea class="form-control z-depth-1" id="publicar" rows="3" placeholder="¿Qué estás pensando, <?php echo $_SESSION['user_user']->nombre;?>?"></textarea>

                </div>

                <div>
                    <input type="file" name="file" />
                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-lg btn-block" name="publicar">Publicar</button>
                </div>
        <?php 
                foreach ($mostrar_mas_contenido as $mostrar_ps){
                        $link = $mostrar_mas->nombre."/".$mostrar_ps->id_publicacion;
                        echo "
                            <div class='jumbotron'>
                                <h3 class='display-4'><a href='$link'>$mostrar_mas->nombre</a></h3>
                                <p class='lead'>$mostrar_ps->texto</p>
                                <hr class='my-4'>
                                <p class='lead'>
                                    <a class='btn btn-primary btn-sm btn-lg' href='#' role='button'>Leer mas</a>
                                </p>
                        </div>
                        
                        ";
                        
                    }
    
                ?>
            

            </div>

            <div class="form-group col-md-3">
                
            </div>
        
        </form>
    </div>
</div>