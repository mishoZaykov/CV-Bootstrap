import Animal from "./Animal";
import React from "react";

const animals = [
  { name: "Lion", isMammal: true },
  { name: "Snake", isMammal: false },
  { name: "Dolphin", isMammal: true },
  { name: "Crocodile", isMammal: false },
  { name: "Elephant", isMammal: true },
  { name: "Shark", isMammal: false },
  { name: "Gorilla", isMammal: true },
  { name: "Parrot", isMammal: false },
  { name: "Kangaroo", isMammal: true },
  { name: "Tiger", isMammal: true },
  { name: "Penguin", isMammal: false },
  { name: "Hippopotamus", isMammal: true },
]; 

function App() {
  return (
    <div className="App">
      <h1>List of Animals</h1>
      <div className="animal-list">
        {animals.map((animal, index) =>(
          <Animal key={index} name={animal.name} isMammal={animal.isMammal}/>
        ))}
      </div>
    </div>
  )
}

export default App;
