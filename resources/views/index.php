<!DOCTYPE html>
<html lang="pt-BR" ng-app="listaContatos">
    <head>
        <title>Criando uma aplicação com Laravel 5 e AngularJS</title>

        <!-- Load Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>        
        <div ng-controller="contatosController">

            <div class="container">
                <h2>Medicos</h2>
                <!-- Tabela-para-carregar-os-dados -->
                <table class="table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Contato</th>
                            <th>Posição</th>
                            <th>CRM</th>
                            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Adicionar novo médico</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="contato in contatos">
                            <td>{{ contato.id }}</td>
                            <td>{{ contato.nome }}</td>
                            <td>{{ contato.email }}</td>
                            <td>{{ contato.contato }}</td>
                            <td>{{ contato.posicao }}</td>
                            <td>{{ contato.crm }}</td>
                            <td>
                                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', contato.id)">Editar</button>
                                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(contato.id)">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Final da Tabela-para-carregar-os-dados -->
            <!-- Modal (Pop up quando o botão de detalhes é clicado) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmContatos" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nome</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="nome" name="nome" placeholder="Nome completo" value="{{nome}}" 
                                        ng-model="contato.nome" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmContatos.nome.$invalid && frmContatos.nome.$touched">Nome é obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Endereço de e-mail" value="{{email}}" 
                                        ng-model="contato.email" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmContatos.email.$invalid && frmContatos.email.$touched">Um e-mail várlido é obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Telefone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="{{telefone}}" 
                                        ng-model="contato.telefone" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmContatos.telefone.$invalid && frmContatos.telefone.$touched">Telefone é obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Posição</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="posicao" name="posicao" placeholder="Position" value="{{posicao}}" 
                                        ng-model="contato.posicao" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmContatos.posicao.$invalid && frmContatos.posicao.$touched">Posição é obrigatório</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">CRM</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="crm" name="crm" placeholder="CRM" value="{{crm}}"
                                               ng-model="contato.crm" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmContatos.crm.$invalid && frmContatos.crm.$touched">CRM é obrigatório</span>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmContatos.$invalid">Salvar alterações</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrega bibliotecas Javascripts (AngularJS, JQuery, Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/contatos.js') ?>"></script>
    </body>
</html>