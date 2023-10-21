import './Button.css';
import React from 'react';

interface buttonProperties{   //Here are the properties of the button :
  url: string;                //Url is given to navigate to the specified url
  children: React.ReactNode;  //Children is a special property that represents the content
                              //that is placed between the opening and closing tags (<Button>THIS</Button>)
}

function Button({url, children} : buttonProperties) {
  return (
    <a href={url} className="btn">
      {children}
    </a>
  );
}

export default Button;