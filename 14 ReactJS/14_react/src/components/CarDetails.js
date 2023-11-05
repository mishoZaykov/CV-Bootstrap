import axios from "axios";
import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";

function CarDetails() {
  const { carId } = useParams();
  const [car, setCar] = useState({});

  useEffect(() => {
    axios
      .get(`http://127.0.0.1:8000/api/getCarById/${carId}`)
      .then((response) => {
        setCar(response.data.data[0]);
      })
      .catch((error) => {
        console.error(error);
      });
  }, [carId]);

  return (
    <div className="container">
      <h2>Car Details</h2>
      <p>Make: {car.brand}</p>
      <p>Model: {car.model}</p>
      <p>Year: {car.year}</p>
    </div>
  );
}

export default CarDetails;
