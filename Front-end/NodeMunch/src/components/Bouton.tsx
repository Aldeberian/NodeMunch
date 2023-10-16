import './Bouton.css'

const boutonsAvecLiens = [
    { texte: 'JOUER', lien: '/play' },
    { texte: 'PARAMETERS', lien: '/parameters' }
  ];
  
  function Bouton() {
    return (
      <div>
        {boutonsAvecLiens.map((bouton, index) => (
          <a key={index} href={bouton.lien}>
            <div className='bouton'>{bouton.texte}</div>
          </a>
        ))}
      </div>
    );
  }

export default Bouton