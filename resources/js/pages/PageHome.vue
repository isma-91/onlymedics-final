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
                <div v-for="doctor in results" class="query-width">
                    <router-link :to="{name: 'pageDocProfile', params: {id: doctor.user_id}}" class="doctor">
                    <div>
                        <img v-if="doctor.uploaded_photo || doctor.photo" :src="doctor.uploaded_photo ? '/storage/' + doctor.uploaded_photo : doctor.photo" :alt="doctor.name"  class="img-size">
                        <img v-else src="../../../public/img/dottore.jpg" :alt="doctor.name" class="img-size">
                    </div>
                    <div class="doctor_content w-100">
                        <div><strong>{{ doctor.name + ' ' + doctor.last_name}}</strong></div>
                        <div>{{ doctor.address}}</div>
                        <div>{{ doctor.phone}}</div>
                        <div>{{ doctor.email }}</div>
                    </div>
                    </router-link>
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
        axios.get('/api/premium')
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
            text-decoration: none;
            color: black;
            &:hover {
                background-color: rgba(245, 245, 245, 0.726);
                transform: scale(1.02)
            }
        }

        .doctor_content {
            font-size: 1.5rem;
        }
    }

    .sponsor_column {
        width: 300px;
        flex-grow: 1;
        font-size: 2rem;
        margin: 1rem 0;
        .sponsor_content {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: aqua;
            width: 100%;
            height: 100%;
            border: 2px solid black;
            border-radius: 1rem;
        }
    }
    .img-size {
        width: 200px;
        height: 200px;
        object-fit: cover;
        object-position: center;
        border-radius: 100%;
    }

    @media screen and (max-width: 1100px) {
        .grid_flex {
            display: flex;
            flex-direction: column;
        }
        .query-width {
            width: 100%;
            .doctor {
                width: 100%;
                margin: 1rem 0;
            }
        }
        .sponsor_column {
            width: 100%;
        }
    }

    @media screen and (max-width: 570px) {
        .doctor {
            flex-direction: column;
            justify-content: center;
        }
        .doctor_content {
           text-align: center;
        }
    }
</style>
