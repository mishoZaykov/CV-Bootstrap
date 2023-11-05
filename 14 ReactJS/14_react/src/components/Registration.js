import React, { useState } from "react";
import axios from "axios";

function Registration() {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    password: "",
    c_password: "",
  });

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    if (formData.password !== formData.c_password) {
      alert("Passwords do not match");
      return;
    }

    try {
      const response = await axios.post(
        "http://127.0.0.1:8000/api/register",
        formData
      );
      alert("Registration successful", response.data);
    } catch (error) {
      console.error("Error", error);
    }
  };

  return (
    <div className="form-container">
      <h1>Registration</h1>
      <form onSubmit={handleSubmit}>
        <label htmlFor="name">Name:</label>
        <input
          type="text"
          id="name"
          name="name"
          required
          onChange={handleChange}
          value={formData.name}
        />

        <label htmlFor="email">Email:</label>
        <input
          type="email"
          id="email"
          name="email"
          required
          onChange={handleChange}
          value={formData.email}
        />

        <label htmlFor="password">Password:</label>
        <input
          type="password"
          id="password"
          name="password"
          required
          onChange={handleChange}
          value={formData.password}
        />

        <label htmlFor="c_password">Confirm Password:</label>
        <input
          type="password"
          id="c_password"
          name="c_password"
          required
          onChange={handleChange}
          value={formData.c_password}
        />

        <input type="submit" value="Submit" />
      </form>
    </div>
  );
}

export default Registration;
