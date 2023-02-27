<template >
    <div v-if="results">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1>Dr.{{results.user.name + ' ' + results.user.last_name}}</h1>
            <img :src="results.user.uploaded_photo ? '/storage/' + results.user.uploaded_photo : results.user.photo" :alt="results.user.name" class="img-size my-2">
        </div>
        <h2 class="text-center">Specializzato in: </h2>
        <ul class="specialization_container">
            <li v-for="spec in results.user.specializations" :key="spec.id" class="mod_specialization">{{ spec.name }}</li>
        </ul>
        <div class="d-flex justify-content-center align-items-center my-4 gap-2">
            <router-link :to="{name: 'msgToDoc', params: {id: results.user.id}}" class="btn btn-primary">
            Invia un Messaggio
            </router-link>
            <router-link :to="{name: 'reviewToDoc', params: {id: results.user.id}}" class="btn btn-primary">
                Lascia una recensione
            </router-link>
        </div>

        <!-- implementare controlli per i vari tipi di immagine (fotourl, foto importata, cv importato) -->
        <!-- <ul>
            <li v-for="rec in results.reviews" :key="rec.id">{{ rec.text }}</li>
        </ul> -->
            <h2>Recensioni:</h2>
            <ul>
                <li v-for="review in results.reviews" :key="review.id" class="border border-2 border-dark my-2 p-3 rounded bg-white">
                    <h3>{{ review.guest_name + ' ' + review.guest_last_name}}</h3>
                    <p>{{ review.text }}</p>
                    <div class="d-flex align-items-center center fs-3">
                        <div class="me-2">Valutazione:</div>
                        <svg  v-for="star, index in review.vote" :key="index" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FBB917" class="bi bi-star-fill me-1" viewBox="0 0 16 16" stroke="black" stroke-width=".5">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>
                    <p>Data: {{ new Date(review.created_at).toLocaleDateString('it-IT') }}</p>
                </li>
            </ul>
    </div>
    <div v-else class="d-flex justify-content-center align-items-center middle">
        <div class="progress"></div>
    </div>
</template>

<script>
export default {
    props:[
        'id',
    ],
    data(){
        return{
            results: null,
        }
    },
    methods: {
        // fuffa(){
        //     console.log(this.results.specialization.name);
        // }
    },
    created() {
        setTimeout(() => {
        axios.get('/api/users/' + this.id)
        .then(response => {
            //da implementare controllo esistenza pagina/valore della prop per la 404
            this.results = response.data.results;
            console.log(this.results);
        })},1 * 1000 );
    }

}
</script>

<style lang="scss" scoped>
    .progress {
        width: 71.6px;
        height: 71.6px;
        background: linear-gradient(#3d1fcf 0 0) bottom/100% 0% no-repeat #f1f1f1;
        -webkit-mask: radial-gradient(circle at 60% 65%, #000 62%, #0000 65%) top left,
                radial-gradient(circle at 40% 65%, #000 62%, #0000 65%) top right,
                linear-gradient(to bottom left, #000 42%,#0000 43%) bottom left ,
                linear-gradient(to bottom right,#000 42%,#0000 43%) bottom right;
        -webkit-mask-size: 50% 50%;
        -webkit-mask-repeat: no-repeat;
        animation: progress-ofy9at 1.2s infinite linear;
    }

    @keyframes progress-ofy9at {
        90%, 100% {
            background-size: 100% 100%;
        }
    }

    .middle {
        height: 90vh;
    }

    .img-size {
        width: 300px;
        height: 300px;
        object-fit: cover;
        object-position: center;
        border-radius: 100%;
    }

    .specialization_container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: .5rem;
    .mod_specialization {
        background-color: #EEF2F7;
        padding: .4rem;
    }
}
</style>
