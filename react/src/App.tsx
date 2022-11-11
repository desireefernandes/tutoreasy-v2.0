import {BrowserRouter, Route, Routes} from 'react-router-dom';

import { SignIn } from "./pages/SignIn";
import { Register } from "./pages/Register";
import "./styles/global.css";


export function App() {
  return (
    
    <div className="App">
    
    <BrowserRouter>
      <Routes>
        
        <Route path="/SignIn" element={<SignIn />} />
        <Route path="/Register" element={<Register />} />

      </Routes>
    </BrowserRouter>
    </div>

  )
}