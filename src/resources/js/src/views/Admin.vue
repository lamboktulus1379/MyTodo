<template>
    <div class="app-container-admin g-margin-mt-16">
        <div class="app-container-sidebar g-margin-ml-16">
            <div class="g-sidebar g-bg-primary g-br-8">
                <div
                    class="g-sidebar-head g-p-16 g-flex g-jc-center g-ai-center"
                >
                    <div
                        class="g-sidebar-image g-flex g-flex-jc-center g-flex-ai-center g-color-white"
                    >
                        <font-awesome-icon icon="user-alt" size="6x" />
                    </div>
                </div>

                <div class="g-sidebar-body">
                    <ul>
                        <li>
                            <app-button
                                @click="goRoute('/admin')"
                                variant="g-btn-lg-block"
                            >
                                <span class="g-fw-700">Home</span>
                            </app-button>
                        </li>
                        <li>
                            <app-button
                                @click="goRoute('/admin/blog')"
                                variant="g-btn-lg-block"
                            >
                                <span class="g-fw-700">Blog</span>
                            </app-button>
                        </li>
                       
                        <li>
                            <app-button
                                @click="signOut"
                                variant="g-btn-lg-block"
                            >
                                <span class="g-fw-700">Logout</span>
                            </app-button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-container-view">
            <router-view />
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { mapGetters, mapActions } from "vuex";

import AppButton from "../components/AppButton.vue";
export default {
    components: {
        AppButton
    },

    data() {
        return {
            donations: [],
            loadingUpdate: false,
            dt: {},
            STATUS_PAID: 1,
            currentIdx: null,
            updateFinish: false
        };
    },
    computed: {
        ...mapGetters({
            authenticated: "auth/authenticated",
            user: "auth/user"
        })
    },

    watch: {
        donations(newVal, oldVal) {
            console.log("new Val: ", newVal, oldVal);
        }
    },

    methods: {
        ...mapActions({
            signOutAction: "auth/signOut"
        }),

        goRoute(path) {
            this.$router.push(path).catch(() => {});
        },

        async signOut() {
            await this.signOutAction(this.user);

            this.$router.replace({ name: "Login" });
        },
        getDonations() {
            axios.get("/api/donations?status=1").then(res => {
                this.donations = res.data.data;
            });
        },

        updateDonation(idx) {
            this.currentIdx = idx;
            let id = this.donations[idx].id;
            this.loadingUpdate = true;
            this.dt = {
                status: this.STATUS_PAID
            };
            axios.put(`/api/donations/${id}`, this.dt).then(res => {
                this.getDonations();

                this.loadingUpdate = false;
                this.currentIdx = null;
            });
        }
    },
    mounted() {
        if (!this.user) {
            this.$router.replace({ name: "Login" });
        }
    }
};
</script>

<style lang="scss" scoped>
.app-container-admin {
    display: flex;
    justify-content: space-between;

    .g-sidebar {
        ul {
            list-style: none;
        }
    }

    .app-container-view {
        flex: calc(100% - 250px);
        margin: 0 16px;
        min-height: 500px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 10%);
        padding: 16px;
        border-radius: 12px;
    }
    a {
        &.router-link-exact-active {
            color: #42b983;
        }
    }
}
</style>
