<!--the component for creating new rp;e-->
<template>
    <div>
        <button class="button is-info"
                @click="open = true">
            Create Role
        </button>

<!--        modal form      -->
        <b-modal :active.sync="open">
            <form @submit.prevent="submit">
                <div class="modal-card" style="width: auto">
                    <section class="modal-card-body">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Create New Role</p>
                        </header>

                        <section class="modal-card-body">
                            <b-field label="Name">
                                <b-input
                                    type="text"
                                    v-model="name"
                                    placeholder="Role Name"
                                    maxlength="255"
                                    required>
                                </b-input>
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
    import axios from 'axios'

    export default {
        name: "NewRole",
        data () {
            return {
                name: '',
                error: [],
                open: false,
            }
        },
        methods: {
            submit () {

                if(this.name.length > 0) {
                    //make error message empty
                    this.error = "";
                    const url = '/api/roles'
                    //remove all the white space
                    const name = this.name.trim();
                    axios.post(url, {name})
                    .then((res) => {


                        //reset the input
                        this.name = '';
                        //the success message
                        this.$buefy.snackbar.open({
                            message: 'New Role created',
                            type: 'is-success',
                            position: 'is-top',
                        })

                    })
                    .catch((err) => {
                        if(err && err.response && err.response.data && err.response.data.errors) {
                            //all the error associate with name
                          err.response.data.errors.name.map(err => {
                              this.$buefy.snackbar.open({
                                  message: err,
                                  type: 'is-danger',
                                  position: 'is-top',
                              })
                          })

                        }

                    })
                } else {
                    this.$buefy.snackbar.open({
                        message: 'Please enter name',
                        type: 'is-error',
                        position: 'is-top',
                    })
                }
            }
        }
    }
</script>
