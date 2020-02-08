<!--this component responsible for changing user role-->
<template>
    <p v-if="isFetchFail">Can't get the role, please try again</p>

    <b-select :loading="fetching" v-model="selected" v-else @input="onChangeRole($event)">
        <option
            v-for="role in roles"
            :key="role.id"
            :value="role.id"
            :selected="role.id == role_id"
        >{{role.name}}</option>

    </b-select>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "UserRole",
        props: ['role_id'],
        model: {
            prop: 'role_id',
            event: 'selected_role_id'
        },
        data ()  {
             return {
                 roles: [],
                 //making a loading for fetching data
                 fetching: true,
                //make status of fetching role to database fetch
                 isFetchFail: false,

                 selected: this.role_id

             }
        },
        methods: {
            onChangeRole (event) {
                //emit the selected role id
                this.$emit('selected_role_id', event)
            }
        },
        beforeMount() {
            const url = "/api/roles";
            //get all the current role available
            axios.get(url)
            .then((res) => {
                console.log(res)
                this.roles = res.data
            })
            .catch(() => this.isFetchFail = true)
            .finally(() => {
                this.fetching = false
            })
        }

    }
</script>

<style scoped>

</style>
