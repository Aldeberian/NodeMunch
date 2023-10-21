//import React elements
import React from 'react'
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

//import CSS
import './App.css'

//import pages
import MenuPage from './pages/MenuPage.tsx'
import PlayPage from './pages/PlayPage.tsx'
import ParametersPage from './pages/ParametersPage.tsx'
import CreditsPage from './pages/CreditsPage.tsx'


function App() {

  return (
    <>
      <Router>
        <Routes>
          <Route path="/" element={<MenuPage />} />
          <Route path="/play" element={<PlayPage />} />
          <Route path="/parameters" element={<ParametersPage/>} />
          <Route path="/credits" element={<CreditsPage/>} />
        </Routes>
      </Router>
    </>
  )
}

export default App
