document.addEventListener("DOMContentLoaded", function () {
  // Fetch available cars from the API
  var carsXHR = new XMLHttpRequest();
  carsXHR.addEventListener("load", function (event) {
    var response = JSON.parse(event.target.responseText);

    if (response.success) {
      // Display available cars
      displayAvailableCars(response.cars);
    } else {
      // Handle error, you may want to display an error message
      console.error(response.message);
    }
  });

  carsXHR.open("GET", "api/view_booked_cars.php");
  carsXHR.send();
});

function displayAvailableCars(cars) {
  var availableCarsList = document.getElementById("available-cars-list");

  // Clear previous content
  availableCarsList.innerHTML = "";

  cars.forEach(function (car) {
    var carRow = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");

    td1.innerHTML = `${car.car_id}`;
    td2.innerHTML = `${car.customer_id}`;
    td3.innerHTML = `${car.start_date}`;
    td4.innerHTML = `${car.days_rented}`;

    carRow.appendChild(td1);
    carRow.appendChild(td2);
    carRow.appendChild(td3);
    carRow.appendChild(td4);

    availableCarsList.appendChild(carRow);
  });
}
