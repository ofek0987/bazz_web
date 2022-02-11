<template>
    <h1 class="d-flex justify-content-center">Sign up</h1>
    <div class="container-sm d-flex justify-content-center col-sm-4">
        <form class="col text-center ">
            <div class="mt-2">
                <input v-model="form.username" type="text" placeholder="Username" class="d-flex justify-content-center form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-2 mt-2">
                <input v-model="form.password" type="password" class="d-flex justify-content-center form-control col-sm-4" placeholder="Password">
            </div>
            <div class="mb-2 mt-2">
                <input v-model="form.passwordAgain" type="password" class="d-flex justify-content-center form-control col-sm-4" placeholder="Password Again">
            </div>
            <b-button  @click="sendUser">Sign up</b-button> <br />
            <p>{{ alert }}</p>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                username: '',
                password: '',
                passwordAgain: ''
            },
            alert: ''
        }
    },
    methods: {
        sendUser() {
            if (this.form.password !== this.form.passwordAgain) {
                this.alert = "passwords does not match!"
                return
            }
            
            axios.post("/api/user/create", {
                "user": this.form
            })
            .then((response) => {
                this.alert = response.data
            })
            .catch((error) => {
                this.alert = error.response.data

            })
        
            
        }
    }
    
}
</script>