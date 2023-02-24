<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <router-link :to="{name: 'home'}" class="navbar-brand">OnlyDoctors</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                    <li class="nav-item list-unstyled mx-auto me-md-0 mt-3 mt-md-0">
                        <div>
                            <router-link :to="{name:'pageSearchDoctors'}" class="btn btn-light">
                                Ricerca Avanzata
                            </router-link>
                            <a href="/admin" class="btn btn-light">
                                Dashboard Utente
                            </a>
                        </div>

                    </li>

                </ul>
                <!-- <form class="d-flex ms-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->

            </div>
        </div>
    </nav>
</template>

<script>
export default {

}
</script>

<style>

</style>
