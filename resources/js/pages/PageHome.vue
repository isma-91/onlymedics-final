<template>
    <div class="grid">
        <h1 class="text-center">Benvenuto su Only Doctors</h1>
        <h2 class="text-center">Medici in evidenza</h2>
        <div v-if="results">

            <div v-for="doctor in results.data" :key="doctor.id" class="tile">
                <router-link :to="{name: 'pageDocProfile', params: {id: doctor.id}}">
                    <img :src="doctor.photo" :alt="doctor.name">
                </router-link>
            </div>

            <nav class="mt-4">
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
    </div>
</template>

<script>

export default {
    data() {
        return {
        results: null,
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
            }
        },
        created(){
            this.changePage(1);
        }
    };

</script>

<style >

</style>
