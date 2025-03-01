import { Navigate, Outlet } from "react-router-dom";
import { useStateContext } from "../contexts/contextprovider";

export default function Defaultlayout(){
   const { user, token} = useStateContext();
   if(!token) {
    return <Navigate to='/login'/>
   }
   const onLogout = (ev) =>{
    ev.preventDefault();
   }

    return (
        <div id="defaultLayout">
        <div className="content">
           <header>
               <div>
                   Header
               </div>
               <div>
                   Hello ,{user.name}
                   <a href="#" onClick={onLogout} className="btn-logout"> Logout</a>
               </div>
           </header>
           <main>
           <Outlet />
           </main>
           </div>
       </div>
    )
};