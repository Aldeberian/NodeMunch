import Button from "../components/Button"
import MainTitle from "../components/MainTitle"
import WavyBackground from "../components/WavyBackground"
import "./ParametersPage.css"

function ParametersPage(){
  return(
    <div>
      {/* Will change in the future to the Title component (smaller, maybe another font...)*/}
      <MainTitle>Options</MainTitle>
      <WavyBackground/>
      <div className="container">
        <div className="elements">
          <Button url="" color="orange">This is a button</Button>
          <Button url="" color="orange">This is another button</Button>
          <Button url="" color="#3498db">Maybe another button</Button>
          <table>
            <td><Button url="/" color="green">Save</Button></td>
            <td>  </td>
            <td><Button url="/" color="red">Cancel</Button></td>
          </table>
        </div>
      </div>
    </div>
  )
}

export default ParametersPage