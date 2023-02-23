<template>
    <div class="grid">
        <input type="search" v-model="specialization" @keyup.enter="searchDoctors" name="doctorsearch" id="doctorsearch" placeholder="Cerca il tuo medico">
        <button class="btn btn-danger" @keyup.enter="searchDoctors">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
        <div v-if="results">
            <div class="row g-3">
                <div  v-for="doctor in results.data" :key="doctor.id" class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img :src="doctor.uploaded_photo ? '/storage/' + doctor.uploaded_photo : doctor.photo" :alt="doctor.name" class="img-size">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ doctor.name + ' ' + doctor.last_name}}</h5>
                            <p class="card-text">{{ doctor.services }}</p>
                            <router-link :to="{name: 'pageDocProfile', params: {id: doctor.id}}" class="btn btn-primary">Visita</router-link>
                        </div>
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
</template>

<script>

export default {
    data() {
        return {
            results: null,
            doctors: [],
            specialization: '',
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
    },
        created(){
            this.changePage(1);
        }
    };

</script>

<style lang="scss" scoped>
    .img-size {
        max-width: 420px;
        max-height: 325px;
    }
</style>
