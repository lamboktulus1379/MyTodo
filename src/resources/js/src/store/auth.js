import axios from "axios";
import { times } from "lodash";

export default {
    namespaced: true,

    state: {
        authenticated: false,
        user: null
    },

    getters: {
        authenticated(state) {
            return state.authenticated;
        },
        user(state) {
            return state.user;
        }
    },

    user(state) {
        return state.user;
    },

    mutations: {
        SET_AUTHENTICATED(state, value) {
            state.authenticated = value;
        },

        SET_USER(state, value) {
            state.user = value;
        }
    },

    actions: {
        async signIn({ dispatch }, credentials) {
            await axios.get("/sanctum/csrf-cookie");
            await axios.post("/api/login", credentials).then(res => {
                console.log("res", res);

                sessionStorage.setItem('token', res.data.token);
                console.log(sessionStorage.getItem("token"));             

                location.reload();
            });

            return dispatch("me");
        },

        async signOut({ dispatch }, credentials) {
            await axios.post("/api/logout", credentials);

            sessionStorage.removeItem('token');
            location.reload();
            return dispatch("me");
            this.$router.push('/login');
        },

        me({ commit }) {
            return axios
                .get("/api/users")
                .then(response => {
                    commit("SET_AUTHENTICATED", true);
                    commit("SET_USER", response.data);
                })
                .catch(() => {
                    commit("SET_AUTHENTICATED", false);
                    commit("SET_USER", null);
                });
        }
    }
};
