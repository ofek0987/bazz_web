<template>
    <b-button class="mt-2 mb-2"> {{ user.username }} </b-button>
</template>

<script>
export default {
    props: ["user"]
}
</script>