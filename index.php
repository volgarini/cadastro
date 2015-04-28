<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Pessoa</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
        <form action="cadastro.php" method="POST" class="form-horizontal">
            <div class="tab-content">
                <div class="tab-pane active" id="access">
                    <div class="form-group">
                        <label for="nome" class="col-sm-1 control-label">Nome: </label>
                        <div class="col-sm-3">
                            <input type="text" name="nome" value="" id="nome" class="form-control" required="" placeholder="Entre com o Nome">                
                        </div>  
                    </div>
                    <div class="form-group">
                        <label for="endereco" class="col-sm-1 control-label">Endereço: </label>
                        <div class="col-sm-3">
                            <input type="text" name="endereco" value="" id="endereco" class="form-control" required="" placeholder="Entre com o Endereço">                
                        </div>  
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-1 control-label">Email: </label>
                        <div class="col-sm-3">
                            <input type="text" name="email" value="" id="email" class="form-control" required="" placeholder="Entre com o Email">                
                        </div>  
                    </div>
                    <div class="form-group">
                        <label for="telefone" class="col-sm-1 control-label">Telefone Fixo: </label>
                        <div class="col-sm-3">
                            <input type="text" name="telefone" value="" id="telefone" class="form-control" required="" placeholder="Entre com o Telefone Fixo">                
                        </div>  
                    </div>
                    <div class="form-group">
                        <label for="trabalho" class="col-sm-1 control-label">Telefone Trabalho: </label>
                        <div class="col-sm-3">
                            <input type="text" name="trabalho" value="" id="trabalho" class="form-control" placeholder="Entre com o Telefone Trabalho">                
                        </div>  
                    </div>
                    <div class="form-group">
                        <label for="celular" class="col-sm-1 control-label">Celular: </label>
                        <div class="col-sm-3">
                            <input type="text" name="celular" value="" id="celular" class="form-control" placeholder="Entre com o Celular">                
                        </div>  
                    </div>

                    <input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success">
                </div>
            </div>
        </form>
    </body>
</html>



