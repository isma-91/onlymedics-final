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

    .silver {
        background: rgb(229,232,233);
        background: linear-gradient(90deg, rgba(229,232,233,1) 0%, rgba(158,158,158,1) 100%)!important;
        &:hover {

        }
    }

    .gold {
        background: rgb(254,255,209);
        background: linear-gradient(90deg, rgba(254,255,209,1) 0%, rgba(255,215,0,1) 100%)!important;
    }

    .platinum {
        background: rgb(211,242,237);
        background: linear-gradient(90deg, rgba(211,242,237,1) 0%, rgba(16,184,146,1) 100%)!important;
    }

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
