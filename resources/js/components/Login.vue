<template>
    <h1 class="d-flex justify-content-center">Login</h1>
    <div class="container-sm d-flex justify-content-center col-sm-4">
        <form class="col text-center ">
            <div class="mt-2">
                <input v-model="form.username" type="text" placeholder="Username" class="d-flex justify-content-center form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-2 mt-2">
                <input v-model="form.password" type="password" class="d-flex justify-content-center form-control col-sm-4" placeholder="Password">
            </div>
            <b-button  @click="register">Login</b-button> <br />
            <p>{{ alert }}</p>
        </form>
    </div>
</template>

<script>
import JsSIP from "jssip"
export default {
    data() {
        return {
            form: {
                username: '',
                password: '',
            },
            alert: '',
            jssipUA: NaN
        }
    },
    methods: {
        register() {
            var jssipConfiguration = {
                sockets: [new JsSIP.WebSocketInterface("ws://" + window.location.hostname + ":8088")],
                uri: "sip:" + this.form.username + "@" + window.location.hostname + ":8088",
                password: this.form.password
            }
            console.log(jssipConfiguration)
            this.jssipUA = new JsSIP.UA(jssipConfiguration)
            this.jssipUA.on('registered', (e) => { this.alert = 'registered!!!!!' })
            this.jssipUA.on('unregistered', (e) => { this.alert = "unregistered" })
            this.jssipUA.on('registrationFailed', (e) => { this.alert = "failed to register :(" })
            this.jssipUA.start()
        }
    }
    
}
</script>