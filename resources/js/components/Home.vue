<template>
    <div>

        <h1 class="d-flex justify-content-center">Hello</h1>
        <h2 class="d-flex justify-content-center">Enjoy bazz</h2>
        <div class="col text-center">
            <router-link to="/login">
                <b-button class="rounded-pill m-5" variant="success" size="xl">Login</b-button>
            </router-link>
            <router-link to="/signup">
                <b-button class="rounded-pill m-5" variant="success" size="xl">Sign up</b-button>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "home"
}
</script>
