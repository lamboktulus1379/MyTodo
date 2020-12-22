<template>
    <button
        :class="{
            'g-btn-lg': variant == 'g-btn-lg',
            'g-btn-lg-block': variant == 'g-btn-lg-block',
            'g-btn-block': variant == 'g-btn-block',
            'g-btn-sm': variant == 'g-btn-sm',
            'g-btn-default': variant == 'g-btn-default'
        }"
        type="button"
        :disabled="disabled"
        :loading="loading"
        @click="$emit('click')"
    >
        <slot v-if="!loading" />
        <span class="g-fai" v-else>
            <font-awesome-icon icon="spinner" pulse />
        </span>
    </button>
</template>

<script>
export default {
    props: ["variant", "loading", "disabled"],
    methods: {
        goRoute() {
            return this.$router.push(this.link);
        }
    }
};
</script>

<style lang="scss">
$color-primary: #5452f6;
$color-white: #ffffff;
$--g-color-secondary: #2097f6;
$--g-color-white: #ffffff;
$--g-color-default: #c4c4c4;
$--g-color-white-md: #eeeeff;
$--g-color-white-sm: rgba(229, 229, 229, 0.24);
$--g-color-danger: #de1306;

button {
    background: $color-primary;
    color: $color-white;
    padding: 8px 16px;
    border: none;
    outline: none;
    cursor: pointer;
    border-radius: 6px;
    font-size: 16px;
    transition: background ease-out 0.25s;

    &:disabled {
        background: $--g-color-default;
    }
}
.g-btn-lg {
    padding: 10px 18px;
    font-size: 18px;
    min-width: 120px;
}
.g-btn-lg-block {
    padding: 10px 18px;
    font-size: 18px;
    min-width: 120px;
    width: 100%;
}
.g-btn-sm {
    padding: 6px 14px;
    font-size: 14px;
}
.g-btn-default {
    background-color: $--g-color-default;
}

.g-btn-block {
    width: 100%;
}
</style>
