<?php
// require dirname(dirname(__DIR__)) . "/dao/MaterialDao.php";
include("../../partials/verify-session.php");
// $materialDao = new MaterialDao();
// $materials = $materialDao->findAll();
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>Textos | GreenPack</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/vendor/dropzone/dropzone.css">
  <script src="/vendor/dropzone/dropzone.js"></script>
  <style>
    td.highlight {
      background-color: whitesmoke !important;
    }

    .text-area-control {
      border-left: 1px solid #d2d2d2;
      border-right: 1px solid #d2d2d2;
      border-top: 1px solid #d2d2d2;
    }

    #imgUpload {
      display: none;
    }
  </style>
</head>

<body class="white-edition">
  <div class="wrapper ">
    <?php include("../../partials/sidebar.php"); ?>
    <div class="main-panel">
      <?php include("../../partials/navbar.php");  ?>
      <div class="content">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Textos</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
            <div class="row">
            <div class="card__left col-4">
              <i class="fas fa-table"></i>
              Pestañas de la pagina
              </div>
             <!--  <div class="col-4">
              <select id="select-categories" class="custom-select">
                <option selected>Crear Subcategoría</option>
              </select>
            </div> -->
              <div class="card__rigth col-8 pr-5">
                  <a href="javascript:modalCreate()" class="btn btn-success text-white float-right">CREAR</a>
                </div>
            
            </div>  
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Imagen</th>
                      <th>Descripcion</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include("../../partials/footer.html"); ?>
      </div>
    </div>

     <!-- CREATE CATEGORY MODAL -->
     <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Categoría</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="mb-3 col-8">
  <!-- <label for="categoryInput">Categoría:</label> -->
  <div class="">Categoría:</div>
  <input type="text" class="form-control" id="categoryInput" placeholder="nombre de la categoría">
</div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4">Descripcion:</div>
              <div class="col-sm-8 ">
                <textarea class="form-control text-area-control" id="descriptionCategoryInputC" cols="30" rows="10"></textarea>
              </div>
            </div>
            <br>
            <div class="row" id="containerImageCategoryC">
              <div class="col-sm-4">Imagen:</div>
              <div class="col-sm-8 ">
                <img src="" id="imageCategoryC" class="img-responsive" width="300">
              </div>
            </div>
            <div class="row" id="containerImageBtnC">
              <div class="col-sm-7 "></div>
              <div class="col-sm-4"><button class="btn btn-danger" onclick="putImage('C')">Cargar Imagen</button></div>
            </div>
            <div id="imgUploadC">
              <span>Suba la imagen de la categoría:</span>
              <div id="myIdC"></div>
            </div>
            <br>
            <br>
            <div id="subcategoriesC">
              <div class="col-sm-8">Crear Subcategoría:
              <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
              </button>
              </div>
              <div class="">
              <ul id="subcat-list" class="list-group list-group-flush">
             <!--  <br> -->
</ul>
              </div>
      
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="buttonSubmitCreate">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal EDIT-->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-4">Categoría:</div>
              <div class="col-sm-8 text-capitalize" id="nameCategoryLoad"></div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4">Descripcion:</div>
              <div class="col-sm-8 ">
                <textarea class="form-control text-area-control" id="descriptionCategoryInput" cols="30" rows="10"></textarea>
              </div>
            </div>
            <br>
            <div class="row" id="containerImageCategory">
              <div class="col-sm-4">Imagen:</div>
              <div class="col-sm-8 ">
                <img src="" id="imageCategory" class="img-responsive" width="300">
              </div>
            </div>
            <div class="row" id="containerImageBtn">
              <div class="col-sm-7 "></div>
              <div class="col-sm-4"><button class="btn btn-danger" onclick="changeImage()">Cambiar Imagen</button></div>
            </div>
            <div id="imgUpload">
              <span>Suba la imagen de la categoría:</span>
              <div id="myId"></div>
            </div>

          
           <!--  <div class="col-6">
              <select id="select-subcategories" class="custom-select">
                <option selected>Subcategorías</option>
              </select>
            </div>  -->
<br>
            <div id="subcategoriesE">
              <div class="col-sm-8">Crear Subcategoría:
              <button class="btn btn-primary">
                <i class="fas fa-plus"></i>
              </button>
              </div>
              <div class="">
              <ul id="subcat-listM" class="list-group list-group-flush">
             <!--  <br> -->
</ul>
              </div>
      
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="buttonSubmitUpdate">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>


     <!-- Modal SUBCATEGORIA-->
     <div class="modal fade" id="modalSubcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Subcategoría</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-3">Categoría:</div>
              <div class="col-sm-8 text-capitalize" id="nameCategoryS"></div>
            </div>
            <br>
            <br>
            <div class="row">
            <div class="mb-3 col-8">
  <!-- <label for="categoryInput">Categoría:</label> -->
  <div class="">Subcategoría:</div>
  <input type="text" class="form-control" id="subcategoryInput" placeholder="nombre de la subcategoría">
