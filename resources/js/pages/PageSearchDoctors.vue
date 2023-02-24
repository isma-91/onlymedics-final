<template>
    <div class="grid">
        <div class="grid-int">
            <input
            type="search"
            class="col-10 py-2 text-center my-4"
            v-model="specialization"
            @keyup="searchDoctors"
            name="doctorsearch"
            id="doctorsearch"
            placeholder="Cerca"
            >
            <button class="btn btn-danger col-1" @click="searchDoctors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        <div v-if="results && !isFiltered">
            <h1>Tutti i medici</h1>
            <div class="row g-3">
                <div  v-for="doctor in results.data" :key="doctor.id" class="col-sm-6 col-md-4" >
                    <div class="card h-100 overflow-hidden">
                        <img :src="doctor.uploaded_photo ? '/storage/' + doctor.uploaded_photo : doctor.photo" :alt="doctor.name" class="img-size">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ doctor.name + ' ' + doctor.last_name}}</h5>
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
                            <h5 class="card-title">{{ doctor.name + ' ' + doctor.last_name}}</h5>
                            <p class="card-text h-100">{{ doctor.services }}</p>
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
        max-width: 420px;
        max-height: 325px;
}
</style>
