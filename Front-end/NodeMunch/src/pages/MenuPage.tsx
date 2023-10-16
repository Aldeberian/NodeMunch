import './MenuPage.css'
import Bouton from '../components/Bouton.tsx'

function MenuPage() {
    return (
        <div className = "menu">
            <img src="Logo.png" alt="Logo" className="logo" />

            <Bouton/>
        </div>
    )
}
export default MenuPage