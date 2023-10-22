//Takes two Ids of node
export default class Link {
  id1: number;
  id2: number;

  constructor(id1: number, id2: number) {
    this.id1 = id1;
    this.id2 = id2;
  }

  printLink(): string {
    return "Link from the node " + this.id1 + " to the node " + this.id2 + ". ";
  }
}
