import './MenuPage.css'
import Button from '../components/Button.tsx'
import MainTitle from '../components/MainTitle.tsx'

function MenuPage() {
    return (
        <div>
            <img src="Logo.png" alt="Logo" className="logo"/>
            <div className = "menu">
                <MainTitle>NodeMunch</MainTitle>
                <Button url='/'>Main page button test</Button>
                <Button url='/play'>Play</Button>
                <Button url='/parameters'>Parameters</Button>
            </div>
        </div>
    )
}
export default MenuPage