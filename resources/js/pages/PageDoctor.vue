<template >
    <div v-if="results">
        <h1>Dr.{{results.user.name + ' ' + results.user.last_name}}</h1>
        <h2>Specializzato in:</h2>
        <ul>
            <li v-for="spec in results.user.specializations" :key="spec.id">{{ spec.name }}</li>
        </ul>
        <img :src="results.user.uploaded_photo ? '/storage/' + results.user.uploaded_photo : results.user.photo" :alt="results.user.name">
        <!-- implementare controlli per i vari tipi di immagine (fotourl, foto importata, cv importato) -->
        <router-link :to="{name: 'msgToresults', params: {id: results.user.id}}" class="btn btn-primary">
            Invia un Messaggio
        </router-link>
        <router-link :to="{name: 'reviewToresults', params: {id: results.user.id}}" class="btn btn-primary">
            Lascia una recensione
        </router-link>
        <!-- <ul>
            <li v-for="rec in results.reviews" :key="rec.id">{{ rec.text }}</li>
        </ul> -->
            <h2>Recensioni:</h2>
            <ul>
                <li v-for="review in results.reviews" :key="review.id" class="border border-dark my-2 p-3 rounded">
                <p>{{ review.text }}</p>
                <p>Valutazione: {{ review.vote }}</p>
                <p>Data: {{ new Date(review.created_at).toLocaleDateString('it-IT') }}</p>
                </li>
            </ul>
    </div>
    <div v-else>Sto caricando i dati...</div>
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
        axios.get('/api/users/' + this.id)
        .then(response => {
            //da implementare controllo esistenza pagina/valore della prop per la 404
            this.results = response.data.results;
            console.log(this.results);
        })
    }

}
</script>

<style >

</style>
