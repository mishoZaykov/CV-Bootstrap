import React from "react";
import "./styles.css";
import Navbar from "./Navbar";
import Home from './pages/Home'
import Blog from "./pages/Blog";
import Article from "./pages/Article";
import Contact from "./pages/Contact";
import { Route, Routes } from "react-router-dom"

function App() {
 
  return (
    <>
    <Navbar/>
    <div className="container">
    <Routes>
      <Route path="/" element={<Home/>}/>
      <Route path="/blog" element={<Blog/>}/>
      <Route path="/blog/:id" element={<Article/>}/>
      <Route path="/contact" element={<Contact/>}/>
    </Routes>
    </div>
    </>
  );
}

export default App;
