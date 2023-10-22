//Named NodeP because you can't name something Node in typescript, it's taken already
export default class NodeP {
  id: string;
  posX: number;
  posY: number;

  constructor(id: string, posX: number, posY: number) {
    this.id = id;
    this.posX = posX;
    this.posY = posY;
  }

  printCoordinates(): string {
    return (
      "Node : " +
      this.id +
      " Position X : " +
      this.posX +
      ", Position Y : " +
      this.posY
    );
  }
}
