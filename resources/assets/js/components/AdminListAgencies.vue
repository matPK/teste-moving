<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div>
        <table class="table">
            <tbody>
                <tr v-for="agency in agencies">
                    <td>
                        {{agency.name}}
                    </td>
                    <td class="text-right">
                        <a v-on:click="editForm = agency" data-toggle="modal" data-target="#editModal" class="btn btn-info btn-xs">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a v-on:click="deleteId = agency.id" data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i>
                        </a>

                    </td>
                </tr>
            </tbody>
        </table>
        <div class="panel-footer text-center">
            <a data-toggle="modal" data-target="#createModal" class="btn btn-primary">Criar Nova</a>
        </div>

        <!-- Modal Delete -->
        <div class="modal fade" id="confirmDelete" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-danger text-center">Atenção</h4>
                    </div>
                    <div class="modal-body">
                        <p>Após concluir esta ação, ela é irreversível!</p>
                        <p>Tem certeza que deseja prosseguir?</p>
                        <div class="text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="deleteAgency(deleteId)">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" role="form">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-success text-center">Editar</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <div class="form-group">
                                <label for="edit_name">Nome</label>
                                <input v-model="editForm.name" id="edit_name" name="name" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="edit_name">Descrição</label>
                                <input v-model="editForm.description" id="edit_description" name="description" class="form-control">
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-dismiss="modal" v-on:click="editAgency()">Salvar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Create -->
        <div class="modal fade" id="createModal" role="form">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-success text-center">Novo</h4>
                    </div>
                    <div class="modal-body">
                        <form id="createForm">
                            <div class="form-group">
                                <label for="create_name">Nome</label>
                                <input v-model="createForm.name" id="create_name" name="name" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="create_description">Descrição</label>
                                <input v-model="createForm.description" id="create_description" name="description" class="form-control">
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-dismiss="modal" v-on:click="createAgency()">Criar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                agencies: [],
                deleteId: 0,
                editForm: {
                    name:'',
                    description:''
                },
                createForm: {
                    name:'',
                    description:''
                }
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
                        this.agencies = response.data;
                    });
            },

            /**
             * Delete a Agency
             */
            deleteAgency(id) {
                axios.delete('/api/agencies/' + id)
                    .then(response => {
                        if(response.status === 204){
                            this.popFromAgency(id);
                        }
                    });
            },
            popFromAgency(id){
                for(let i in this.agencies){
                    let agency = this.agencies[i];
                    if(agency.id === id){
                        this.agencies.splice(i, 1);
                    }
                }
            },
            editAgency(){
                let data = this.editForm;
                axios.put('/api/agencies/' + this.editForm.id, data)
                    .then(response => {
                        for(let i in this.agencies){
                            if(this.agencies[i].id === this.editForm.id){
                                this.agencies[i].name = response.data.name;
                                this.agencies[i].description = response.data.description;
                            }
                        }
                    });
            },
            createAgency(){
                let data = this.createForm;
                axios.post('/api/agencies', data)
                    .then(response => {
                        if(response.status === 201){
                            this.agencies.push(response.data);
                        }else if(response.status === 422 ){
                            console.log(response.data);
                        }
                        this.createForm.name = null;
                        this.createForm.description = null;
                    });
            }
        }
    }
</script>
