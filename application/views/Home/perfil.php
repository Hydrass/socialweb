<div class="container">
    <div class="row">
        <form action="">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default">Biografia</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default">Amigos</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default">Archivos</button>
                </div>
            </div>

        </form>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p class="lead">Hola, me llamo</p>
            <h1 class="display-4"><?php echo $user_perfil->nombre?></h1>
        </div>
    </div>

    <div class="row pub">
        <form action="">
            <div class="form-group col-md-3">
                a
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
                                      
                    foreach ($mostrar_p as $mostrar_ps){
                        $link = $user_perfil->nombre."/".$mostrar_ps->id_publicacion;
                        $link_user = $mostrar_ps->nombre."/".$mostrar_ps->id_publicacion;
                        echo "
                            <div class='jumbotron'>
                                <h3 class='display-4'><a href='$link_user'>$user_perfil->nombre</a></h3>
                                <p class='lead'>$mostrar_ps->texto</p>
                                <hr class='my-4'>
                                <p class='lead'>
                                    <a class='btn btn-primary btn-lg' href='$link' role='button'>Leer mas</a>
                                </p>
                        </div>
                        
                        ";
                        
                    }
    
                ?>

            </div>

            <div class="form-group col-md-3">
                a
            </div>
        
        </form>
    </div>
</div>