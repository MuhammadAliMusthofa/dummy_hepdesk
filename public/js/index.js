global.$ = global.jQuery = require("jquery");

$("#confirm-delete").on("show.bs.modal", function (e) {
  console.log("pushed");
});
