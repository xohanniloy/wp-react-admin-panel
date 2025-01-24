import domReady from "@wordpress/dom-ready";
import { createRoot } from "@wordpress/element";
import { HashRouter, Routes, Route, NavLink } from "react-router";
import Home from "../../includes/components/Home";
import About from "../../includes/components/About";
import Contact from '../../includes/components/Contact';

domReady(() => {
    const SettingsPage = () => {
        return (
            <HashRouter>
                <nav>
                    <ul style={{ display: "flex", gap: "1rem" }}>
                        <li>
                            <NavLink to="/">Home</NavLink>
                        </li>
                        <li>
                            <NavLink to="/about">About</NavLink>
                        </li>
                        <li>
                            <NavLink to="/contact">Contact</NavLink>
                        </li>
                    </ul>
                </nav>
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/about" element={<About />} />
                    <Route path="/contact" element={<Contact />} />
                </Routes>
            </HashRouter>
        );
    };

    // const Home = () => (
    //     <div>
    //         <h1>Home</h1>
    //         <p>Welcome to the home page!</p>
    //     </div>
    // );

    // const About = () => (
    //     <div>
    //         <h1>About</h1>
    //         <p>This is the about page.</p>
    //     </div>
    // );

    // const Contact = () => (
    //     <div>
    //         <h1>Contact</h1>
    //         <p>Reach out to us on the contact page.</p>
    //     </div>
    // );

    const root = createRoot(document.getElementById("react-admin-setting-panel"));

    root.render(<SettingsPage />);
});
