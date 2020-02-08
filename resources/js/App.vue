<template>
    <div>
        <div class="tile">
            <div class="columns">

                <div class="column">
                    <new-user></new-user>
                </div>
                <div class="column">
                    <new-role></new-role>
                </div>

            </div>


        </div>
        <div class="tile">
            <users :users="users"></users>
        </div>
    </div>
</template>

<script>
    import Users from "./components/User/Users";
    import NewUser from "./components/User/NewUser";
    import NewRole from "./components/User/NewRole";
    import axios from 'axios'
    import {eventBus, REFECTHUSER} from "./app";
    export default {
        components:  {NewRole, NewUser, Users},
        data () {
          return {  users: [] }
        },
        methods: {
            fetchUsers() {
                const url = "/api/users";
                axios.get(url)
                    .then((res) => {
                        if(res.data){
                            this.users = res.data
                        }
                    })
                    .catch((err) => {
                        this.$buefy.snackbar.open({
                            message: 'New user created',
                            type: 'is-danger',
                            position: 'is-top',
                        })
                    })
            }
        },

        created() {

            //listen to event that changes associate with user
            eventBus.$on(REFECTHUSER, () => {
                this.fetchUsers();
            });

            this.fetchUsers();

        }
    }
</script>
