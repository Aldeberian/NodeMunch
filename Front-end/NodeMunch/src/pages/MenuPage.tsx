import './MenuPage.css'
import Bouton from '../components/Bouton.tsx'

function MenuPage() {
    return (
        <div className = "menu">
            <img src="Logo.png" alt="Logo" className="logo" />

            <div id="Buttons">
                <Bouton/>
            </div>
        </div>
    )
}
export default MenuPage