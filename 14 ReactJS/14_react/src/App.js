import React from 'react';
import { BrowserRouter as Router, Route, Routes  } from 'react-router-dom';
import Registration from './components/Registration';
import Login from './components/Login';
import Home from './components/Home';
import "./styles.css";
import Dashboard from './components/Dashboard';
import Cars from './components/Cars';
import Navbar from './components/Navbar';
import CarDetails from './components/CarDetails';

function App() {
  return (
    <>
    <Router>
    <Navbar/>
      <Routes>
        <Route path="/" element={<Home/>} />
        <Route path="/register" element={<Registration/>} />
        <Route path="/login" element={<Login/>} />
        <Route path="/dashboard/:userId" element={<Dashboard/>} />
        <Route path="/cars" element={<Cars/>} />
        <Route path="/cars/:carId" element={<CarDetails/>} />
      </Routes>
    </Router>
    </>
  );
}

export default App;
