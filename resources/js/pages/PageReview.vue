<template >
    <div v-if="objDoc">
        <h1>Lascia una recensione per il Dr.{{objDoc.name + ' ' + objDoc.last_name}}</h1>
        <form
        :action="`/api/users/${id}/review`"
        method="post"
        class="row g-3 needs-validation"
        @submit.prevent="submitData"
    >


        <input type="hidden" name="user_id" id="user_id" :value="id">
        <div class="mb-3">
            <label for="guest_name" class="form-label">Nome</label>
            <input
                type="text"
                class="form-control"
                :class="{'is-invalid': errors && errors.guest_name}"
                id="guest_name"
                name="guest_name"
                v-model="guest_name"

            >
            <div class="invalid-feedback">
                <ul v-if="errors && errors.guest_name">
                    <li v-for="error in errors.guest_name" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="mb-3">
            <label for="guest_last_name" class="form-label">Cognome</label>
            <input
                type="text"
                class="form-control"
                :class="{'is-invalid': errors && errors.guest_last_name}"
                id="guest_last_name"
                name="guest_last_name"
                v-model="guest_last_name"

            >
            <div class="invalid-feedback">
                <ul v-if="errors && errors.guest_last_name">
                    <li v-for="error in errors.guest_last_name" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group row">
            <label for="vote" class="col-md-4 col-form-label text-md-right ">Voto</label>
            <div class="col-md-6">
                <select
                v-model="vote"
                class="form-select"
                name="vote"
                aria-label="Default select example"
                :class="{'is-invalid': errors && errors.vote}">
                    <option value="">Open this select menu</option>
                    <!-- Non è possibile modificare il value per simulare un errore dall'inspector? -->
                    <option v-for="num in 5" :key="num" :value="num">{{ num }}</option>
                </select>
            <div class="invalid-feedback">
                <ul v-if="errors && errors.vote">
                    <li v-for="error in errors.vote" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Scrivi una recensione</label>
            <textarea class="form-control" :class="{'is-invalid': errors && errors.text}" id="text" name="text" v-model="text"></textarea>
            <div class="invalid-feedback">
                <ul v-if="errors && errors.text">
                    <li v-for="error in errors.text" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Invia</button>
        </div>
    </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            objDoc: null,
            errors: null,
            docId: '',
            guest_name: '',
            guest_last_name: '',
            vote: '',
            text: '',
        }
    },
    props:[
        'id',
    ],
    methods: {
        // reset() {
        //     this.guest_name = '';
        //     this.guest_last_guest_name = '';
        //     this.guest_email = '';
        //     this.newsletter = '';
        //     this.message = '';
        // },
        submitData() {
            this.errors = null;
            axios.post('/api/users/' + this.id + '/review', {
                user_id: this.id,
                guest_name: this.guest_name,
                guest_last_name: this.guest_last_name,
                vote: this.vote,
                text: this.text,
            })
                .then(response => {
                    // console.log(response.data)
                    // console.log(this.id);
                    if (response.data.success) {
                        // this.resetForm();
                        console.log(response.data)
                        window.location.replace(response.data.redirect);
                        // metodo JS per una redirect immediata sfruttando i dati che ci ha inviato il controller in formato JSON
                    } else {
                        // console.log(response.data.errors);
                        this.errors = response.data.errors;
                    }
                });
        },
    },
    created() {
        this.docId = this.id;
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

