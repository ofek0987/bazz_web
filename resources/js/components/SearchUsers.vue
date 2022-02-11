<template>
    <h1 class="d-flex justify-content-center">Search other users</h1>
    <div class="mt-2">
        <input @change="onSearchChange" v-model="searchedUser" type="text" placeholder="Search users" class="d-flex justify-content-center form-control">
        <search-user-list v-bind:users="foundUsers"></search-user-list>
    </div>
</template>


<script>
import SearchUserList from './SearchUserList.vue'

export default {

    data() {
        return {
            searchedUser: '',
            foundUsers: []

        }
    },
    methods: {
        onSearchChange() {
            axios.post("/api/user/search", {
                "match":{
                    "username": this.searchedUser
                }
            })
            .then((response) => {
                console.log(response.data)
              
                this.foundUsers = response.data.data
            })
            .catch((error) => {
                console.log(error)
            })
        }
    },
    components: {
        "search-user-list": SearchUserList
    }
}
</script>
