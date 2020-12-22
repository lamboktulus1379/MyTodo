<template>
    <b-container class="bv-example-row g-p-16">
        <b-row>
            <b-col md="3">
                <b-form-input
                    v-model="sectionSave.title"
                    placeholder="Enter your name"
                ></b-form-input>

                <b-form-textarea
                    id="textarea"
                    v-model="sectionSave.description"
                    placeholder="Description"
                    rows="3"
                    max-rows="6"
                ></b-form-textarea>
                <b-button
                    variant="primary"
                    v-if="!editSectionActive"
                    @click="addSection()"
                    >Add Section</b-button
                >
                <b-button variant="primary" v-else @click="saveSection()"
                    >Save</b-button
                >
                <div class="app-container-sidebar g-margin-ml-16">
                    <div class="g-sidebar g-bg-primary g-br-8">
                        <div class="g-sidebar-body">
                            <ul>
                                <li
                                    v-for="(section, idx) in sections"
                                    :key="idx"
                                >
                                    <b-container>
                                        <b-row>
                                            <b-button
                                                @click="getSection(section.id)"
                                                variant="success"
                                            >
                                                {{ section.title }}
                                            </b-button>
                                            <b-badge
                                                variant="primary"
                                                @click="editSection(section)"
                                                >Edit</b-badge
                                            >
                                            <b-badge
                                                variant="danger"
                                                @click="destroySection(section)"
                                                >Delete</b-badge
                                            >
                                        </b-row>
                                    </b-container>
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
            </b-col>

            <b-col>
                <div class="app-container-view">
                    <b-form-input
                        v-model="task.title"
                        placeholder="Enter your name"
                    ></b-form-input>

                    <b-form-textarea
                        id="textarea"
                        v-model="task.description"
                        placeholder="Description"
                        rows="3"
                        max-rows="6"
                    ></b-form-textarea>
                    <b-button
                        variant="primary"
                        v-if="!editTodoActive"
                        @click="add()"
                        >Add</b-button
                    >
                    <b-button variant="primary" v-else @click="saveTodo()"
                        >Save</b-button
                    >
                    <div class="">
                        <div v-for="(task, idx) in section.tasks" :key="idx">
                            <b-form-checkbox
                                id="checkbox-1"
                                v-model="section.tasks[idx].state"
                                name="checkbox-1"
                                value="1"
                                @change="toggle(idx)"
                                unchecked-value="0"
                            >
                                <span
                                    :class="{ 'task-check': task.state == '1' }"
                                    >{{ task.title }}</span
                                >
                                <b-button
                                    variant="primary"
                                    @click="editTodo(task)"
                                    >Edit</b-button
                                >
                                <b-button
                                    variant="danger"
                                    @click="destroyTodo(task)"
                                    >Delete</b-button
                                >
                            </b-form-checkbox>
                        </div>
                    </div>
                </div>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
import Axios from "axios";
import AppButton from "../components/AppButton.vue";
import { mapGetters, mapActions } from "vuex";
export default {
    components: {
        AppButton
    },
    data: () => {
        return {
            tasks: [],
            task: {},
            sectionSave: {},
            sections: [],
            section: [],
            loading: true,
            editTodoActive: false,
            editSectionActive: false
        };
    },
    computed: {
        ...mapGetters({
            authenticated: "auth/authenticated",
            user: "auth/user"
        })
    },
    methods: {
        ...mapActions({
            signOutAction: "auth/signOut"
        }),

        toggle(idx) {},

        goRoute(path) {
            this.$router.push(path).catch(() => {});
        },

        async signOut() {
            await this.signOutAction(this.user);

            this.$router.replace({ name: "Login" });
        },
        getTasks(id) {
            Axios.get(`/api/tasks/${id}`).then(res => {
                this.tasks = res.data.data;
                this.loading = false;
            });
        },
        getSections() {
            Axios.get("/api/sections").then(res => {
                this.sections = res.data.data;
                this.loading = false;
                console.log("Sections: ", this.sections);
            });
        },
        getSection(id) {
            Axios.get(`/api/sections/${id}`).then(res => {
                this.section = res.data;
                this.loading = false;
            });
        },
        add() {
            this.task.section_id = this.section.id;
            console.log(this.task);
            Axios.post(`/api/tasks`, this.task).then(res => {
                this.getSection(this.task.section_id);
            });
        },
        editTodo(task) {
            this.task = task;
            this.editTodoActive = true;
        },
        saveTodo() {
            Axios.patch(`api/tasks/${this.task.id}`, this.task).then(res => {
                console.log("REsponse: ", res);
                this.getSection(this.task.section_id);
            });
        },
        destroyTodo(task) {
            Axios.delete(`/api/tasks/${task.id}`).then(res => {
                console.log("Response: ", res);

                this.getSection(task.id);
            });
        },

        addSection() {
            Axios.post(`api/sections`, this.sectionSave).then(res => {
                console.log("Respnose: ", res);
                this.getSections();
            });
        },

        editSection(section) {
            this.sectionSave = sectionSave;
            this.editSectionActive = true;
        },
        saveSection() {
            Axios.patch(`api/section/${this.section.id}`, this.section).then(
                res => {
                 