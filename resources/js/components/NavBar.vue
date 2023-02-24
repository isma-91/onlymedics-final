<template>
    <div class="header-container-up">
        <div class="container d-flex justify-content-between align-items-center">
            <router-link :to="{name: 'home'}" class="navbar-brand">Only Doctors</router-link>
            <div class="flex-icon">
                <router-link :to="{name:'pageSearchDoctors'}" class="btn btn-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                </router-link>
                <a href="/admin" class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- <div>

    </div> -->
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

    .header-container-up {
        background-color: #0D6EFD;
        display: flex;
        color: white;
        height: 80px;
        font-size: 2.5rem;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }

    .flex-icon {
        font-size: 1.3rem;
    }
</style>
