import React, { useState, useEffect } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

function Cars() {
  const [cars, setCars] = useState([]);
  const [newCar, setNewCar] = useState({
    brand: "",
    model: "",
    year: "",
    user_id: null,
  });

  const userId = localStorage.getItem("user_id");

  const fetchCars = () => {
    axios
      .get("http://127.0.0.1:8000/api/getAllCars")
      .then((response) => {
        setCars(response.data);
      })
      .catch((error) => {
        console.error("Error fetching cars", error);
      });
  };

  useEffect(() => {
    fetchCars();
  }, []);

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setNewCar({ ...newCar, [name]: value, user_id: userId });
  };

  const addCar = (e) => {
    e.preventDefault();
    axios
      .post("http://127.0.0.1:8000/api/addCar", newCar)
      .then(() => {
        console.log(newCar);
        fetchCars();
        setNewCar({ brand: "", model: "", year: "", user_id: userId });
      })
      .catch((error) => {
        console.error("Error adding a car", error.response.data);
      });
  };

  return (
    <div>
      <div className="form-container">
        <h3>Add a New Car</h3>
        <form onSubmit={addCar}>
          <input
            type="text"
            name="brand"
            placeholder="Brand"
            value={newCar.brand}
            onChange={handleInputChange}
            required
          />
          <input
            type="text"
            name="model"
            placeholder="Model"
            value={newCar.model}
            onChange={handleInputChange}
            required
          />
          <input
            type="number"
            name="year"
            placeholder="Year"
            value={newCar.year}
            onChange={handleInputChange}
            required
          />
          <input type="submit" value="SUBMIT" />
        </form>
      </div>
      <div className="cars-list">
        <h3>List of Cars</h3>
        <ul>
          {cars.data?.map((car) => (
            <li key={car.id}>
              <Link to={`/cars/${car.id}`}>
                {car.brand} {car.model}
              </Link>
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
}

export default Cars;
