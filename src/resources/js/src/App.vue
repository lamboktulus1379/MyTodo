<template>
    <div id="app">
        <app-header />
        <router-view />
        <app-footer />
    </div>
</template>

<script>
import AppHeader from "./components/elements/AppHeader.vue";
import AppFooter from "./components/elements/AppFooter.vue";
export default {
    components: {
        AppHeader,
        AppFooter
    }
};
</script>

<style lang="scss">
#app {
    font-family: Roboto, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
}

#nav {
    padding: 30px;

    a {
        font-weight: bold;
        color: #2c3e50;

        &.router-link-exact-active {
            color: #42b983;
        }
    }
}
</style>
