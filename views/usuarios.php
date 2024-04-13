
<?php
// Aqui o PHP inicia uma sessão, e inclui o arquivo verifyLogin.php ao carregar
session_start();
if(!$_SESSION['admin']) {
  header('Location: ../../index.php');
  exit();
}
include('../models/db.php');
include('../models/administrador.php');
include('../models/conteiner.php');

include('../controllers/adminController.php');

include('../controllers/conteinersController.php');


$objectCon = new db();
  $conn = $objectCon->conectar();
  if($conn->connect_error){
    die("Connection error: ". $conn->connect_error);
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema | FlowManager</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">


  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!-- Aqui vai alguns css para corrigir bugs da tabela -->
<style>



</style>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="pageLogo">
       <i class="fa fa-user"></i>
       <h5>
<?php

 echo unserialize($_SESSION['admin'])->getUsuario();

 ?>
 

     </h5>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-legacy flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->



      
          <li class="nav-item ">
            <a href="dashboard.php" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Início
              </p>
            </a>
          </li>
   
          <li class="nav-item">
            <a href="usuarios.php" class="nav-link active">
              <i class="nav-icon fa fa-regular fa-users"></i>
              <p>
                Usuários
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="mensalidades.php" class="nav-link">
              <i class="nav-icon fa fa-receipt"></i>
              <p>
                Mensalidades
              </p>
            </a>

          </li>

                  <li class="nav-item">
            <a href="gastos.php" class="nav-link">
              <i class="nav-icon fa fa-file-invoice-dollar"></i>
              <p>
                Controle de gastos
              </p>
            </a>

          </li>

   <li class="nav-item">
            <a href="../controllers/Login/Logout.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
                            
   <p>Sair</p>
              </p>
            </a>

          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



<!-- MODAL DE REGISTRAR -->


<div id="registrarMembro" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Cadastrar um novo membro</h4>          </div>
          <div class="modal-body ">
          <form action="" method="POST" id="formCriar">

            
    <label for="regNome">Nome</label>
    <input required class="form-control" type="text" id="regNome" name="regNome">
    <br>
    <div  style="margin-left:-5%" class="d-flex justify-content-center">
      
       <label for="cliente">Data de Nascimento</label>
    <input required class="form-control" placeholder="dd-mm-yyyy" type="date" id="regDataNasc" name="regDataNasc">

 <label >Ramo</label>
        <select class="form-control" style=" text-align: center" required onchange="" id="regRamo" name="regRamo" >
          <option hidden disabled selected value="#">Selecione o tipo</option>
          <option value="Lobinho">Lobinho</option>
          <option value="Escoteiro">Escoteiro</option>

          <option value="Senior">Senior</option>
          <option value="Pioneiro">Pioneiro</option>
</select>

  
    </div>
  <br>
  <label for="regEmail">Email </label>


    <input required class="form-control"  type="email" id="regEmail" name="regEmail">

   <br>

    <div style="margin-left:-5%"  class="d-flex ">
      
     
 <label for="regCPF">CPF </label>
    <input required class="form-control"  type="text" id="regCPF" name="regCPF">

   
    <label for="regRG">RG </label>
    <input required class="form-control"  type="text" id="regRG" name="regRG">

   
    </div>

<br>
  
    <div style="margin-left:-5%" class="d-flex ">
      
     
 <label for="regEndereco">Endereço </label>
    <input required class="form-control"  type="text" id="regEndereco" name="regEndereco">

   
    <label for="regBairro">Bairro </label>
    <input style="width:35%"required class="form-control"  type="text" id="regBairro" name="regBairro">

   
    </div>

<br>
<label for="regNomeResp">Nome do responsável </label>
    <input required class="form-control"  type="text" id="regNomeResp" name="regNomeResp">

<br>

  <div style="margin-left:-5%"  class="d-flex ">
      
     
 <label for="regCPFresp">CPF Responsável </label>
    <input required class="form-control"  type="text" id="regCPFresp" name="regCPFresp">

   
    <label for="regGrauResp">Grau parentesco </label>
    <input required class="form-control"  type="text" id="regGrauResp" name="regGrauResp">

   <label for="regIsento">Isento? </label>
   
    <select  class="form-control" name="regIsento" id="regIsento">
      <option selected value="Nao"> Não</option>
      <option value="Sim"> Sim </option>
    </select>
    </div>

<br>

    </div>
          <div class="modal-footer">
          <button type="submit" name="salvarRegistro" id="salvarRegistro" class="btn btn-success">Registrar</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
    </div>

      </div>
    </div>
<!-- FIM MODAL REGISTRAR -->


<!-- MODAL EDITAR -->
<div id="editConteiner" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar</h4>          </div>
          <div class="modal-body ">
          <form action="" method="POST" id="formEdit">
 




    <label for="editNome">Nome</label>
    <input required class="form-control" type="text" id="editNome" name="editNome">
    <br>
    <div  style="margin-left:-5%" class="d-flex justify-content-center">
      
       <label for="editData">Data de Nascimento</label>
    <input required class="form-control" placeholder="dd-mm-yyyy" type="date" id="editData" name="editData">

 <label >Ramo</label>
        <select class="form-control" style=" text-align: center" required onchange="" id="editRamo" name="editRamo" >
          <option hidden disabled selected value="#">Selecione o tipo</option>
          <option value="Lobinho">Lobinho</option>
          <option value="Escoteiro">Escoteiro</option>

          <option value="Senior">Senior</option>
          <option value="Pioneiro">Pioneiro</option>
</select>

  
    </div>
  <br>
  <label for="editEmail">Email </label>


    <input required class="form-control"  type="email" id="editEmail" name="editEmail">

   <br>

    <div style="margin-left:-5%"  class="d-flex ">
      
     
    <input required class="form-control"  type="hidden" id="editCpf" name="editCpf">

   
    <input required class="form-control"  type="hidden" id="editRg" name="editRg">

   
    </div>

<br>
  
    <div style="margin-left:-5%" class="d-flex ">
      
     
 <label for="editEndereco">Endereço </label>
    <input required class="form-control"  type="text" id="editEndereco" name="editEndereco">

   
    <label for="editBairro">Bairro </label>
    <input style="width:35%"required class="form-control"  type="text" id="editBairro" name="editBairro">

   
    </div>

<br>
<label for="editNomeResp">Nome do responsável </label>
    <input required class="form-control"  type="text" id="editNomeResp" name="editNomeResp">

<br>

  <div style="margin-left:-5%"  class="d-flex ">
      
     
 <label for="editCPFresp">CPF Responsável </label>
    <input required class="form-control"  type="text" id="editCPFresp" name="editCPFresp">

   
    <label for="editGrau">Grau parentesco </label>
    <input required class="form-control"  type="text" id="editGrau" name="editGrau">

   <label for="editIsento">Isento? </label>
   
    <select  class="form-control" name="editIsento" id="editIsento">
      <option selected value="Nao"> Não</option>
      <option value="Sim"> Sim </option>
    </select>
    </div>

<br>

    </div>
          <div class="modal-footer">
          <button type="submit" name="salvarEdicao" id="salvarEdicao" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
    </div>

      </div>
    </div>

<!-- FIM MODAL EDITAR -->


<!-- MODAL APAGAR -->


<div id="deleteUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">


      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Você tem certeza?</h4>
      
        <div class="modal-body">

        <form class="formDel" action="" method="POST" id="formDel" >

       <input type="hidden"  id="delCpf" name="delCpf">
    
 </div>

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Deletar</button>

          <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
          </form>
        </div>
      </div>

    </div>
  </div>
<!-- FIM MODAL APAGAR -->
  <!-- Content Wrapper. Início do conteudo -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuários</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <button class="btn btn-success" type="button" name="button" data-toggle="modal" data-target="#registrarMembro"><i class="fa fa-plus"></i> &nbsp;  Cadastrar um novo membro</button>







<br><br>


        <select class="btn btn-outline-info filtro" name="filtroRamo" id="filtroRamo">
          <option selected disabled hidden value="">Ramo</option> 
          <option value="">Todos</option>
          <option value="Lobinho"> Lobinho</option>
          <option value="Escoteiro">Escoteiro</option>
          <option value="Senior">Sênior</option>
          <option value="Pioneiro">Pioneiro</option>

      
        </select>

<br><br>

        <table class="table table-bordered display" id="tabelaUsuarios" 
        width="100%" 
         cellspacing="0">
          <form action="" id="myform">
        <thead>
        <tr>
          <th style="width: 10%">CPF</th>
          <th>Nome</th>
          <th>Ramo</th>
          <th>Email</th>
          <th>Data de Nascimento</th>
          <th>Isento</th>
          <th>RG</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Responsável</th>
          <th>Parentesco</th> 
          <th>CPF Responsável</th>
          <th>Ações</th>
        </tr>
        </thead>
      <tbody>


      </tbody>
      </table>
      </form>




      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">


  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../assets/js/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/js/demo.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>

<!-- SCRIPT PARA INICIAR O JS DE DATATABLES, E CRIAR UMA TABELA INTERATIVA -->

<script>


  $("#regCPF,#regCPFresp,#editCPFresp").inputmask("999.999.999-99",{"placeholder": ""}); // mascara de entrada para o id
  $("#regRG").inputmask("99.999.999-9",{"placeholder": ""}); // mascara de entrada para o id



  $(function(){





  var table =  $('#tabelaUsuarios').DataTable({
          "language": {
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
              "sNext": "Próximo",
              "sPrevious": "Anterior",
              "sFirst": "Primeiro",
              "sLast": "Último"
          },
          "oAria": {

              "sSortAscending": ": Ordenar colunas de forma ascendente",
              "sSortDescending": ": Ordenar colunas de forma descendente"
          }},
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
    "fixedColumns": true,
      "scrollX":        true,
        "scrollCollapse": true,
      "autoWidth": true,
      "responsive": false,
      "serverSide": true,
      "processing": true,
      "ajax": '../controllers/db/getUsuarios.php',
      "columnDefs": [

      {"render": acoes, "data": null, "targets": [12]},

      ],
    });

function acoes() {
            return '<button id="userDelete" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="userEdit" type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="verMensalidade" type="button" class="btn btn-info"><i class="fa fa-search"></i></button>';



}







// buscas por parametros



    var parametroUrl = function parametroUrl(sParam) {
           var sPageURL = decodeURIComponent(window.location.search.substring(1)),
               sURLVar = sPageURL.split('&'),
               sParametNome,
               i;

           for (i = 0; i < sURLVar.length; i++) {
               sParametNome = sURLVar[i].split('=');

               if (sParametNome[0] === sParam) {
                   return sParametNome[1] === undefined ? true : sParametNome[1];
               }
           }
       };
       // Isto serve para impedir a visualização de conteudo
       //ao carregar a página, e forçar o filtro por numero

    var idnum = parametroUrl("numero");

 if (idnum != null) {
    table.rows().search(idnum, true, true).draw();
                }

    else{
        table.rows().search('').draw();

                }






table.on('click','#verMensalidade',function(){
   $tr=$(this).closest('tr');

      var data = table.row($tr).data();

    var id = data[0];
location.href="mensalidades.php?usuario="+id;
     });


// fim buscas
// ajax para os filtros



// fim ajax



//lida com o form Editar

$('#formEdit').validate({
      rules: {
        editRg: { required: true, minlength:9},
        editCPF: {required: true, minlength: 9},
        editCPFresp: {required: true, minlength:9}
      },
      messages: {
        editRg: { required: 'Preencha o RG corretamente!'},
        editCPF: {required: 'Preencha o CPF corretamente!'},
        editCPFresp: {required: 'Preencha o CPF corretamente!'}
    },
      submitHandler: function( form){



var nome = $('#editNome').val();
var dataNasc = $('#editData').val();
var ramo = $('#editRamo').val();
var email = $('#editEmail').val();
var cpf = $('#editCpf').val();
var rg = $('#editRg').val();
var endereco = $('#editEndereco').val();
var bairro = $('#editBairro').val();
var nomeresp = $('#editNomeResp').val();
var cpfresp = $('#editCPFresp').val();
var grau = $('#editGrau').val();
var isento = $('#editIsento').val();



 $.ajax({
        url: '../controllers/data/usuarios/editUser.php',
        type: 'post',
        data: {
          nome: nome,
          dataNasc: dataNasc,
          ramo: ramo,
          email: email,
          cpf: cpf,
          rg: rg,
          endereco: endereco,
          bairro: bairro,
          nomeresp: nomeresp,
          cpfresp: cpfresp,
          grau: grau,
          isento: isento

                },
        dataType: 'text',
        success:function(response){

  toastr.success('Dados alterados!');
  table.ajax.reload();
    $('#editConteiner').modal('hide');

                 },

                 error:function(response){
                  console.log(response)
  toastr.error('Erro ao editar!');
    table.ajax.reload();

                 }





        });



        return false;
      },
      errorPlacement: function(){
            return false;  
        }
    });



  
          $("#filtroRamo").on('change',function() 
{
table.column(2).search(this.value).draw();


  });




// lida com o formulario do modal Registrar

  $('#formCriar').validate({
      rules: {
        regRG: { required: true, minlength:9},
        regCPF: {required: true, minlength: 9},
        regCPFresp: {required: true, minlength:9}
      },
      messages: {
        regRG: { required: 'Preencha o RG corretamente!'},
        regCPF: {required: 'Preencha o CPF corretamente!'},
        regCPFresp: {required: 'Preencha o CPF corretamente!'}

      },
      submitHandler: function( form,e ){
        e.preventDefault();

var nome = $('#regNome').val();
var dataNasc = $('#regDataNasc').val();
var ramo = $('#regRamo').val();
var email = $('#regEmail').val();
var cpf = $('#regCPF').val();
var rg = $('#regRG').val();
var endereco = $('#regEndereco').val();
var bairro = $('#regBairro').val();
var nomeresp = $('#regNomeResp').val();
var cpfresp = $('#regCPFresp').val();
var grau = $('#regGrauResp').val();
var isento = $('#regIsento').val();


 $.ajax({ 
        url: '../controllers/data/usuarios/createUser.php',
        type: 'post',
        data: {

          nome: nome,
          dataNasc: dataNasc,
          ramo: ramo,
          email: email,
          cpf: cpf,
          rg: rg,
          endereco: endereco,
          bairro: bairro,
          nomeresp: nomeresp,
          cpfresp: cpfresp,
          grau: grau,
          isento: isento
                },
        dataType: 'text',
        success:function(response){

  toastr.success('Membro registrado!');
  table.ajax.reload();
    $('#registrarMembro').modal('hide');
$("#formCriar")[0].reset();

                 },

                 error:function(response){
                  console.log(response)
  toastr.error('Erro ao cadastrar!');
    table.ajax.reload();

                 }





        });


        
      },
      errorPlacement: function(){
            return false;  
        }
    });






 /// lida com evento de clique do botao Editar na tabela
 /// puxa os dados da linha e salva numa array, e insere os dados nos inputs da modal

     table.on('click','#userEdit',function(){

      $tr=$(this).closest('tr');

      var data = table.row($tr).data();

$('#editCpf').val(data[0]);
$('#editNome').val(data[1]);
$('#editRamo').val(data[2]);
$('#editEmail').val(data[3]);
$('#editData').val(data[4]);
$('#editIsento').val(data[5]);
$('#editRg').val(data[6]);
$('#editEndereco').val(data[7]);
$('#editBairro').val(data[8]);
$('#editNomeResp').val(data[9]);
$('#editGrau').val(data[10]);
$('#editCPFresp').val(data[11]);


// pega o ID do conteiner e abre modal de verificacao
    $('#editConteiner').modal('show');
    });


table.on('click', '#userDelete', function(){

$tr=$(this).closest('tr');

var id = table.row($tr).data()[0];
$("#delCpf").val(id);
$("#deleteUsuario").modal('show');


})


$("#formDel").on('submit',function(e){

e.preventDefault();

var getcpf = $('#delCpf').val();


 $.ajax({
        url: '../controllers/data/usuarios/delUser.php',
        type: 'post',
        data: {cpf:getcpf},
        dataType: 'text',
        success:function(response){

toastr.success('Usuario excluido!');
$("#deleteUsuario").modal('hide');
table.ajax.reload();


                 },

                 error:function(response){
                  console.log(response)
  toastr.error('Erro ao excluir!');
                 }





        });
});




  });


</script>


</body>
</html>
