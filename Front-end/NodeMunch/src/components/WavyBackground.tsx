import './WavyBackground.css'

interface properties{
  firstTimeLoad?: boolean;
}
function WavyBackground({firstTimeLoad} : properties){
  // Use the upEffect class in addition to backgroundSection if the firstTimeLoad is true
  const animations = firstTimeLoad? 'backgroundSection upEffect' : 'backgroundSection';

  return (
    <section className={animations}>
      <div className='air air1'></div>
      <div className='air air2'></div>
      <div className='air air3'></div>
      <div className='air air4'></div>
    </section>
  );
}

export default WavyBackground;