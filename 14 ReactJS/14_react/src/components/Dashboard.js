import React, { useState, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

function Dashboard() {
  const [userInfo, setUserInfo] = useState({ username: "", email: "" });
  const { userId } = useParams();
  const authToken = localStorage.getItem("authToken");

  const [editFormData, setEditFormData] = useState({
    name: "",
    email: "",
  });
  useEffect(() => {
    axios
      .get(`http://127.0.0.1:8000/api/getUserInfo/${userId}`, {
        headers: {
          Authorization: `Bearer ${authToken}`,
        },
      })
      .then((response) => {
        setUserInfo(response.data.data);
      })
      .catch((error) => {
        console.error(error);
      });
  }, [userId, authToken]);

  const handleEditSuccess = (updateUserData) => {
    setUserInfo({ ...userInfo, ...updateUserData });
  };

  const handleChange = (e) => {
    setEditFormData({
      ...editFormData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      await axios.post(
        `http://127.0.0.1:8000/api/updateUserInfo/${userId}`,
        editFormData,
        {
          headers: {
            Authorization: `Bearer ${authToken}`, 
          },
        }
      );

      handleEditSuccess(editFormData);

      alert("User information updated successfully");
    } catch (error) {
      console.error(error);
    }
  };

  return (
    <div>
      <div className="container">
        <h1>Dashboard</h1>
        <div>
          <p>Username: {userInfo.name}</p>
          <p>Email: {userInfo.email}</p>
        </div>
      </div>
      
        <div className="form-container">
          <h2>Edit User Information</h2>
          <form onSubmit={handleSubmit}>
            <label htmlFor="name">Username:</label>
            <input
              type="text"
              id="name"
              name="name"
              required
              onChange={handleChange}
              value={editFormData.name}
            />

            <label htmlFor="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              required
              onChange={handleChange}
              value={editFormData.email}
            />

            <input type="submit" value="Save Changes" />
          </form>
        </div>
       
    </div>
  );
}

export default Dashboard;
