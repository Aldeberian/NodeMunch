import "./PlaySelectionPage.css"

import Button from "../components/Button"
import MainTitle from "../components/MainTitle"
import WavyBackground from "../components/WavyBackground"

function PlaySelectionPage(){
  return(
    <div>
        {/* Will change in the future to the Title component (smaller, maybe another font...)*/}
        <MainTitle>plAy</MainTitle>
        <WavyBackground/>
        <div className="elements">
            <table>
                <td className="rows">
                    <tr><Button url="/" color="red">1 VS IA</Button></tr>
                    
                    <tr><Button url="/" color="green" hasEffect={true}>1 VS 1</Button></tr>
                    <tr><Button url="/" color="red">Multiplayer</Button></tr>
                </td>
                <td className="rows">
                    <tr><Button url="/" color="orange">Community</Button></tr>
                    <tr><Button url="/" color="orange">Create group</Button></tr>
                    <tr><Button url="/" color="orange">Join group</Button></tr>
                </td>
            </table>
            <Button url='/' color="red">Back</Button>
        </div>
    </div>
  )
}

export default PlaySelectionPage