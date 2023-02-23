<template >
    <div v-if="objDoc">
        <h1>Dr.{{objDoc.name + ' ' + objDoc.last_name}}</h1>
        <h2>Specializzato in:</h2>
        <ul>
            <li v-for="spec in objDoc.specializations" :key="spec.id">{{ spec.name }}</li>
        </ul>
        <img :src="objDoc.uploaded_photo ? '/storage/' + objDoc.uploaded_photo : objDoc.photo" :alt="objDoc.name">
        <!-- implementare controlli per i vari tipi di immagine (fotourl, foto importata, cv importato) -->
        <router-link :to="{name: 'msgToDoc', params: {id: objDoc.id}}" class="btn btn-primary">
            Invia un Messaggio
        </router-link>
        <router-link :to="{name: 'reviewToDoc', params: {id: objDoc.id}}" class="btn btn-primary">
            Lascia una recensione
        </router-link>
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
            objDoc: null,
        }
    },
    methods: {
        // fuffa(){
        //     console.log(this.objDoc.specialization.name);
        // }
    },
    created() {
        // console.log(this.objDoc);
        axios.get('/api/users/' + this.id)
        .then(response => {
            //da implementare controllo esistenza pagina/valore della prop per la 404
            this.objDoc = response.data.results;
        })
    }

}
</script>

<style >

</style>
