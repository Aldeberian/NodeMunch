import './Button.css';
import React from 'react';

interface buttonProperties{   //Here are the properties of the button :
  url: string;                //Url is given to navigate to the specified url
  color: string;              //Color is the color of the button (of the background)
  children: React.ReactNode;  //Children is a special property that represents the content
                              //that is placed between the opening and closing tags (<Button>THIS</Button>)
  hasEffect?: boolean;
}

// --text-color is a variable used in CSS to apply the same color to the background (and other things in the future?)
// "as React.CSSProperties" is needed because --text-color is not a default CSS property
function Button({url, color, children, hasEffect} : buttonProperties) {
  const buttonClassesUsed = hasEffect? 'btn effect' : 'btn';
  return (
    <a href={url} className={buttonClassesUsed} style={{'--color': color} as React.CSSProperties}> 
      {children}
    </a>
  );
}

export default Button;