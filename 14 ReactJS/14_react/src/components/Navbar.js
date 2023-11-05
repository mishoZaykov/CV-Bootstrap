import { Link } from "react-router-dom"

export default function Navbar(){
    return <nav className="nav">
        <ul>
            <li><Link to="/">Home</Link></li>
            <li><Link to="/login">Login</Link></li>
            <li><Link to="/register">Register</Link></li>
            <li><Link to="/cars">Cars</Link></li>
        </ul>
    </nav>
}