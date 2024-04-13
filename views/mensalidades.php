
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
include('../models/movimento.php');
include('../controllers/movimentosController.php');
include('../controllers/adminController.php');

include('../controllers/conteinersController.php');


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

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
            <a href="usuarios.php" class="nav-link">
              <i class="nav-icon fa fa-regular fa-users"></i>
              <p>
                Usuários
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="mensalidades.php" class="nav-link active">
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


  <!-- Content Wrapper. Início do conteudo -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header movHeader">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mensalidades</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       


<br><br>
<div class="filtros d-flex justify-content-left">

<!-- filtros -->
      <select class="btn btn-outline-info filtro" name="filtroRamo" id="filtroRamo">
          <option selected disabled hidden value="">Ramo</option> 
          <option value="">Todos</option>
          <option value="Lobinho"> Lobinho</option>
          <option value="Escoteiro">Escoteiro</option>
          <option value="Senior">Sênior</option>
          <option value="Pioneiro">Pioneiro</option>

      
        </select>

         <select class="btn btn-outline-info filtro" name="filtroMes" id="filtroMes">
          <option value="Janeiro">Janeiro</option>
          <option value="Fevereiro">Fevereiro</option>
          <option value="Marco">Março</option>
          <option value="Abril">Abril</option>
          <option value="Maio">Maio</option>
          <option value="Junho">Junho</option>
          <option value="Julho">Julho</option>
          <option value="Agosto">Agosto</option>
          <option value="Setembro">Setembro</option>
          <option value="Outubro">Outubro</option>
          <option value="Novembro">Novembro</option>
          <option value="Dezembro">Janeiro</option>

      
        </select>


</div> <br>

