<template>
    <div>
        <header class="sticky-top">
            <NavBar />
        </header>
        <main>
            <router-view></router-view>
        </main>
        <footer>
            <FooterComp />
        </footer>
    </div>
</template>

<script>
import NavBar from './components/NavBar'
import FooterComp from './components/FooterComp'

export default {
    name: 'App',

    components: {
        NavBar,
        FooterComp,
    },
}
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';

    .silver {
        background: rgb(158,158,158);
        background: linear-gradient(180deg, rgba(158,158,158,0.5) 0%, rgba(229,232,233,0.5) 100%)!important;
        transition: all 0.3s ease-in-out;
        &:hover {
           filter: brightness(105%);
        }
    }

    .gold {
        // background: rgb(254,255,209);
        // background: linear-gradient(90deg, rgba(254,255,209,0.5) 0%, rgba(255,215,0,0.5) 100%)!important;
        background: rgb(255,215,0);
        background: linear-gradient(180deg, rgba(255,215,0,0.5) 0%, rgba(254,255,209,0.5) 100%)!important;
        transition: all 0.3s ease-in-out;
        &:hover {
           filter: brightness(105%);
        }
    }

    .platinum {
        background: rgb(16,184,146);
        background: linear-gradient(180deg, rgba(16,184,146,0.5) 0%, rgba(211,242,237,0.5) 100%)!important;
        transition: all 0.3s ease-in-out;
        &:hover {
           filter: brightness(105%);
        }
    }

    .max-page {
        min-height: 100vh;
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
        margin-bottom: 0 !important;
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
