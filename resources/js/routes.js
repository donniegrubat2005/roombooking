import Vue from "vue";
import VueRouter from "vue-router";
import Login from "./components/pages/auth/Login.vue";
import Register from "./components/pages/auth/Register.vue";
import Home from "./components/pages/home/Home.vue";
import Dashboard from "./components/pages/home/Dashboard.vue";
import Profile from "./components/pages/profile/Profile.vue";
import UserList from "./components/pages/profile/UserList.vue";
import ChangePassword from "./components/pages/profile/ChangePassword.vue";

// Manage Facility components
import ManageFacility from "./components/pages/manage_facility/ManageFacility.vue";
import ManageFacilityList from "./components/pages/manage_facility/List.vue";
import CreateManageFacility from "./components/pages/manage_facility/CreateForm.vue";
import EditManageFacility from "./components/pages/manage_facility/EditForm.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "login",
            component: Login
        },
        {
            path: "/register",
            name: "/register",
            component: Register
        },
        {
            path: "/home",
            name: "home",
            component: Home,
            meta: {
                requiresAuth: true
            },
            children: [
                {
                    path: "/dashboard",
                    name: "dashboard",
                    component: Dashboard,
                    meta: {
                        title: "Dashboard",
                        description: "This is dashboard page"
                    }
                },
                {
                    path: "/managefacilities",
                    name: "managefacilities",
                    component: ManageFacility,
                    meta: {
                        requiresAuth: true
                    },
                    children: [
                        {
                            path: "list",
                            name: "managefacilitylist",
                            component: ManageFacilityList,
                            meta: {
                                title: "Manage Facility List"
                            }
                        },
                        {
                            path: "create",
                            name: "create_manage_facility",
                            component: CreateManageFacility,
                            meta: {
                                title: "Create Manage Facility"
                            }
                        },
                        {
                            path: ":id/edit",
                            name: "edit_manage_facility",
                            component: EditManageFacility,
                            meta: {
                                title: "Edit Manage Facility"
                            }
                        }
                    ]
                },
                {
                    path: "/profile",
                    name: "profile",
                    component: Profile,
                    meta: {
                        meta: {
                            requiresAuth: true
                        },
                        title: "Profile",
                        description: "This is profile page"
                    },
                    children: [
                        {
                            path: "list",
                            name: "userlist",
                            component: UserList,
                            meta: {
                                title: "User List"
                            }
                        },
                        {
                            path: ":id/changepassword",
                            name: "changepassword",
                            component: ChangePassword,
                            meta: {
                                title: "Change Password"
                            }
                        }
                    ]
                }
            ]
        }
    ],
    linkActiveClass: "active",
    linkExactActiveClass: "active"
});
export default router;
