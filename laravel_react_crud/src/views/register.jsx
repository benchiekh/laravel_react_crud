import { useRef } from "react";
import { Link } from "react-router-dom";



export default function register(){

    const nameRef = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();


    const Submit = (ev) => {
        ev.preventDefault();
        const payload = {
            name: nameRef.current.value ,
            email: emailRef.current.value, 
            password: passwordRef.current.value,
        }
                  
    }
    return (
        <div className="login-signup-form animated fadeinDown">
        <div className="form">
            <h1 className="title">
           Create A new Account
            </h1>
            <form onSubmit={Submit}>
                <input ref={nameRef} type="name" placeholder="Name" />
                <input  ref={emailRef} type="email" placeholder="Email" />
                <input ref={passwordRef} type="password" placeholder="password" />
                <button className="btn btn-block">Register</button>
                <p className="message">Already have an account ! <Link to='/login'>login</Link></p>
            </form>

        </div>

    </div>
    )
}