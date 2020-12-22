<template>
    <main>
        <div class="app-container">
            <div class="app-container-donate g-block g-ai-center g-jc-center">
                <section class="section-donate">
                    <div class="donation-badge g-bg-primary g-br-12">
                        <p
                            class="g-text-white g-fs-lg g-ta-center g-color-white g-fw-700"
                        >
                            Silahkan Login
                        </p>
                    </div>
                    <div class="g-form">
                        <div class="g-from-content g-margin-mt-16">
                            <app-input
                                :required="true"
                                label="Email"
                                v-model="user.email"
                                placeholder="Masukkan email anda"
                            >
                                <p
                                    class="g-color-danger g-margin-mt-4 g-fs-xs"
                                    v-for="(err, idx) in error.email"
                                    :key="idx"
                                >
                                    {{ err }}
                                </p>
                            </app-input>
                        </div>
                        <div class="g-from-content g-margin-mt-16">
                            <app-input
                                label="Password"
                                v-model="user.password"
                                type="password"
                                placeholder="******"
                                :required="true"
                            >
                                <p
                                    class="g-color-danger g-margin-mt-4 g-fs-xs"
                                    v-for="(err, idx) in error.phone"
                                    :key="idx"
                                >
                                    {{ err }}
                                </p>
                            </app-input>
                        </div>

                        <div class="donate-action g-flex-as-center">
                            <app-button @click="next()" type="lg">
                                <span class="g-fw-700">Next</span>
                            </app-button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios";
import { mapGetters, mapActions } from "vuex";
import AppButton from "../components/AppButton.vue";
import AppInput from "../components/AppInput.vue";
import AppImage from "../components/AppImage.vue";
export default {
    components: {
        AppButton,
        AppInput,
        AppImage
    },

    data: () => {
        return {
            user: {
                email: "admin@admin.com",
                password: "password"
            },
            error: {},
            save: false
        };
    },

    computed: {
        ...mapGetters({
            authenticated: "auth/authenticated",
            auth: "auth/user"
        })
    },

    methods: {
        ...mapActions({
            signIn: "auth/signIn"
        }),

        async next() {
            await this.signIn(this.user);

            this.$router.push("/");
        }
    },

    watch: {
        news(oldVal, newVal) {
            console.log("Old Value", oldVal, newVal);
        }
    },
    mounted() {
        if (this.auth) {
            console.log("True and white not redirect");
            this.$router.push("/");
        }
    }
};
</script>

<style lang="scss" scoped>
$color-primary: #5452f6;
$color-white: #ffffff;
.app-container-donate {
    display: flex;
    flex-flow: column;
    .donation-badge {
        padding: 16px;
        margin-bottom: 16px;

        @media only screen and (max-width: 768px) {
            width: 100%;
            margin-top: 8px;
        }
    }

    .section-donate {
        margin: 0 auto;
        width: 450px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 10%);
        padding: 16px;
        border-radius: 12px;

        .g-form {
            display: flex;
            flex-flow: column;

            .donate-number {
                margin-top: 16px;
                .donate-title {
                    color: $color-primary;
                    margin-bottom: 8px;
                    text-align: center;
                }

                .donate-content {
                }
            }

            .donate-action {
                margin-top: 16px;
            }
        }
    }

    .section-bank {
        display: flex;
        justify-content: space-between;
        margin: 0 auto;
        margin-top: 32px;
        width: 450px;
    }

    .section-help {
        margin: 0 auto;
        align-self: center;

        p {
            font-size: 24px;
        }
    }

    .section-thanks {
        text-align: center;
        margin-top: 40px;
    }
}
</style>
