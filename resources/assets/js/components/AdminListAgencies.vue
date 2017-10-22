<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <table class="table">
        <tbody>
            <tr v-for="agency in agencies">
                <td>
                    {{agency.name}}
                </td>
                <td class="text-right">
                    <a v-bind:href="agency.edit_url" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs"><i class="fa fa-trash" v-on:click="deleteAgency(agency)"></i></a>

                </td>
            </tr>
        </tbody>
    </table>

</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                agencies: []
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component (Vue 2.x).
             */
            prepareComponent() {
                this.getAgencies();
            },

            /**
             * Get all of the authorized tokens for the user.
             */
            getAgencies() {
                axios.get('/api/agencies')
                    .then(response => {
                        let agencies = response.data;
                        for(let i in agencies){
                            let agency = agencies[i];
                            agency.url = "/api/agencies/"+agency.id;
                            agency.edit_url = agency.url + "/editar";
                        }
                        this.agencies = agencies;
                    });
            },

            /**
             * Delete a Agency
             */
            deleteAgency(agency) {
                axios.delete('/api/agencies/' + agency.id)
                    .then(response => {
                        if(response.status === 204){
                            this.popFromAgency(agency.id);
                        }else{
                            alert("Algo deu errado");
                        }
                    });
            },
            popFromAgency(id){
                for(let i in this.agencies){
                    let agency = this.agencies[i];
                    if(agency.id === id){
                        this.agencies.pop(i);
                    }
                }
            }
        }
    }
</script>
