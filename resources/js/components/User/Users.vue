<!--Responsible for rendering list of users-->
<template>
        <b-table :data="users" >
            <template slot-scope="props">
                <b-table-column label="Name">
                        <span>
                            {{ props.row.name }}
                        </span>
                </b-table-column>

                <b-table-column label="Email">
                        <span>
                            {{ props.row.email }}
                        </span>
                </b-table-column>


                <b-table-column label="Role">
                        <update-user-role :user_id="props.row.id" :roles="props.row.roles"></update-user-role>

                </b-table-column>
            </template>
        </b-table>

</template>


<script>
    import User from "./User";
    import NewRole from "./NewRole";
    import UpdateUserRole from "./UpdateUserRole";
    export default {
        components: {UpdateUserRole, NewRole, User},
        props: {
            users: Array
        },

    }
</script>

<style scoped>

</style>
