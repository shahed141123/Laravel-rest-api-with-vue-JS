import Manageabout from "../components/admin/about/Manage";
import Dashboard from "../components/admin/Dashboard/Dashboard";
import AddAbout from "../components/admin/about/AddAbout";
import EditAbout from "../components/admin/about/EditAbout";
import Settings from "../components/admin/Settings/Settings";
import Clear from "../components/admin/Settings/Clear";


export const routes = [

    {
        path: "/",
        component: Dashboard,
    },
    {
        path: "/manage-about",
        component: Manageabout,
    },
    {
        path: "/add-about",
        component: AddAbout,
    },
    {
        path: "/edit-about",
        component: EditAbout,
    },
    {
        path: "/settings",
        component: Settings,
    },
    {
        path: "/clear",
        component: Clear,
    },
];


