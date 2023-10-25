import "./CreditsPage.css"

import Button from "../components/Button"
import MainTitle from "../components/MainTitle"
import WavyBackground from "../components/WavyBackground"

function CreditsPage(){
  return(
    <div>
      {/* Will change in the future to the Title component (smaller, maybe another font...)*/}
      <MainTitle>Credits</MainTitle>
      <WavyBackground/>
      <div className="container">
        <div className="elements authors">
          <h1>L'équipe InProgress :</h1>
          <ul>
            <li>Cléo EIRAS</li>
            <li>Lola CHALMIN</li>
            <li>Yann CHAMPEAU</li>
            <li>Baptiste BRUNET</li>
            <li>Nicolas BLONDEAU</li>
          </ul>
          <Button url="/" color="green">Ok !</Button>
        </div>
      </div>
    </div>
  )
}

export default CreditsPage