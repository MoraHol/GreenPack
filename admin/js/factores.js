function FactorMaterial() {
    // addFactor();
    // addMaterial(); 
    $('#materials').append(`
    
    <div class="row"> 
          <select class="form-control" style="margin-bottom: 10px; width: 30%" id="material${indexMaterial}">
            <option disabled selected>Seleccione un material</option>
          <?php
          foreach ($materials as  $material) { ?>
              <option value="<?= $material->getId(); ?>"><?= $material->getName(); ?></option>
          <?php } ?>
          </select>  
           
            <input class="col md-4 form-control ml-5 mr-5" id="e1${indexMaterial}" type="number" style="width:100px; text-align:center">
            <input class="col md-4 form-control mr-5" id="e2${indexMaterial}" type="number" style="width:100px; text-align:center">
            <input class="col md-4 form-control mr-5" id="e3${indexMaterial}" type="number" style="width:100px; text-align:center">
          </div>`);

  }