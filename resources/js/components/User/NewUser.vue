<template>
    <!-- Button trigger modal to create new user -->
    <div>

        <button class="button is-primary"
                @click="open = true">
            Create User

        </button>

        <b-modal :active.sync="open">
            <form @submit.prevent="submit">
                <div class="modal-card" style="width: auto">
                    <section class="modal-card-body">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Create New User</p>
                        </header>

                        <section class="modal-card-body">
                            <b-field label="Email">
                                <b-input
                                    type="email"
                                    v-model="email"
                                    placeholder="Email"
                                    maxlength="255"
                                    required>
                                </b-input>
                            </b-field>

                            <b-field label="Name">
                                <b-input
                                    type="text"
                                    v-model="name"
                                    placeholder="Name"
                                    maxlength="255"
                                    required>
                                </b-input>
                            </b-field>

                            <b-field label="Role">
                                <user-role v-model="role_id"></user-role>
                            </b-field>
                        </section>

                        <footer class="modal-card-foot">
                            <button class="button is-primary">Submit</button>
                        </footer>

                    </section>
                </div>
            </form>

        </b-modal>

    </div>
</template>

<script>
    import UserRole from "./UserRole";
    import axios from 'axios'
    import {eventBus, REFECTHUSER} from "../../app";
    export default {
        name: "NewUser",
        components: {UserRole},
        data () {
            return {
                name: '',
                email: '',
                role_id: null,
                isSuccess: false,
                error: [],
                open: false
            }
        },
        methods: {
            submit() {

                const url = '/api/users';
                const data = {
                    name: this.name,
                    email: this.email,
                    role_id: this.role_id
                }
                axios.post(url, {...data})
                .then((res) => {
                    //reset the input
                    this.name = '';
                    this.email = '';
                    this.role_id = null;
                    //the success message
                    this.$buefy.snackbar.open({
                        message: 'New user created',
                        type: 'is-success',
                        position: 'is-top',
                    });


                //    execute the event to re-fetch users
                    eventBus.$emit(REFECTHUSER, res)
                })
                .catch((err) => {
                    if(err && err.response && err.response.data && err.response.data.errors) {
                        const error = err.response.data.errors
                        if(error.name) {
                            //display all the error relate to name
                            err.response.data.errors.name.map(err => {
                                this.$buefy.snackbar.open({
                                    message: err,
                                    type: 'is-danger',
                                    position: 'is-top',
                                })
                            })
                        }

                        if(error.email) {
                            //display all the error relate to email
                            err.response.data.errors.email.map(err => {
                                this.$buefy.snackbar.open({
                                    message: err,
                                    type: 'is-danger',
                                    position: 'is-top',
                                })
                            })
                        }

                        if(error.role_id) {
                            //display all the error relate to role
                            err.response.data.errors.role_id.map(err => {
                                this.$buefy.snackbar.open({
                                    message: err,
                                    type: 'is-danger',
                                    position: 'is-top',
                                })
                            })
                        }
                    }
                })
            },

        }
    }
</script>
