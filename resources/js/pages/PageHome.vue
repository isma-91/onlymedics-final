<template>
    <div class="grid">
        <h1 class="text-center">Benvenuto su Only Doctors</h1>
        <h2 class="text-center">Medici in evidenza</h2>
        <div v-if="results">
            <div class="row g-3">
                <div  v-for="doctor in results.data" :key="doctor.id" class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <div class="img-container  mx-auto">
                            <img :src="doctor.uploaded_photo ? '/storage/' + doctor.uploaded_photo : doctor.photo" :alt="doctor.name" class="img-size">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ doctor.name + ' ' + doctor.last_name}}</h5>
                            <p class="card-text h-100 text-center">{{ doctor.services }}</p>
                            <router-link :to="{name: 'pageDocProfile', params: {id: doctor.id}}" class="btn btn-primary">Visita</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
        results: null,
        };
    },
    created() {
        axios.get('/api/users')
            .then(response => {
                console.log(response)
                this.results = response.data.results;
                console.log(results)
        })
            .catch(error => {
                console.log(error);
            });
        },
    };

</script>

<style lang="scss" scoped>
    .img-size {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .img-container{
        margin-top: 15px;
        width: 70%;
        height: 300px;
        border-radius: 100%;
        overflow: hidden;
    }

    .card {
        background-color: rgba($color: #ffff, $alpha: 0.5);
    }
</style>
