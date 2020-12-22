<template>
    <div class="app-image">
        <div class="ai-container">
            <img :src="src" :alt="number" />
        </div>
        <div class="ai-description">
            <p class="g-margin-mt-10">{{ name }}</p>
            <p class="g-margin-mt-4 g-fs-xl g-fw-700">
                <span v-if="label != ''">{{ label }}</span
                >{{ number }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["src", "name", "label", "number"]
};
</script>

<style lang="scss" scoped>
.app-image {
    display: flex;
    flex-flow: column;
    justify-content: center;
    align-items: center;

    .ai-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;

        img {
            width: 100%;
            height: 35px;
        }
    }

    .ai-description {
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
    }
}
</style>
