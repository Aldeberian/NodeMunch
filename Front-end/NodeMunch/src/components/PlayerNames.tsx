import React from "react";
import "./PlayerNames.css";

interface PlayerNamesProps {
  turnToPlay: string;
  playerNames: string[];
}

/**
 *
 * @param turnToPlay : name of the player whose turn it is to play
 * @param playerNames : list of the names of the players
 * @returns iterates through all the player names and if the name is 
 * the same as the name of the player whose turn it is to play, 
 * the name is displayed with the css class "Active"
 */
const PlayerNames = ({ turnToPlay, playerNames }: PlayerNamesProps) => {
  return (
    <div>
      {playerNames.map((playerName) => (
        <div className={turnToPlay === playerName ? "Active" : "Inactive"}>
          <p>{playerName}</p>
        </div>
      ))}
    </div>
  );
};

export default PlayerNames;
