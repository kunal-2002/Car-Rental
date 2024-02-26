document.addEventListener("DOMContentLoaded", function () {
  var selectedCarId = null; // To store the ID of the selected car

  // Fetch available cars from the API
  var carsXHR = new XMLHttpRequest();
  carsXHR.addEventListener("load", function (event) {
    var response = JSON.parse(event.target.responseText);

    if (response.success) {
      // Display available cars
      displayAvailableCars(response.cars);

      // Check if the user is logged in as a customer
      var loggedInAsCustomer = response.userType === "customer";

      // Add logic here based on user type
      if (loggedInAsCustomer) {
        // Add logic for dropdown and date inputs
        // You can dynamically populate the options for the number of days here
      }

      // Handling Rent Car button on Available Cars page
      var rentCarButtons = document.querySelectorAll(".rent-car-button");

      rentCarButtons.forEach(function (button) {
        button.addEventListener("click", function () {
          // Check if the user is logged in as a customer
          if (!loggedInAsCustomer) {
            // Redirect to login page if not logged in
            window.location.href = "login.php";
          } else {
            // Handle the rent car functionality
            // You may want to implement AJAX to communicate with the server
            // Example: alert("Renting the car!");

            // After successful submission, you can redirect or show a success message
            // For now, just log a message to the console
            console.log("Renting the car!");
          }
        });
      });
    } else {
      // Handle error, you may want to display an error message
      console.error(response.message);
    }
  });

  var rentCarButtons = document.querySelectorAll(".rent-car-button");

  rentCarButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      if (selectedCarId !== null) {
        // Disable the previously selected car button
        var previousSelectedButton = document.querySelector(
          `[data-car-id="${selectedCarId}"]`
        );
        if (previousSelectedButton) {
          previousSelectedButton.disabled = false;
        }
      }

      selectedCarId = button.getAttribute("data-car-id");
      // Disable other "Rent Car" buttons
      rentCarButtons.forEach(function (otherButton) {
        if (otherButton !== button) {
          otherButton.disabled = true;
        }
      });

      // Enable the book now button
      document.getElementById("book-now-button").disabled = false;
    });
  });

  carsXHR.open("GET", "api/get_available_cars.php");
  carsXHR.send();
});

function displayAvailableCars(cars) {
  var availableCarsList = document.getElementById("available-cars-list");

  // Clear previous content
  availableCarsList.innerHTML = "";

  // Variable to keep track of the iteration
  var iteration = 1;

  // Iterate through the cars and display them
  cars.forEach(function (car) {
    var carRow = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");

    td1.innerHTML = `${car.model}`;
    td2.innerHTML = `${car.vehicle_number}`;
    td3.innerHTML = `${car.seating_capacity} Seater`;
    td4.innerHTML = `${car.rent_per_day}₹`;

    // Create a radio button for each car
    var radioBtn = document.createElement("input");
    radioBtn.type = "radio";
    radioBtn.name = "selectedCar";
    radioBtn.value = `${car.id}`;
    radioBtn.setAttribute("data-car-id", `${car.id}`);
    td5.appendChild(radioBtn);

    carRow.appendChild(td1);
    carRow.appendChild(td2);
    carRow.appendChild(td3);
    carRow.appendChild(td4);
    carRow.appendChild(td5);

    availableCarsList.appendChild(carRow);

    // Increment the iteration for the next car
    iteration++;
  });
}

// Function to show the booking form
function showAddBookingForm() {
  var bookingForm = document.getElementById("booking-form");
  bookingForm.style.display = "block";
}

function submitBookingForm() {
  var bookingForm = document.getElementById("book-car-form");
  var formData = new FormData(bookingForm);

  // Fetch available cars from the API
  var bookingXHR = new XMLHttpRequest();
  bookingXHR.addEventListener("load", function (event) {
    var response = JSON.parse(event.target.responseText);

    if (response.success) {
      console.log("Booking successful");
      // You can redirect or perform any other actions after successful booking
    } else {
      console.error("Booking failed:", response.message);
      // Handle error, display an error message, etc.
    }
  });

  bookingXHR.open("POST", "api/get_available_cars.php");
  bookingXHR.send(formData);
}
