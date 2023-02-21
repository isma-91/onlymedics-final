<template>
    <div class="grid">
        <div v-for="doctor in arrDoctors" :key="doctor.id" class="tile">
            <router-link :to="{name: 'pageDocProfile', params: {id: doctor.id}}">
                <img :src="doctor.photo" :alt="doctor.name">
            </router-link>
        </div>
    </div>
</template>

<script>

export default {
data() {
    return {
    arrDoctors: null,
    };
},
created() {
    axios.get('/api/users')
        .then(response => {
            console.log(response)
            this.arrDoctors = response.data.results;
    })
        .catch(error => {
            console.log(error);
        });
    },
};
</script>

<style >

</style>
