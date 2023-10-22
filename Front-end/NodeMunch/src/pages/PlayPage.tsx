import React, { useState } from "react";
import Graph from "../functions/Graph";
import EditBoard from "../components/EditingBoard";
import PlayingBoard from "../components/PlayingBoard";
import LaunchGameButton from "../components/LaunchGameButton";
import PlayerNames from "../components/PlayerNames";
import './PlayPage.css'

const grap = new Graph();

function Play() {
  //The status of the game, true if the game is playing, false if the game is in edit mode
  const [playStatus, setPlayStatus] = useState(false);

  const handleStatusChange = () => {
    setPlayStatus(!playStatus);
  };

  //The name of the players on the game
  const playerNames = ["player1", "player2", "player3"];

  return (
    <div id="playPage">
      {/*The first player from the list of players is chosen to play first by default*/}
      <div id="playerNames"><PlayerNames turnToPlay={playerNames[0]} playerNames={playerNames} /></div>
      <div id="playingZone">
        {/*Depending on the state of the game, displays the edit component or the play component
        When the play component is displayed, the button doesn't exist on the page anymore*/}
        {playStatus ? null : <LaunchGameButton handleStatusChange={handleStatusChange} /> }
        {playStatus ? <PlayingBoard graph={grap}/> : <EditBoard />}
      </div>
    </div>
  );
}

export default Play;
