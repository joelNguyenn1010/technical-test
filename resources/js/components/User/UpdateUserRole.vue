<!--Responsible for updating user role-->
<template>
    <div>
        <button class="button is-info"
                @click="open = true">
            {{roles.name}}
        </button>

        <b-modal :active.sync="open">
            <form @submit.prevent="submit">
                <div class="modal-card" style="width: auto">
                    <section class="modal-card-body">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Confirmation</p>
                        </header>

                        <section class="modal-card-body">
<!--                            I reuse this component to get all the current available component-->
                            <b-field label="Role">
                                <user-role v-model="role_id_selected"></user-role>
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
        name: "UpdateUserRole",
        components: {UserRole},
        data() {
            return { role_id_selected: null, open: false }
        },
        props: {
            //the current role of the user
            roles: {
                type: Object,
                required: true
            },
            user_id: Number
        },
        methods: {
            submit() {
                const url = '/api/users/update-role';
                const  data = {
                  role_id: this.role_id_selected,
                  user_id: this.user_id
                };
                axios.post(url, {...data})
                .then((res) => {

                    // tell the users component to re-fetch the user api
                    eventBus.$emit(REFECTHUSER, res);

                    this.$buefy.snackbar.open({
                        message: "Role updated",
                        type: 'is-success',
                        position: 'is-top',
                    })

                }).catch((err) => {
                    this.$buefy.snackbar.open({
                        message: "Can't update the role, please try again",
                        type: 'is-danger',
                        position: 'is-top',
                    })
                })
            },
            onSelectedRoles(value) {
                this.role_id_selected = value
            }
        },
        beforeMount() {
          this.role_id_selected = this.roles.id
        }
    }
</script>

<style scoped>

</style>
