import {createBrowserRouter} from 'react-router-dom';
import Login from './views/login.jsx';
import Register from './views/register.jsx'; 
import DefaultLayout from './Components/defaultLayout.jsx';
import GuestLayout from './Components/guestLayout.jsx';
import Users from './views/Users.jsx';

const router = createBrowserRouter ([

    {
        path:'/',
        element: <DefaultLayout />,
        children: [
            {
                path:'/users',
                element: <Users />
            },
        ]
    },
    {
        path:'/',
        element: <GuestLayout/>,
        children: [
            {
                path:'/login',
                element:<Login />
            },
            {path :'/register',
            element : <Register />
            }
                ]
    },
  


]);
export default router ;
