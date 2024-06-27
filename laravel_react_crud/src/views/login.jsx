import { Link } from "react-router-dom";

export default function login() {
    const Submit = (ev) => {
        ev.preventDefault();
    }

    return (
        <div className="login-signup-form animated fadeinDown">
            <div className="form">
                <h1 className="title">
                    Login to your Account
                </h1>
                <form onSubmit={Submit}>
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="password" />
                    <button className="btn btn-block">Login</button>
                    <p className="message">not registered ! <Link to='/register'>Create a new account</Link></p>
                </form>

            </div>

        </div>
    )
}