<!-- fim filtros -->

        <table class="table table-bordered display" id="tabelaMensalidades" width="100%" cellspacing="0">
          <form action="" id="myform">
   <thead>
          <th >CPF</th>
          <th>Nome</th>
          <th>Ramo</th>
          <th>Mês</th>
          <th>Pago?</th>

          <th style="width: 10%">Ações</th>
   </thead>
    
   <tfoot>
    

  
    </tfoot>
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
<script src="../plugins/datatables-buttons/js/dataTables.buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>



  $(function(){


const date = new Date();  // Ano, mês e dia
const month = date.toLocaleString('pt-BR', { month: 'long' });
const mes = month.charAt(0).toUpperCase() + month.slice(1);
$("#filtroMes").val(mes)

// dezembro





  var table =  $('#tabelaMensalidades').DataTable({
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
      "ajax": '../controllers/db/getMensalidades.php',
      "columnDefs": [

      {"render": acoes, "data": null, "targets": [5]},

      ],
    });
function acoes() {
            return '<button id="toggleMensalidade" type="button" class="btn btn-primary"><i class="fa fa-check"></i></button>';



}

$(".dt-buttons").prepend('<button class="btn btn-primary" type="button" name="button" id="registrar" data-toggle="modal" data-target="#registrarMov"><i class="fa fa-plus"></i> &nbsp;  Registrar um novo movimento</button>');




table.column(3).search(mes).draw();


$("#filtroMes").on('change',function() 
{
table.column(3).search(this.value).draw();


  });

$("#filtroRamo").on('change',function() 
{
table.column(2).search(this.value).draw();


  });



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
      

    var idnum = parametroUrl("usuario");

 if (idnum != null) { // caso nao esteja vazia, é porque há um parametro. e irá buscar.
    table.rows().search(idnum, true, true).draw();
                }

    else{ // sem parametro
        table.rows().search('').draw();

                }




moment.locale('pt-br');

table.on('click','#movConteiners',function(){
   $tr=$(this).closest('tr');

      var data = table.row($tr).data();

    var id = data[0];
location.href="conteiners.php?numero="+id;
     });



// fim parametros


   

//lida com o form Editar

$('#formEdit').on('submit', function(e){

  e.preventDefault();


var editId =$('#editId').val();
var edittipo = $('#editTipo').val();
var editdatainicio = $('#editDataI').val();
var editdatafim = $('#editDataF').val();

 $.ajax({
        url: '../controllers/data/movimentacoes/editMov.php',
        type: 'post',
        data: {id:editId,
             tipo: edittipo,
               dInicio: editdatainicio,
               dFim: editdatafim
                },
        dataType: 'text',
        success:function(response){

  toastr.success('Dados alterados!');
  table.ajax.reload();
    $('#editMov').modal('hide');

                 },

                 error:function(response){

  toastr.error('Erro ao editar!');
                 }





        });



      });




// lida com o formulario do modal Registrar

  $('#formCriar').on('submit',function(e) {
     

e.preventDefault();

var id =$('#regID').val();
var cliente = $('#regCliente').val();

var tipo = $('#regTipo').val();
var datainicio = $('#regDataInicio').val();
var datafim = $('#regDataFim').val();
var categoria = $('#regCategoria').val();

if($("#regDataInicio").val() > $("#regDataFim").val()) {
$("#regDataFim").addClass("error");
  return FALSE;

  // 

}

 $.ajax({
        url: '../controllers/data/movimentacoes/createMov.php',
        type: 'post',
        data: {id:id,
          cliente: cliente,
               tipo: tipo,
               dInicio: datainicio,
               dFim: datafim,
               categoria: categoria
                },
        dataType: 'text',
        success:function(response){

  toastr.success('Dados registrados!');
  table.ajax.reload();
    $('#registrarMov').modal('hide');
$("#formCriar")[0].reset();

                 },

                 error:function(response){

  toastr.error('Erro ao registrar!');
                 }





        });



      });






     table.on('click','#toggleMensalidade',function(){

      $tr=$(this).closest('tr');

      var data = table.row($tr).data();

let cpf = data[0];
let mes = data[3];
let condicao = data[4];
let status = '';
if(condicao == 'Nao') {
  status = 'Sim'
}
else if(condicao == 'Sim') {
  status = 'Nao'
}

$.ajax({
        url: '../controllers/data/mensalidades/toggleMens.php',
        type: 'post',
        data: {
              cpf: cpf,
              mes: mes,
              status: status

                },
        dataType: 'text',
        success:function(response){
          console.log(response)
  toastr.success('Status alterado!');
  table.ajax.reload();

                 },

                 error:function(response){

  toastr.error('Erro ao alterar!');
                 }





        });




    });



// aqui executa o ajax ao abrir o modal, e pega containers não registrados 

// Basicamente, ele executa um query SQL que busca TODOS os conteiners na tabela Conteiners
// que nao estao listadas na tabela movimentos, isto é, sem registro.
//  e retorna em JSON, no qual o AJAX atribui nas options no select do registrar.

$("#registrar").on('click',function(){


 $.ajax({
        url: '../controllers/data/movimentacoes/getMovs.php',
        type: 'get',
        dataType: 'json',
        success:function(response){ 

          var len = response.length

                $("#regID").empty();
                $("#regCliente").empty();
                $("#regID").append("<option selected hidden disabled>Selecione um conteiner</option>");


                for( var i = 0; i<=len; i++){
                    var id = response[i][0];
                    $("#regID").append("<option value='"+id+"'>"+id+"</option>");

                }




                 },

                 error:function(response){

  toastr.error('Erro em buscar dados!');
                 }





        });

});



$("#regID").on('change',function(){

var movid = $(this).val();
 $.ajax({
        url: '../controllers/data/movimentacoes/getMovCliente.php',
        type: 'post',
        data: {idf:movid},
        dataType: 'json',
        success:function(response){ 

          var len = response.length

                $("#regCliente").empty();


                for( var i = 0; i<=len; i++){
                    var cliente = response[i][0];
                    var categoria = response[i][1];
                    $("#regCliente").val(cliente);
                    $("#regCategoria").val(categoria);
                }





                 },

                 error:function(response){

  toastr.error('Erro em buscar dados!');
                 }





        });



});
table.on('click', '#movExcluir', function(){

$tr=$(this).closest('tr');

var id = table.row($tr).data()[0];
$("#idDel").val(id);
$("#delMov").modal('show');


})


$("#formDel").on('submit',function(e){

e.preventDefault();

var getid = $('#idDel').val();


 $.ajax({
        url: '../controllers/data/movimentacoes/delMov.php',
        type: 'post',
        data: {id:getid},
        dataType: 'text',
        success:function(response){

toastr.success('Movimentação deletada!');
$("#delMov").modal('hide');
table.ajax.reload();


                 },

                 error:function(response){

  toastr.error('Erro ao excluir!');
                 }





        });
});




  });





</script>


</body>
</html>
