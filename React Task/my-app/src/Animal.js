import React from 'react'
import "./Animal.css";

const Animal = ({name, isMammal}) => {
    return(
        <div className='animal'>
            <h2 className='animal-name'>{name}</h2>
            <p className={isMammal ? 'mammal': 'not-mammal'}>{isMammal ? 'Mammal': 'Not a Mammal'}</p>
        </div>
    );
};

export default Animal;