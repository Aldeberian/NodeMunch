import './MainTitle.css';
import React from 'react';

interface titleProperties{
  children: React.ReactNode;  //Children is a special property that represents the content between
                              //the opening and closing blocks like <Example>THIS</Example>
}

function MainTitle({children} : titleProperties) {
  return (
    <div>
      {/* <div className='hello t1' style={{color: 'rgba(242, 204, 143, 0.25)'}}>{children}</div>
      <div className='hello t2' style={{color: 'rgba(252, 191, 73, 0.5)'}}>{children}</div>
      <div className='hello t3' style={{color: 'rgba(244, 162, 97, 0.75)'}}>{children}</div> */}
      <div className='hello' style={{color: 'Navy'}}>{children}</div>
      {/* rgba(231, 111, 81, 1) */}
    </div>
    
  );
}

export default MainTitle;

