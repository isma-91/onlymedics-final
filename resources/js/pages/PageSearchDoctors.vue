<template>
    <div class="grid">
        <div class="grid-int d-flex justify-content-center align-items-center">
            <input
            type="search"
            class="col-12 py-2 text-center my-4 rounded"
            v-model="specialization"
            @keyup="searchDoctors"
            name="doctorsearch"
            id="doctorsearch"
            placeholder="Ricerca per specializzazione"
            >
        </div>
        <div v-if="results && !isFiltered">
            <h1>Tutti i medici</h1>
            <div class="row g-3">
                <div  v-for="doctor in results.data" :key="doctor.id" class="col-sm-6 col-md-4" >
                    <div class="card h-100 overflow-hidden">
                        <img :src="doctor.uploaded_photo ? '/storage/' + doctor.uploaded_photo : doctor.photo" :alt="doctor.name" class="img-size">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ doctor.name + ' ' + doctor.last_name}}</h5>
                            <p class="card-text h-100">{{ doctor.services }}</p>
                            <router-link :to="{name: 'pageDocProfile', params: {id: doctor.id}}" class="btn btn-primary">Visita</router-link>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="mt-4 d-flex justify-content-center">
                <ul class="pagination">
                    <li
                        class="page-item"
                        :class="{disabled: results.current_page == 1}"
                    >
                        <a class="page-link" href="" @click.prevent="changePage(results.current_page - 1)">Previous</a>
                    </li>

                    <li
                        v-for="page in results.last_page"
                        :key="page"
                        class="page-item"
                        :class="{active: results.current_page == page}"
                    >
                        <a class="page-link" href="" @click.prevent="changePage(page)">{{ page }}</a>
                    </li>


                    <li
                        class="page-item"
                        :class="{disabled: results.current_page == results.last_page}"
                    >
                        <a class="page-link" href="" @click.prevent="changePage(results.current_page + 1)">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div v-if="isFiltered">
            <h1>Medici filtrati per: {{ this.specialization }}</h1>
            <div class="row g-3">
                <div  v-for="doctor in doctors" :key="doctor.id" class="col-sm-6 col-md-4">
                    <div class="card h-100 overflow-hidden">
                        <img :src="doctor.uploaded_photo ? '/storage/' + doctor.uploaded_photo : doctor.photo" :alt="doctor.name" class="img-size">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ doctor.name + ' ' + doctor.last_name}}</h5>
                            <div class="d-flex flex-wrap h-100 align-items-center justify-content-center">
                                <div class="card-text me-1 bg_grey" v-for="spc in doctor.specializations.slice(0,3)" :key="spc.id"> {{ spc.name }} </div>
                            </div>
                            <router-link :to="{name: 'pageDocProfile', params: {id: doctor.id}}" class="btn btn-primary mt-2">Visita</router-link>
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
            doctors: [],
            specialization: '',
            isFiltered: false,
        };
    },
    // created() {
    //     axios.get('/api/users')
    //         .then(response => {
    //             console.log(response)
    //             this.results = response.data.results;
    //     })
    //         .catch(error => {
    //             console.log(error);
    //         });
    //     },
    methods: {
        changePage(page) {
            this.isLoading = true;
            axios.get('/api/users?page=' + page)
                .then(response => {
                    this.results = response.data.results;
                    this.isLoading = false;
                });
            },
            searchDoctors() {
                if (this.specialization){
                this.doctors = null;// reimposta i risultati a null prima di effettuare la ricerca
                this.isFiltered =  true,
                axios.get('/api/users/search', {
                    params: {
                        specialization: this.specialization,
                    },
                }).then(response => {
                    this.doctors = response.data.results;
                }).catch(error => {
                    console.log(error);
                });
                } else if (!this.specialization ){
                    this.isFiltered =  false;
                }

            },
            listStrings(arr) {
                if (arr.length <= 1) {
                    return arr[0] + ".";
                }
                return arr.slice(0, -1).join(", ") + " and " + arr.at(-1) + ".";
            },
    },
    created(){
        this.changePage(1);
    }
};

</script>

<style lang="scss" scoped>
    .grid {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .img-size {
        max-height: 285px;
        object-fit: cover;
        object-position: center;
        margin: auto;
        width: 70%;
        height: 300px;
        border-radius: 100%;
        margin-top: 15px;
    }

    .bg_grey {
        background-color: rgba($color: #0d6efd, $alpha: .6);
        padding: .2rem .9rem;
        margin-bottom: .2rem;
        color: white;
        height: min-content;
        border-radius: 1rem;
    }

    .card {
        background-color: rgba($color: #ffff, $alpha: 0.6);
    }
</style>
