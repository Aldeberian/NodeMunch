import './MenuPage.css'
import Button from '../components/Button.tsx'
import MainTitle from '../components/MainTitle.tsx'

function MenuPage() {
    return (
        <div>
            <img src="Logo.png" alt="Logo" className="logo"/>
            <div className = "menu">
                <MainTitle>NodeMunch</MainTitle>
                <Button url='/' color='#3498db'>Without effect</Button>
                <Button url='/' color='#3498db' hasEffect={true}>With effect</Button>
                <Button url='/play' color='green'>Play</Button>
                <Button url='/play' color='green' hasEffect={true}>Play</Button>
                <Button url='/parameters' color='red'>Parameters</Button>
                <Button url='/parameters' color='red' hasEffect={true}>Parameters</Button>
            </div>
        </div>
    )
}
export default MenuPage