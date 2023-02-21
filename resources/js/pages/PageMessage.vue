<template >
    <div v-if="objDoc">
        <h1>Scrivi un messaggio al Dr.{{ objDoc.name +  objDoc.last_name}}</h1>
    </div>
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

    created() {
        console.log(this.id);
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
