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
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url('/img/bg-da-usare.jpg');
        max-width: 100vw;
        min-height: 100vh;
        max-height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
    }

    //scroll bar
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
