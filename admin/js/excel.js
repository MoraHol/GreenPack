let selectedFile;

$("#uploadExcel").slideUp();

document.getElementById("cargarMedidas").addEventListener("change", (event) => {
  selectedFile = event.target.files[0];
  var ext = selectedFile.name.split(".");
  ext = ext[ext.length - 1];

  if (ext !== "xls" && ext !== "xlsx") {
    $.notify(
      {
        message:
          "El archivo seleccionado no es un archivo Excel, intente nuevamente",
        icon: "fas fa-check-circle",
      },
      {
        type: "warning",
      }
    );
    return false;
  }
});

let data = [
  {
    name: "jayanth",
    data: "scd",
    abc: "sdef",
  },
];

/* document.getElementById("btnImportarMedidas").addEventListener("click", () => { */
importarMedidas = (id) => {
  XLSX.utils.json_to_sheet(data, "out.xlsx");
  if (selectedFile) {
    let fileReader = new FileReader();
    fileReader.readAsBinaryString(selectedFile);
    fileReader.onload = (event) => {
      let data = event.target.result;
      let workbook = XLSX.read(data, { type: "binary" });
      workbook.SheetNames.forEach((sheet) => {
        let rowObject = XLSX.utils.sheet_to_row_object_array(
          workbook.Sheets[sheet]
        );

        $.post(
          "api/upload_measurements.php",
          { data: rowObject, id },
          (data, status) => {
            if (status == "success") {
              $.notify(
                {
                  message: "Medidas Cargadas exitosamente",
                  icon: "fas fa-check-circle",
                },
                {
                  type: "success",
                }
              );
              location.reload();
            } else {
              $.notify(
                {
                  message:
                    "Ocurrio un error al cargar las medidas, intente nuevamente",
                  icon: "fas fa-check-circle",
                },
                {
                  type: "success",
                }
              );
            }
          }
        );
      });
    };
  }
  /* }); */
};
