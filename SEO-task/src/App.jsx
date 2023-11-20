import { Route, Routes } from "react-router-dom";

import Footer from "./components/Footer";
import Header from "./components/Header"; 
import Home from "./components/Home";
import About from "./components/About";

import "./index.css";
import Contact from "./components/Contact";
import Services from "./components/Services";

function App() {
  return (
    <>
      <Header />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/about" element={<About />} />
        <Route path="/contact" element={<Contact />} />
        <Route path="/services" element={<Services />} />
      </Routes>
      <Footer />
    </>
  );
}

export default App;
