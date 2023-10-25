import { useState } from "react";

import "./LaunchGameButton.css";

type HandleStatusChange = () => void;

export default function LaunchGameButton({
  handleStatusChange,
}: {
  handleStatusChange: HandleStatusChange;
}) {

  return (
    <div id="launchGameButton">
      {/*The button is not displayed on the page if the game is in playing mode
        The goal of this button is just to launch the game once you've finished editing your graph*/}
        <button onClick={handleStatusChange}>Play</button>
    </div>
  );
}
