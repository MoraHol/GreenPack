<!-- CREATE CATEGORY MODAL -->

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                    <div class="col-sm-4">Descripción:</div>
                    <div class="col-sm-8 ">
                        <textarea class="form-control text-area-control" id="descriptionCategoryInputC" cols="30" rows="3"></textarea>
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
    <div class="modal-dialog modal-lg" role="document">
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
                    <div class="col-sm-4">Descripción:</div>
                    <div class="col-sm-8 ">
                        <textarea class="form-control text-area-control" id="descriptionCategoryInput" cols="30" rows="3"></textarea>
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

                <div id="subcategories" class="mb-3 mt-3">
                </div>
                <div id="subcategoriesE">
                    <div class="col-sm-8">Crear Subcategoría:
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="">
                        <ul id="subcat-listM" class="list-group list-group-flush">
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
                    <div class="col-sm-4">Descripción:</div>
                    <div class="col-sm-8 ">
                        <textarea class="form-control text-area-control" id="descriptionSubcategoryInput" cols="30" rows="3"></textarea>
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