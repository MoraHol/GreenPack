$(document).ready(function () {
  const url = $(location).prop("href");
  const idParameter = getUrlParameters("id", url, true);

  $.post(
    "api/get_category.php",
    { idParameter: idParameter },
    function (data, textStatus, jqXHR) {
      $(`#${data}`).addClass("show");
      $(`#${idParameter}`).css("color", "#45a016");
    }
  );
});

function getUrlParameters(parameter, staticURL, decode) {
  var currLocation = staticURL.length ? staticURL : window.location.search,
    parArr = currLocation.split("?")[1].split("&"),
    returnBool = true;

  for (var i = 0; i < parArr.length; i++) {
    parr = parArr[i].split("=");
    if (parr[0] == parameter) {
      return decode ? decodeURIComponent(parr[1]) : parr[1];
      returnBool = true;
    } else {
      returnBool = false;
    }
  }

  if (!returnBool) return false;
}
