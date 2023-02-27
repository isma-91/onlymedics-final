<template >
    <div v-if="objDoc">
        <h1>Scrivi un messaggio al Dr.{{objDoc.user.name + ' ' + objDoc.user.last_name}}</h1>
        <form
        :action="`/api/users/${id}/message`"
        method="post"
        class="row g-3 needs-validation"
        @submit.prevent="submitData"
        @keyup.enter="submitData"
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
                required
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
                required
            >
            <div class="invalid-feedback">
                <ul v-if="errors && errors.guest_last_name">
                    <li v-for="error in errors.guest_last_name" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="mb-3">
            <label for="guest_email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                :class="{'is-invalid': errors && errors.guest_email}"
                id="guest_email"
                name="guest_email"
                v-model="guest_email"
                required
            >
            <div class="invalid-feedback">
                <ul v-if="errors && errors.guest_email">
                    <li v-for="error in errors.guest_email" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>


        <div class="mb-3">
            <label for="title" class="form-label">Oggetto del messaggio</label>
            <input
                type="text"
                class="form-control"
                :class="{'is-invalid': errors && errors.title}"
                id="title"
                name="title"
                v-model="title"
                required
            >
            <div class="invalid-feedback">
                <ul v-if="errors && errors.title">
                    <li v-for="error in errors.title" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Messaggio</label>
            <textarea class="form-control" :class="{'is-invalid': errors && errors.message}" id="message" name="message" v-model="message" required></textarea>
            <div class="invalid-feedback">
                <ul v-if="errors && errors.message">
                    <li v-for="error in errors.message" :key="error">
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
            guest_email: '',
            title: '',
            message: '',
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
            axios.post('/api/users/' + this.id + '/message', {
                user_id: this.id,
                guest_name: this.guest_name,
                guest_last_name: this.guest_last_name,
                guest_email: this.guest_email,
                title: this.title,
                message: this.message,
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
                        console.log(response.data.errors);
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
