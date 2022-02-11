<template>
    <div v-for="user in users">
        <search-user-item v-bind:user="user" /> <br />
    </div>
</template>

<script>

import SearchUserItem from "./SearchUserItem.vue"

export default {
    props: ["users"],
    components: {
        "search-user-item": SearchUserItem
    }
}
</script>