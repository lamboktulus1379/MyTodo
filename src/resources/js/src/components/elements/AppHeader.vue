<template>
    <div class="app-fluid app-sticky box-shadow-md">
        <div class="app-container">
            <header>
                <div class="header-title g-ln-2 g-flex g-flex-ai-center">
                    <div class="g-link g-color-primary g-fw-700 g-fs-lg">
                        <font-awesome-icon icon="home" @click="goRoute('/')" />
                    </div>
                    <div
                        class="g-link g-color-primary g-fw-700 g-fs-lg g-margin-ml-16"
                    >
                        <app-button icon="home" @click="goRoute('/login')" v-if="!isLogin()"
                            >Login</app-button
                        >
                         <app-button icon="home" @click="goRoute('/admin')" v-else
                            >Admin</app-button
                        >
                    </div>
                </div>
                <div class="header-team g-color-secondary">
                    <span>My Todo</span>
                </div>
            </header>
        </div>
    </div>
</template>

<script>
import AppButton from "../AppButton.vue";
export default {
    components: { AppButton },
    methods: {
        goRoute(path) {
            this.$router.push(path).catch(() => {});
        },
        isLogin() {
            return sessionStorage.getItem("token") != null;
        }
    }
};
</script>

<style lang="scss" scoped>
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 0;
    @media only screen and (max-width: 768px) {
        padding: 8px;
    }

    .header-title {
        @media only screen and (max-width: 768px) {
            font-size: 16px;
        }
    }

    .header-team {
        font-weight: 600;
    }
}
</style>
