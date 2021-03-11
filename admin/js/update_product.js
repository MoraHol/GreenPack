jQuery.event.special.touchstart = {
    setup: function(_, ns, handle) {
      this.addEventListener('touchstart', handle, {
        passive: !ns.includes('noPreventDefault')
      });
    }
  };
  jQuery.event.special.touchmove = {
    setup: function(_, ns, handle) {
      this.addEventListener('touchmove', handle, {
        passive: !ns.includes('noPreventDefault')
      });
    }
  };

  jQuery.event.special.wheel = {
    setup: function(_, ns, handle) {
      this.addEventListener('wheel', handle, {
        passive: !ns.includes('noPreventDefault')
      });
    }
  };


  /* let scrollTimeout = 1;
          let throttle = 4500;

          window.addEventListener('wheel', ev => {
            console.log('si');
            if (scrollTimeout === 0) {
              setTimeout(() => {
                scrollTimeout = 1;
              }, throttle);
              ev.preventDefault();
              return false;
            }
            else {
              scrollTimeout = 0;
            }
          }, { passive: false}); */

  if (parseInt($('#category').val()) == 6) {
    $('.length').css('display', 'none')
    $('.window').css('display', 'none')
  }

  $(() => {
    $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
    $('#product-item').addClass('active')
    $('.imagen').height($('.imagen').parent().height())
    $('.imagen').width($('.imagen').parent().width())
    $('.imagen .info').height($('.imagen').parent().height())
    $('.imagen div.info').width($('.imagen').parent().width())
  })

  function deleteImage(id, url) {
    $.post('/admin/image_delete.php', {
      src: url
    }, (data, status) => {
      if (status != "success") {
        alert("error")
      }
    })
    $.post('api/image_delete.php', {
      id: id
    }, (data, status) => {
      if (status == "success") {
        $.notify({
          message: 'Imagen Eliminada',
          icon: 'fas fa-exclamation-triangle'
        }, {
          type: 'warning'
        })
        reloadPage()
      }
    })
  }

  function deleteMeasurement(idProduct, idMeasurement) {
    $.post('api/delete_measurement.php', {
      idProduct: idProduct,
      idMeasurement: idMeasurement
    }, (data, status) => {
      if (status == 'success') {
        reloadPage()
        $.notify({
          icon: 'fas fa-exclamation-triangle',
          message: 'Medida eliminada',
        }, {
          type: 'warning'
        })
        location.href = '#measurement-container'
      }
    })
  }

  function updateMeasurement(idProduct, idMeasurement, indexMeasurement, evTarget) {
    const codigoInput = $(`#codigo${indexMeasurement}`).val();
    const widthInput = $(`#width${indexMeasurement}`).val();
    const heightInput = $(`#height${indexMeasurement}`).val();
    const lengthInput = $(`#length${indexMeasurement}`).val();
    // const windowInput = $(`#window${indexMeasurement}`).val();
    const largoUtilInput = $(`#largoUtil${indexMeasurement}`).val();
    const anchoTotalInput = $(`#anchoTotal${indexMeasurement}`).val();
    const VentaMinimaImpresaInput = $(`#VentaMinimaImpresa${indexMeasurement}`).val();
    const VentaMinimaGenericaInput = $(`#VentaMinimaGenerica${indexMeasurement}`).val();
    /* console.log(largoUtilInput);
    console.log(anchoTotalInput); */

    if (evTarget.closest('button').value === 'Modificar') {
      /*   evTarget.closest('button').value = 'Guardar'; */
      evTarget.closest('button').value = 'Guardar';
      evTarget.closest('button').textContent = 'Guardar';

      $(`#codigo${indexMeasurement}`).prop("readonly", false);
      // codigoInput.readOnly = false;
      $(`#width${indexMeasurement}`).prop("readonly", false);
      // widthInput.readOnly = false;
      $(`#height${indexMeasurement}`).prop("readonly", false);
      // heightInput.readOnly = false;
      $(`#length${indexMeasurement}`).prop("readonly", false);
      // lengthInput.readOnly = false;
      // $(`#window${indexMeasurement}`).prop("readonly", false);
      // windowoInput.readOnly = false;
      $(`#largoUtil${indexMeasurement}`).prop("readonly", false);
      // largoUtilInput.readOnly = false;
      $(`#anchoTotal${indexMeasurement}`).prop("readonly", false);
      // anchoTotalInput.readOnly = false;
      $(`#VentaMinimaImpresa${indexMeasurement}`).prop("readonly", false);
      // VentaMinimaImpresaInput.readOnly = false;
      $(`#VentaMinimaGenerica${indexMeasurement}`).prop("readonly", false);
      // VentaMinimaGenericaInput.readOnly = false;

      evTarget.classList.replace('btn-warning', 'btn-info');

    } else {

      const measurementInfo = {
        idMeasurement: idMeasurement,
        codigo: codigoInput,
        width: widthInput,
        height: heightInput,
        length: lengthInput,
        // window: windowInput.value,
        largoUtil: largoUtilInput,
        anchoTotal: anchoTotalInput,
        ventaMinimaImpresa: VentaMinimaImpresaInput,
        ventaMinimaGenerica: VentaMinimaGenericaInput
      };

      console.log(measurementInfo);

      $.post('api/modify_measurements.php', {
            measurements: measurementInfo
          },
          (data, status) => {
            if (status === 'success') {
              $.notify({
                icon: 'fas fa-exclamation-triangle',
                message: 'Medida Actualizada',
              }, {
                type: 'warning'
              })
            }
          })
        .always(() => {
          evTarget.closest('button').value = 'Modificar';
          evTarget.closest('button').innerHTML = '<i class="fas fa-pencil-alt"></i>';
          // codigoInput.readOnly = true;
          // widthInput.readOnly = true;
          // heightInput.readOnly = true;
          // lengthInput.readOnly = true;
          // windowInput.readOnly = true;
          // largoUtilInput.readOnly = true;
          // anchoTotalInput.readOnly = true;
          // ventaMinimaImpresaInput.readOnly = true;
          // ventaMinimaGenericaInput.readOnly = true;
          $(`#codigo${indexMeasurement}`).prop("readonly", true);
          $(`#width${indexMeasurement}`).prop("readonly", true);
          $(`#height${indexMeasurement}`).prop("readonly", true);
          $(`#lenght${indexMeasurement}`).prop("readonly", true);
          // $(`#window${indexMeasurement}`).prop("readonly", true);
          $(`#largoUtil${indexMeasurement}`).prop("readonly", true);
          $(`#anchoTotal${indexMeasurement}`).prop("readonly", true);
          $(`#VentaMinimaImpresa${indexMeasurement}`).prop("readonly", true);
          $(`#VentaMinimaGenerica${indexMeasurement}`).prop("readonly", true);


          evTarget.classList.replace('btn-info', 'btn-warning');
        });
    }
  }


  function elById(id) {
    return document.getElementById(id);
  }

  function deleteMaterial(idProduct, idMaterial) {
    $.post('api/delete_material.php', {
      idProduct: idProduct,
      idMaterial: idMaterial
    }, (data, status) => {
      if (status == 'success') {
        reloadPage()
        $.notify({
          message: 'Material eliminado',
          title: '<strong>Greenpack</strong>',
          icon: 'fas fa-exclamation-triangle'
        }, {
          type: 'warning'
        })
      }

    })
  }

  function reloadPage() {
    $('#main-panel').html('')
    $('#main-panel').load('update_product.php?id=<?= $product->getId(); ?> #main-panel-child', (response, status, xhr) => {
      if (status == 'error') {
        alert('error')
      } else {
        initialize()
      }
    })
  }

  let editor
  let myDropzone
  let flagImage = false
  let text = `<?= $product->getDescription(); ?>`
  $('#measurements').fadeOut()

  function initialize() {
    $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
    $('#product-item').addClass('active')
    $('.imagen').height($('.imagen').parent().height())
    $('.imagen').width($('.imagen').parent().width())
    $('.imagen .info').height($('.imagen').parent().height())
    $('.imagen div.info').width($('.imagen').parent().width())
    /* $('select').niceSelect() */
    if (parseInt($('#category').val()) == 6) {
      $('.height').children('label').text('Largo:')
    }
    $('#title').val(`<?= $product->getName(); ?>`)
    Dropzone.autoDiscover = false;
    editor = new FroalaEditor('#content', {
      language: 'es',
      height: 300,
      imageUploadParam: 'photo',
      imageUploadURL: '/admin/upload.php',
      imageUploadMethod: 'POST',
      videoUploadParam: 'video',
      videoUploadURL: 'upload-video.php',
      imageUploadMethod: 'POST',
      fileUploadParam: 'file',
      fileUploadURL: '/admin/upload-file.php',
      fileUploadMethod: 'POST',
      events: {
        'image.removed': function($img) {
          img = $img[0]
          $.post('/admin/image_delete.php', {
            src: $img.attr('src')
          }, (data, status) => {
            if (status != "success") {
              alert("error")
            }
          })
        },
        'file.removed': function($file) {
          file = $file[0]
          $.post('/admin/file_delete.php', {
            src: $file.attr('src')
          }, (data, status) => {
            if (status != "success") {
              alert("error")
            }
          })
        },
        'keyup': function(keyupEvent) {
          if (document.domain != 'localhost') {
            $('.fr-wrapper>div:first-child').css('visibility', 'hidden')
          }
        }
      }
    }, () => {
      editor.html.set(text)
      if (document.domain != 'localhost') {
        $('.fr-wrapper>div:first-child').css('visibility', 'hidden')
      }
    })
    myDropzone = new Dropzone("div#myId", {
      url: "/admin/upload.php",
      method: 'post',
      paramName: 'photo',
      acceptedFiles: "image/*",
      dictDefaultMessage: 'Sube tus archivos, arrastralos o haz click para buscarlos',
      dictMaxFilesExceeded: 'Carga solo una imagen',
      dictInvalidFileType: 'Carga solo imagenes'
    })

    $('button#submitEditor').click(() => {
      if ($('#title').val() != '' && editor.html.get() != '') {
        let responses = []
        let uses = []
        let materials = []
        let measurements = []
        let materialFactor = []

        //Inicializar array factores
        //Inicializar e objeto



        for (let index = 0; index < $('#fields').children().length; index++) {
          if (typeof($('#field' + (index + 1)).val()) != 'undefined' && $('#field' + (index + 1)).val() !== "") {
            uses.push($('#field' + (index + 1)).val())
          }
        }
        $('select').niceSelect('update')

        for (let index = 0; index < $('#materials').children().length; index++) {
          let value = $('#material' + (index + 1)).val()
          let e1 = $('#e1' + (index + 1)).val()
          let e2 = $('#e2' + (index + 1)).val()
          let e3 = $('#e3' + (index + 1)).val()

          if (value != '' && typeof(value) != 'undefined' && value != null) {
            materials.push(value)
            const factor = {};
            factor.materials = value;
            factor.e1 = e1;
            factor.e2 = e2;
            factor.e3 = e3;
            materialFactor.push(factor);
          }
        }
        let i = $('#measurements').children().length;

        for (let index = 0; index < $('#measurements').children().length; index++) {
          let measurement = {}

          measurement.codigo = $('#codigo' + (index + 1)).val()
          measurement.width = $('#width' + (index + 1)).val()
          measurement.height = $('#height' + (index + 1)).val()
          measurement.length = $('#length' + (index + 1)).val()
          // measurement.window = $('#window' + (index + 1)).val()
          measurement.pliego = $('#pliego' + (index + 1)).val()
          measurement.largoUtil = $('#largoUtil' + (index + 1)).val()
          measurement.anchoTotal = $('#anchoTotal' + (index + 1)).val()
          measurement.ventaMinimaGenerica = $('#VentaMinimaGenerica' + (index + 1)).val()
          measurement.ventaMinimaImpresa = $('#VentaMinimaImpresa' + (index + 1)).val()

          if (typeof($('#codigo' + (index + 1)).val()) != 'undefined' && $('#codigo' + (index + 1)).val() != '' &&
            typeof($('#width' + (index + 1)).val()) != 'undefinded' && $('#width' + (index + 1)).val() != '' &&
            typeof($('#height' + (index + 1)).val()) != 'undefined' && $('#height' + (index + 1)).val() != '' &&
            typeof($('#length' + (index + 1)).val()) != 'undefined' && $('#length' + (index + 1)).val() != '' &&
            typeof($('#pliego' + (index + 1)).val()) != 'undefined' && $('#pliego' + (index + 1)).val() != '' &&
            typeof($('#largoUtil' + (index + 1)).val()) != 'undefined' && $('#largoUtil' + (index + 1)).val() != '' &&
            typeof($('#anchoTotal' + (index + 1)).val()) != 'undefined' && $('#anchoTotal' + (index + 1)).val() != '' &&
            typeof($('#VentaMinimaGenerica' + (index + 1)).val()) != 'undefined' && $('#VentaMinimaGenerica' + (index + 1)).val() != '' &&
            typeof($('#VentaMinimaImpresa' + (index + 1)).val()) != 'undefined' && $('#VentaMinimaImpresa' + (index + 1)).val() != '') /* && */

            measurements.push(measurement)

        }
        if (myDropzone.getAcceptedFiles().length > 0) {
          let responses = []
          myDropzone.getAcceptedFiles().forEach(image => {
            let response = JSON.parse(image.xhr.responseText)
            responses.push(response.link)
          })
          ajax(responses, uses, materials, measurements, materialFactor)
        } else {
          update(uses, materials, measurements, materialFactor)
        }
      } else {
        alert("Completa todos los campos")
      }
    })
    $('#btnUploadExcel').click(() => {
      $('#uploadExcel').html('<div>Descarga aqui el formato para cargar medidas <a id="uploadExcelFile" href="<?= $routeDownloadFileExample ?>" download="FormatoMedidas.xlsx" class="btn btn-info"><i class="fas fa-file-download"></i></a></div><div id="uploadFileExcel" class="dropzone"></div>')
      DropzoneExcel = new Dropzone("div#uploadFileExcel", {
        url: "/admin/upload-file.php",
        method: 'post',
        paramName: 'file',
        maxFiles: 1,
        dictDefaultMessage: 'Carga el archivo Excel con las medidas del producto',
        dictMaxFilesExceeded: 'Carga solo un archivo',
        dictInvalidFileType: 'Carga solo archivos de Excel'
      })
      DropzoneExcel.on('success', function(file) {
        let response = JSON.parse(file.xhr.responseText)
        let url = response.link
        $.post('api/upload_measurements.php', {
          id: `<?= $_GET["id"] ?>`,
          file: url
        }, (data, status) => {
          if (status == "success") {
            alert('Cargado')
          }
        })
      })
    })
    $('#hideMeasurements').click(function() {
      $('#measurements').fadeToggle()
      $(this).text(function(i, text) {
        return text === "Ocultar" ? "Ver Medidas" : "Ocultar";
      })
      $(this).toggleClass('btn-primary')
    })
  }
  $(() => {
    initialize()
  })

  function update(uses, materials, measurements, materialFactor) {

    $.post("api/update_product.php", {
      id: <?= $product->getId(); ?>,
      title: $('#title').val(),
      content: editor.html.get(),
      uses: JSON.stringify(uses),
      ref: $('#ref').val(),
      category: $('#category').val(),
      price: $('#price').val(),
      cotizador: $('#cotizador').val(),
      materials: JSON.stringify(materials),
      measurements: JSON.stringify(measurements),
      materialFactors: JSON.stringify(materialFactor)
    }, (data, status) => {
      reloadPage()
      text = editor.html.get()
      $.notify({
        message: 'Producto actualizado',
        icon: 'fas fa-check-circle'
      }, {
        type: 'success'
      })
    })
  }

  function ajax(responses, uses, materials, measurements, materialFactor) {

    $.post("api/update_product.php", {
      id: <?= $product->getId(); ?>,
      title: $('#title').val(),
      content: editor.html.get(),
      photos: JSON.stringify(responses),
      uses: JSON.stringify(uses),
      ref: $('#ref').val(),
      category: $('#category').val(),
      price: $('#price').val(),
      cotizador: $('#cotizador').val(),
      materials: JSON.stringify(materials),
      measurements: JSON.stringify(measurements),
      materialFactors: JSON.stringify(materialFactor)
    }, (data, status) => {
      reloadPage()
      text = editor.html.get()

      $.notify({
        message: 'Producto actualizado',
        icon: 'fas fa-check-circle'
      }, {
        type: 'success'
      })
    })
  }

  indexField = <?= --$indexField; ?>;
  indexMeasurement = <?= --$indexMeasurement; ?>;
  indexMaterial = <?= --$indexMaterial; ?>;
  indexFactor = <?= --$indexFactor; ?>;

  function addField() {
    indexField++;
    $('#fields').append(`<div class="col-sm-4">
                    Uso ${indexField}:<input type="text" id="field${indexField}" class="form-control">
                  </div>`)
  }


  $(document).ready(function() {
    let cot = <?= $product->getCotizador(); ?>

    if (cot == 1)
      $('.pliego').hide();
    else
      $('.pliego').show();

  });

  function addEvaluateMeasurement() {
    let cot = <?= $product->getCotizador(); ?>

    if (cot == 1)
      addMeasurement();
    else
      addMeasurement2();
  }


  function addMeasurement() {
    indexMeasurement++;
    $('#measurements').append(`
        
      <li>Medida ${indexMeasurement}:
        <div class="row">
          <div class="col codigo"><label for="codigo${indexMeasurement}">Codigo:</label><input type="text" id="codigo${indexMeasurement}" class="form-control"></div>
          <div class="col"><label for="width${indexMeasurement}">Ancho:</label><input type="number" id="width${indexMeasurement}" class="form-control"></div>
          <div class="col height"><label for="height${indexMeasurement}">Alto:</label><input type="number" id="height${indexMeasurement}" class="form-control"></div>
          <div class="col length"><label for="length${indexMeasurement}">Largo:</label><input type="number" id="length${indexMeasurement}" class="form-control"></div>
          <div class="col largoUtil"><label for="">Largo Útil</label><input type="number" id="largoUtil${ indexMeasurement}" value="" class="form-control" value="0"></div>
        </div>
          
        <div class="row">
          <div class="col-2 anchoTotal"><label for="">Ancho Total</label><input type="number" id="anchoTotal${indexMeasurement}" value="" class="form-control" value="0"></div>
          <div class="col-2 venta-minima-impresa"><label for="">Vta Min Impresa</label><input type="number" id="VentaMinimaImpresa${indexMeasurement}" class="form-control" value="0"></div>
          <div class="col-2 venta-minima-generica"><label for="">Vta Min Genérica</label><input type="number" id="VentaMinimaGenerica${indexMeasurement}" class="form-control" value="0"></div>
          <div class="Delete"><button type="button" class="btn btn-danger" onclick="deleteMeasurement()"><i class="fas fa-trash-alt"></i></button></div>
          <div class="col Update"><button type="button" class="btn btn-warning" onclick="updateMeasurement()"><i class="fas fa-pencil-alt"></i></button></div>
        </div>
       
      </li>`)
    if (parseInt($('#category').val()) == 6) {
      $('.height').children('label').text('Largo:')
      $('.length').css('display', 'none')
      $('.window').css('display', 'none')
      $(`#lenght${indexMeasurement}`).val(0)
      $(`#window${indexMeasurement}`).val(0)
    }
  }


  function addMeasurement2() {
    indexMeasurement++;
    $('#measurements').append(`
      <li>Medida ${indexMeasurement}:
        <div class="row">
          <div class="col-2 ml-4 codigo">
            <label for="codigo${indexMeasurement}">Codigo:</label>
            <input type="text" id="codigo${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 ml-4">
            <label for="width${indexMeasurement}">Ancho:</label>
            <input type="number" id="width${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 height">
            <label for="height${indexMeasurement}">Alto/Fuelle:</label>
            <input type="number" id="height${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 length">
            <label for="length${indexMeasurement}">Largo:</label>
            <input type="number" id="length${indexMeasurement}" class="form-control">
          </div>
          
          <div class="col-2 LargoUtil">
            <label for="largoUtil${indexMeasurement}">Largo Útil:</label>
            <input type="number" id="largoUtil${indexMeasurement}" class="form-control">
          </div>
          
          <div class="col-2 ml-4 anchototal">
            <label for="anchoTotal${indexMeasurement}">Ancho Total:</label>
            <input type="number" id="anchoTotal${indexMeasurement}" class="form-control">
          </div>
          
          <!--</div>
          <div class="row">-->
          <div class="col-2 Pliego">
            <label for="Pliego${indexMeasurement}"><?= $nameAdditional ?>:</label>
            <input type="number" id="pliego${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 VentaMinimaImpresa">
            <label for="VentaMinimaImpresa${indexMeasurement}">Venta Mínima Impresa:</label>
            <input type="number" id="VentaMinimaImpresa${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 VentaMinimaGenerica">
            <label for="VentaMinimaGenerica${indexMeasurement}">Venta Mínima Genérica:</label>
            <input type="number" id="VentaMinimaGenerica${indexMeasurement}" class="form-control">
          </div>
          <div class="Delete">
            <button type="button" class="btn btn-danger" onclick="deleteMeasurement()"><i class="fas fa-trash-alt"></i></button>
          </div>
          <div class="col Update">
            <button type="button" class="btn btn-warning" onclick="updateMeasurement()"><i class="fas fa-pencil-alt"></i></button>
          </div>
          
        </div>
      </li>`)
    /* $('select').niceSelect() */
    /* if (parseInt($('#category').val()) == 6) {
      $('.height').children('label').text('Largo:')
      $('.length').css('display', 'none')
      $('.window').css('display', 'none')
      $(`#length${indexMeasurement}`).val(0)
      $(`#window${indexMeasurement}`).val(0)
    } */
  }

  function FactorMaterial() {
    // addFactor();
    // addMaterial();
    indexFactor++;
    indexMaterial++;
    $('#materials').append(`
    
    <div class="row"> 
          <select class="form-control" style="margin-bottom: 10px; width: 30%" id="material${indexMaterial}">
            <option disabled selected>Seleccione un material</option>
          <?php
          foreach ($materials as  $material) { ?>
              <option value="<?= $material->getId(); ?>"><?= $material->getName(); ?></option>
          <?php } ?>
          </select>  
           
            <input class="col md-4 form-control ml-5 mr-5" id="e1<?= $indexFactor ?>" type="number" style="width:100px; text-align:center">
            <input class="col md-4 form-control mr-5" id="e2<?= $indexFactor ?>" type="number" style="width:100px; text-align:center">
            <input class="col md-4 form-control mr-5" id="e3<?= $indexFactor ?>" type="number" style="width:100px; text-align:center">
          </div>`);

    //     $('#materials').append(`
    // <select class="form-control" style="margin-bottom: 10px;" id="material${indexMaterial}">
    //   <option disabled selected>Seleccione un material</option>
    //     <?php
            //     foreach ($materials as  $material) { 
            ?>
    //         <option value="?= $material->getId(); ?>">?= $material->getName(); ?></option>
    //     ?php } ?>
    //     </select>
    // `)

  }


  function addFactor() {
    indexFactor++;
    $('.tituloFactores').append(`
          <div class="row">
            <label value="<?= $material->getId(); ?>" <?= $materialProduct->getId() == $material->getId() ? "selected" : "" ?>><?= $material->getName(); ?></label>
            <input class="col md-4 form-control" id="Factor<?= $indexFactor ?>" type="number">
            <input class="col md-4 form-control" id="Factor<?= $indexFactor ?>" type="number">
            <input class="col md-4 form-control" id="Factor<?= $indexFactor ?>" type="number">
          </div>`);
  }

  $(document).ready(function() {

    let selectElement = document.querySelector('.material');
    if (selectElement == null) {
      selectElement = 1;
      return false;

    }
    $("#material").change(function() {
      alert('Hola');
    });

  });


  /* function addMaterial() {
    indexMaterial++;
    $('#materials').append(`
      <select class="factors${indexMaterial} form-control" style="margin-bottom: 10px;" id="material${indexMaterial}">
        <option disabled selected>Seleccione un material</option>
          <?php
          foreach ($materials as  $material) { ?>
              <option value="<?= $material->getId(); ?>"><?= $material->getName(); ?></option>
          <?php } ?>
          </select>
      `) */
  /* $('select').niceSelect()
  $('select').niceSelect('update') */

  /* } */
</script>
<script>
  function deleteTab(id) {
    $.post('api/delete_tab_product.php', {
      id: id
    }, (data, status) => {
      if (status == 'success') {
        location.reload()
      }
    })
  }
  const urlParams = new URLSearchParams(window.location.search);
  const updated = urlParams.get('updated');

  if (updated == 'true') {
    $.notify({
      message: 'Pestaña actualizada',
      icon: 'notification_important'
    }, {
      type: 'success'
    })
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", location.pathname + '?id=' + urlParams.get('id'));
    }
  }