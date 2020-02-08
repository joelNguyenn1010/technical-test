<!--Component responsible for displaying user detail-->
<template>
    <tr>
        <td>{{name}}</td>
        <td>{{email}}</td>

<!--        <td><user-role-->
<!--            :default_role="role"-->
<!--            :user_id="id"-->
<!--        ></user-role></td>-->
        <button class="btn btn-primary" @click="toggle">{{role}}</button>
        <user-role v-if="newRole"></user-role>


    </tr>
</template>

<script>
    import UserRole from "./UserRole";
    export default {
        components: {UserRole},
        props: {
            id: {
              type: Number,
              required: true
            },
            name: {
                type: String,
                required: true
            },
            email: {
                type: String,
                required: true
            },
            role: {
                type: String,
                required: true
            }
        },
        data() {
           return {
               newRole: false
           }
        },
        methods: {
            toggle() {
                this.newRole = !this.newRole;
            }
        }
    }
</script>

<style scoped>

</style>
