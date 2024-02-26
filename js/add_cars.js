document.addEventListener("DOMContentLoaded", function () {
  const addCarsForm = document.getElementById("add-cars-form");

  addCarsForm.addEventListener("submit", function (event) {
    var XHR = new XMLHttpRequest();
    // var formData = new FormData(addCarsForm);

    // On success
    XHR.addEventListener("load", addCarsSuccess);

    // On error
    XHR.addEventListener("error", on_error);

    // Set up request
    // XHR.open("POST", "api/add_cars.php");

    // Form data is sent with request
    // XHR.send(formData);

    document.getElementById("loading").style.display = "block";
    event.preventDefault();
  });
});

var addCarsSuccess = function (event) {
  document.getElementById("loading").style.display = "none";

  var response = JSON.parse(event.target.responseText);
  if (response.success) {
    alert(response.message);
    window.location.href = "index.php"; // Redirect to index after successful addition
  } else {
    alert(response.message);
  }
};

var on_error = function (event) {
  document.getElementById("loading").style.display = "none";

  alert("Oops! Something went wrong.");
};
