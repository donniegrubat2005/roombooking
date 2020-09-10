import Vue from "vue";
import VueRouter from "vue-router";
import Login from "./components/pages/auth/Login.vue";
import Register from "./components/pages/auth/Register.vue";
import Home from "./components/pages/home/Home.vue";
import Dashboard from "./components/pages/home/Dashboard.vue";
import Profile from "./components/pages/profile/Profile.vue";
import UserList from "./components/pages/profile/UserList.vue";
import ChangePassword from "./components/pages/profile/ChangePassword.vue";

// Books component
import Book from "./components/pages/book/Book.vue";
import BookList from "./components/pages/book/List.vue";
import CreateBook from "./components/pages/book/Create.vue";
import EditBook from "./components/pages/book/Edit.vue";

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
                    path: "/books",
                    name: "book",
                    component: Book,
                    meta: {
                        title: "Book",
                        description: "This is book page",
                        requiresAuth: true
                    },
                    children: [
                        {
                            path: "list",
                            name: "booklist",
                            component: BookList,
                            meta: {
                                title: "Book List"
                            }
                        },
                        {
                            path: "create",
                            name: "createbook",
                            component: CreateBook,
                            meta: {
                                title: "Create Book"
                            }
                        },
                        {
                            path: ":id/edit",
                            name: "editbook",
                            component: EditBook,
                            meta: {
                                title: "Edit Book"
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
