<template>
    <div class="grid">
        <h1 class="text-center">Benvenuto su Only Doctors</h1>
        <h2 class="text-center">Medici in evidenza</h2>
        <!-- <div v-if="results">
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
        </div> -->
        <div class="grid_flex" v-if="results">
            <div class="doctor_column">
                <div class="doctor" v-for="doctor in results.data">
                    <div><img :src="doctor.uploaded_photo ? '/storage/' + doctor.uploaded_photo : doctor.photo" :alt="doctor.name" class="img-size"></div>
                    <div class="doctor_content w-100">
                        <div><strong>{{ doctor.name + ' ' + doctor.last_name}}</strong></div>
                        <div>{{ doctor.address}}</div>
                        <div>{{ doctor.phone}}</div>
                        <div>{{ doctor.email }}</div>
                    </div>
                    <div>
                        <router-link :to="{name: 'pageDocProfile', params: {id: doctor.id}}" class="btn btn-primary px-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="sponsor_column">
                <div class="sponsor_content">
                    pubblicita'
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
    .grid_flex {
        display: flex;
    }
    .doctor_column {
        flex-grow: 2;
        .doctor {
            display: flex;
            align-items: center;
            gap: 1rem;
            background-color: white;
            margin: 1rem;
            border: 2px solid black;
            border-radius: 1rem;
            padding: .3rem;
        }

        .doctor_content {
            font-size: 1.5rem;
        }
    }

    .sponsor_column {
        width: 300px;
        flex-grow: 1;
        font-size: 2rem;
        .sponsor_content {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: aqua;
            margin: 1rem 0;
            width: 100%;
            height: 100%;
        }
    }
    .img-size {
        width: 200px;
        height: 200px;
        object-fit: cover;
        object-position: center;
        border-radius: 100%;
    }

</style>
