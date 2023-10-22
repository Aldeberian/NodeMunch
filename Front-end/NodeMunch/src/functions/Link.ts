//Takes two Ids of node
export default class Link {
  id1: string;
  id2: string;

  constructor(id1: string, id2: string) {
    this.id1 = id1;
    this.id2 = id2;
  }

  printLink(): string {
    return "Link from the node " + this.id1 + " to the node " + this.id2 + ". ";
  }
}
