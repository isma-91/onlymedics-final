<template>
    <div>
        <header class="sticky-top">
            <NavBar />
        </header>
        <main>
            <div class="container">
                <router-view></router-view>
            </div>
        </main>
        <footer>

        </footer>
    </div>
</template>

<script>
import NavBar from './components/NavBar'

export default {
    name: 'App',

    components: {
        NavBar,
    },
}
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';
    ul{
        list-style-type: none;
    }
</style>
