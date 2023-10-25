import './MenuPage.css'
import Button from '../components/Button.tsx'
import MainTitle from '../components/MainTitle.tsx'
import WavyBackground from '../components/WavyBackground.tsx'

function MenuPage() {
    return (
        <div className='containerTopPage'>
            <MainTitle>NodeMunch</MainTitle>
            <WavyBackground firstTimeLoad={true}/>
            
            <div className='container'>
                <a href='https://youtu.be/dQw4w9WgXcQ' target='_blank'>
                    <img src="Logo.png" alt="Logo" className="logo"/>
                </a>
            </div>
            <div className = "elements">
                <Button url='/play' color='#3498db' hasEffect={true}>This page</Button>
                <Button url='/playSelection' color='orange' hasEffect={true}>Play</Button>
                <Button url='/parameters' color='red' hasEffect={true}>Options</Button>
                <Button url='/credits' color='green' hasEffect={true}>Credits</Button>
            </div>
        </div>
    )
}

export default MenuPage