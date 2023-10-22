import { useState } from "react";

import "./LaunchGameButton.css";

type HandleStatusChange = () => void;

export default function LaunchGameButton({
  handleStatusChange,
}: {
  handleStatusChange: HandleStatusChange;
}) {
  const [isButtonVisible, setIsButtonVisible] = useState(true);

  const handleButtonClick = () => {
    setIsButtonVisible(false);
    handleStatusChange();
  };

  return (
    <div id="launchGameButton">
      {/*The button is not displayed on the page if the game is in playing mode
        The goal of this button is just to launch the game once you've finished editing your graph*/}
      {isButtonVisible ? (
        <button onClick={handleButtonClick}>Play</button>
      ) : null}
    </div>
  );
}
