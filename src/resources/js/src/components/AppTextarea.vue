<template>
    <div class="app-input-container">
        <div class="app-input g-block g-br-4">
            <label for="" v-if="label">{{ label }}</label>
            <div class="input-wrapper g-block">
                <div class="input-content">
                    <span
                        class="input-symbol g-color-primary g-fw-700"
                        v-if="currency"
                        >Rp</span
                    >
                    <textarea
                        @focus="keyFocus($event)"
                        :rows="rows"
                        :cols="cols"
                        :id="id"
                        class="g-input-block"
                        :type="type || 'text'"
                        :placeholder="placeholder"
                        v-bind:value="value"
                        v-on:input="$emit('input', $event.target.value)"
                    />
                </div>
            </div>
        </div>
        <div class="app-message">
            <div class="app-input-label"></div>
            <div class="app-input-message">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        "label",
        "rows",
        "cols",
        "email",
        "placeholder",
        "type",
        "currency",
        "value",
        "id"
    ],

    methods: {
        keyFocus(e) {
            console.log("Event: ", e, e.scrollHeight);
        }
    },

    mounted() {}
};
</script>

<style lang="scss">
.app-input-container {
    display: flex;
    flex-flow: column;

    .app-input,
    .app-message {
        display: inline-flex;
        align-items: center;

        label,
        .app-input-label {
            flex: 0 0 120px;
            color: #444444;
        }

        .input-content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;

            .input-symbol {
                margin-right: 8px;
            }

            textarea {
                height: auto;
                display: flex;
                outline: none;
                border: none;
                padding: 8px;
                background: var(--g-color-white-sm);
                box-shadow: 0 0 4px rgba(0, 0, 0, 10%);
                font-size: var(--d-fs-lg);
                color: #444444;
            }
        }
    }
    .app-input-message {
    }
}
</style>