</div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4">Descripcion:</div>
              <div class="col-sm-8 ">
                <textarea class="form-control text-area-control" id="descriptionSubcategoryInput" cols="30" rows="10"></textarea>
              </div>
            </div>
            <br>
            <div class="row" id="containerImagesubCategory">
              <div class="col-sm-4">Imagen:</div>
              <div class="col-sm-8 ">
                <img src="" id="imageSubcategory" class="img-responsive" width="300">
              </div>
            </div>
            <div class="row" id="containerImageBtnS">
              <div class="col-sm-7 "></div>
              <div class="col-sm-4"><button class="btn btn-danger" onclick="putImage('S')">Cargar Imagen</button></div>
            </div>
            <div id="imgUploadS">
              <span>Suba la imagen de la Subcategoría:</span>
              <div id="myIdS"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="buttonSubmitCreateS">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>


    <!--   Core JS Files   -->
    <script src="/js/jquery-2.2.4.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Chartist JS -->
    <script src="../../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../assets/demo/demo.js"></script>
    <script src="../../assets/js/script.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/jquery.formatCurrency-1.4.0.min.js"></script>
    <script src="/vendor/jquery.formatCurrency.all.js"></script>
    <script>
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#text-item').addClass('active')
    </script>
    <script>
      let $table
      const selectOptions = new Map();
      // Call the dataTables jQuery plugin
      $(document).ready(function() {
        $('tr td:last-child').addClass('text-center')
        $table = $('#dataTable').DataTable({
          "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          },
          "ajax": 'api/get_categories.php',
          "columnDefs": [
            {
              "targets": -1,
              render: function(data, type, row) {
                $('tr td:last-child').addClass('text-center')
                $('td img').parent().addClass('text-center')
                $('td.sorting_1').addClass('text-capitalize')
                return `<a class="text-center" href="javascript:deleteCategory(${data})"><i class="fas fa-trash-alt"></i></a>`
              }
            },
            {
              "targets": 3,
              render: function(data, type, row) {
                $('tr td:nth-child(4)').addClass('text-center')
                $('td img').parent().addClass('text-center')
                $('td.sorting_1').addClass('text-capitalize')
                return `<a class="text-center" href="javascript:modalEdit('${row.name}',${row.id},'${row.description}','${row.image}')"><i class='fas fa-pen'></i></a>`
              }
            }, {
              "targets": 1,
              render: function(data, type, row) {
                $('td img').parent().addClass('text-center')
                $('td.sorting_1').addClass('text-capitalize')
                return `<img width="120" class="text-center" src="${row.image}">`
              }
            },
            {
              'targets': 2,
              render: function(data, type, row) {
                return `<span class="text-uppercase">${row.description}</span>`
              }
            }
          ],
          "columns": [{
              "data": "name"
            },
            {
              "data": 'image'
            },

            {
              "data": "description"
            },
            {
              "data": "id"
            },
            {
              "data": "id"
            }
          ],
        })
      })


      $('td img').parent().addClass('text-center')

      let categoryId

      function modalEdit(nameCategory, idCategory, description, image) {
        console.log(image);
        $('#modalEdit').modal()
        $('#nameCategoryLoad').text(nameCategory)
        $('#descriptionCategoryInput').val(description)
        $('#imageCategory').attr('src', image)
        document.getElementById('subcat-listM').innerHTML = '';
        subcatCountE = 0;
        categoryId = idCategory;
       /*  document.getElementById('select-subcategories').innerHTML = ''; */
        loadSubcategoriesSelect(idCategory);
      }

      /* CARGA SUBCATEGORIAS */
 /*      function loadSubcategoriesSelect(idCategory) {
        const table = $('#dataTable').DataTable();

        document.getElementById('select-subcategories').insertAdjacentHTML('beforeend', 
        '<option selected>Subcategorías</option>');

        const data = Array.from(table.rows().data())
                          .filter(category => category.parentCategory == idCategory)
                          .map(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            return option;
                          })
                          .forEach(optionSubcat => document.getElementById('select-subcategories').append(optionSubcat));
      } */

      $('#buttonSubmitUpdate').click(() => {
        if (flagImage) {
          if (myDropzone.getAcceptedFiles().length > 0) {
            response = JSON.parse(myDropzone.getAcceptedFiles()[0].xhr.responseText)
            link = response.link
            ajax(link, categoryId)
          } else {
            $.notify({
              message: 'Por favor Suba una Imagen',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        } else {
          ajax($('#imageCategory').attr('src'), categoryId)
        }
      })


      function modalCreate() {
        if (myDropzone) {
           myDropzone.removeAllFiles(true);
          }
        if (subcatCount) {
          subcatCount = 0;
        }
          document.getElementById('categoryInput').value = '',
          document.getElementById('descriptionCategoryInputC').value = '',
        $('#imageCategoryC').attr('src', '')
        document.getElementById('subcat-list').innerHTML = '';
        $('#modalCreate').modal();
        document.getElementById('categoryInput').value = '',
        $('#descriptionCategoryInputC').val('')
        $('#imageCategoryC').attr('src', '')
      }

      /* EVENTO QUE MANEJA LA CREACIÓN DE UNA CATEGORÍA */

      document.getElementById('buttonSubmitCreate').addEventListener('click', (ev) => { 
        if (flagImage) {
          if (myDropzone.getAcceptedFiles().length > 0) {
            response = JSON.parse(myDropzone.getAcceptedFiles()[0].xhr.responseText)
            link = response.link;
            createRequest(link);
          } else {
            $.notify({
              message: 'Por favor Suba una Imagen',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        } else {
         
        }
       });


       /* EVENTO QUE MANEJA LA CREACIÓN DE UNA SUBCATEGORÍA */

      document.getElementById('buttonSubmitCreateS').addEventListener('click', (ev) => { 
        if (flagImage) {
          if (myDropzone.getAcceptedFiles().length > 0) {
            response = JSON.parse(myDropzone.getAcceptedFiles()[0].xhr.responseText)
            link = response.link;
            createSubcategory(link);
          } else {
            $.notify({
              message: 'Por favor Suba una Imagen',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        } else {
         
        }
       });



       /* Función que ejecuta un modal cuando se desea crear una subcategoría */
       function subcategoriaModal(category) {
         
        $('#modalSubcategoria').modal();
        document.getElementById('nameCategoryS').textContent = category.name;
        document.getElementById('nameCategoryS').dataset.id = category.id;
       }

    /*    document.getElementById('select-categories').addEventListener('click', ev => {
         const targetEl = ev.target;
          if(targetEl.tagName === 'SELECT' || targetEl === ev.currentTarget[0] ) return;
          subcategoriaModal({id: targetEl.value, name: targetEl.textContent});
       });
 */

      /* Agrega cuantas categorias el usuario desee */
      let subcatCount = 0;
       document.querySelector('#subcategoriesC button').addEventListener('click', ev => {

          const subCatList = ev.target.closest('#subcategoriesC').lastElementChild.firstElementChild;

          if (subCatList.style.display !== 'grid') {
            subCatList.style.display = 'grid';
          subCatList.style.gridTemplateColumns = '1fr 1fr';
          }

          subCatList.insertAdjacentHTML('beforeend', 
            `<li class="list-group-item">
    <label for="">Subcategoría ${++subcatCount}</label>
    <input type="text" class="form-control" placeholder="nombre">
  </li>`
          );
       });


        /*Editar categoría Agrega cuantas categorias el usuario desee */
      let subcatCountE = 0;
       document.querySelector('#subcategoriesE button').addEventListener('click', ev => {

          const subCatList = ev.target.closest('#subcategoriesE').lastElementChild.firstElementChild;

          if (subCatList.style.display !== 'grid') {
            subCatList.style.display = 'grid';
          subCatList.style.gridTemplateColumns = '1fr 1fr';
          }

          subCatList.insertAdjacentHTML('beforeend', 
            `<li class="list-group-item">
    <label for="">Subcategoría ${++subcatCountE}</label>
    <input type="text" class="form-control" placeholder="nombre">
  </li>`
          );
       });


       /* ELIMINAR CATEGORIA */
       function deleteCategory(id) {
         
        $.post('api/delete_category.php', {idCategory: id}, (data, status, xhr) => {
          if (status == 'success') {
            $('#modalCreate').modal('hide')
            $.notify({
              message: 'Se ha eliminado la categoría',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
            $table.ajax.reload()
          } else {
            $('#modalCreate').modal('hide')
            $.notify({
              message: 'No se ha eliminado la categoría',
              title: 'Error',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        }).fail(err => {
          if (err.status === 500) {
            $('#modalCreate').modal('hide')
            $.notify({
              message: 'Es posible que esta categoría tenga tenga registros asociados',
              title: 'error',
              icon: 'notification_important'
            }, {
              type: 'danger'
            })
          }
        });

       }


    </script>
    <script>
      let flagImage = false
      let myDropzone

      function changeImage() {
        flagImage = true
        $('#containerImageCategory').fadeOut()
        $('#myId').addClass('dropzone')
        $('#imgUpload').fadeIn()
        myDropzone = new Dropzone("div#myId", {
          url: "/admin/upload.php",
          method: 'post',
          paramName: 'photo',
          maxFiles: 1,
          acceptedFiles: "image/*",
          dictDefaultMessage: 'Sube tus archivos, arrastralos o haz click para buscarlos',
          dictMaxFilesExceeded: 'Solo se permite subir una imagen',
          dictInvalidFileType: 'Solo se permite imagenes'
        })
      }

      function putImage(typeLetter) {
        flagImage = true;
        $(`#containerImageCategory${typeLetter}`).fadeOut()
        $(`#myId${typeLetter}`).addClass('dropzone')
        $(`#imgUpload${typeLetter}`).fadeIn()
        myDropzone = new Dropzone(`div#myId${typeLetter}`, {
          url: "/admin/upload.php",
          method: 'post',
          paramName: 'photo',
          maxFiles: 1,
          acceptedFiles: "image/*",
          dictDefaultMessage: 'Sube tus archivos, arrastralos o haz click para buscarlos',
          dictMaxFilesExceeded: 'Solo se permite subir una imagen',
          dictInvalidFileType: 'Solo se permite imagenes'
        }) 
      }

      function ajax(link, idCategory) {

        const subcatValues = 
          Array.from(document.getElementById('subcategoriesE').querySelectorAll('input'))
                .map( input => input.value.trim().toLowerCase())
                .filter( value => value !== '');

        $.post('api/update_category.php', {
          id: idCategory,
          description: $('#descriptionCategoryInput').val(),
          image: link,
          subcategories: subcatValues
        }, (data, status) => {
          if (status == 'success') {
            $('#modalEdit').modal('hide')
            $.notify({
              message: 'Se ha actualizado la categoría',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
            console.log($table)
            $table.ajax.reload()
          } else {
            $('#modalEdit').modal('hide')
            $.notify({
              message: 'No se ha actualizado la categoría',
              title: 'Error',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        })
        .always(() => {
          document.getElementById('subcat-listM').innerHTML = '';
        });
      }

      function createRequest(linkImage) {

        const subcatValues = 
          Array.from(document.getElementById('subcategoriesC').querySelectorAll('input'))
                .map( input => input.value.trim().toLowerCase())
                .filter( value => value !== '');

        const categoryInfo = {
            nameCategory: document.getElementById('categoryInput').value,
            description: $('#descriptionCategoryInputC').val(),
            image: linkImage,
        };

         if(subcatValues.length !== 0){
          categoryInfo.categories = subcatValues;
         }

         $.post('api/create_category.php', categoryInfo, (data, status, xhr) => {
          if (status == 'success') {
            $('#modalCreate').modal('hide')
            $.notify({
              message: 'Se ha creado la categoría',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
            $table.ajax.reload()
          } else {
            $('#modalCreate').modal('hide')
            $.notify({
              message: 'No se ha creado la categoría',
              title: 'Error',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        })
        .fail((err) => {
          if (err.status === 303) {
            $('#modalCreate').modal('hide')
            $.notify({
              message: 'Ya existe una categoría con este nombre',
              title: 'error',
              icon: 'notification_important'
            }, {
              type: 'danger'
            })
          }
        })
        .always(() => {
          if (myDropzone) {
           myDropzone.removeAllFiles(true);
          }
          document.getElementById('categoryInput').value = '',
          document.getElementById('descriptionCategoryInputC').value = '',
        $('#imageCategoryC').attr('src', '')
     /*    document.getElementById('myIdC').classList.remove('dropzone'); */
       /*  $('#myIdC').addClass('dropzone') */
        });
      }


      function createSubcategory(linkImage) {
        const subcategoryInfo = {
            nameSubcategory: document.getElementById('subcategoryInput').value.trim().toLowerCase(),
            description: $('#descriptionSubcategoryInput').val(),
            image: linkImage,
            idCategory: document.getElementById('nameCategoryS').dataset.id
        };

         $.post('api/create_subcategory.php', subcategoryInfo, (data, status, xhr) => {
          if (status == 'success') {
            $('#modalSubcategoria').modal('hide')
            $.notify({
              message: 'Se ha creado la subcategoría',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
            $table.ajax.reload()
          } else {
            $('#modalSubcategoria').modal('hide')
            $.notify({
              message: 'No se ha creado la subcategoría',
              title: 'Error',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        })
        .fail((err) => {
          if (err.status === 303) {
            $('#modalCreate').modal('hide')
            $.notify({
              message: 'Ya existe una subcategoría con este nombre para esta categoría',
              title: 'error',
              icon: 'notification_important'
            }, {
              type: 'danger'
            })
          }
        })
        .always(() => {
          if (myDropzone) {
           myDropzone.removeAllFiles(true);
          }
          document.getElementById('subcategoryInput').value = '',
          document.getElementById('descriptionSubcategoryInput').value = '',
        $('#imageCategoryS').attr('src', '')

        }); 
      }
    </script>

</html>