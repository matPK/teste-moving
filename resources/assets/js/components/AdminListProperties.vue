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
                <tr v-for="property in properties">
                    <td>
                        {{property.description}}
                    </td>
                    <td class="text-right">
                        <a v-on:click="editForm = property" data-toggle="modal" data-target="#editModal" class="btn btn-info btn-xs">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a v-on:click="deleteId = property.id" data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i>
                        </a>

                    </td>
                </tr>
            </tbody>
        </table>
        <div class="panel-footer text-center">
            <a data-toggle="modal" data-target="#createModal" class="btn btn-primary">Criar Novo</a>
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
                            <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="deleteProperty(deleteId)">Sim</button>
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
                                <label for="edit_description">Descrição</label>
                                <input v-model="editForm.description" id="edit_description" name="description" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="edit_address">Endereço</label>
                                <input v-model="editForm.address" id="edit_address" name="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="edit_type">Tipo</label>
                                <select v-model="editForm.type" id="edit_type" name="type" class="form-control">
                                    <option value="Casa">Casa</option>
                                    <option value="Apartamento">Apartamento</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_type">Agência</label>
                                <select v-model="editForm.agency_id" id="edit_agency_id" name="agency_id" class="form-control">
                                    <option v-for="agency in agencies" :value="agency.id">{{agency.name}}</option>
                                </select>
                            </div>


                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-dismiss="modal" v-on:click="editProperty()">Salvar</button>
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
                                <label for="create_description">Descrição</label>
                                <input v-model="createForm.description" id="create_description" name="description" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="create_address">Endereço</label>
                                <input v-model="createForm.address" id="create_address" name="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="create_type">Tipo</label>
                                <select v-model="createForm.type" id="create_type" name="type" class="form-control">
                                    <option value="Casa">Casa</option>
                                    <option value="Apartamento">Apartamento</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="create_agency_id">Agência</label>
                                <select v-model="createForm.agency_id" id="create_agency_id" name="agency_id" class="form-control">
                                    <option v-for="agency in agencies" :value="agency.id">{{agency.name}}</option>
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-dismiss="modal" v-on:click="createProperty()">Criar</button>
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
                properties: [],
                agencies: [],
                deleteId: 0,
                editForm: {
                    description:'',
                    address:'',
                    type:'',
                    agency_id:0
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
                this.getProperties();
                this.getAgencies();
            },

            /**
             * Get all of the authorized tokens for the user.
             */
            getProperties() {
                axios.get('/api/properties')
                    .then(response => {
                        this.properties = response.data;
                    });
            },
            getAgencies() {
                axios.get('/api/agencies')
                    .then(response => {
                        this.agencies = response.data;
                    });
            },
            /**
             * Delete a Property
             */
            deleteProperty(id) {
                axios.delete('/api/properties/' + id)
                    .then(response => {
                        if(response.status === 204){
                            this.popFromProperty(id);
                        }
                    });
            },
            popFromProperty(id){
                for(let i in this.properties){
                    let property = this.properties[i];
                    if(property.id === id){
                        this.properties.splice(i, 1);
                    }
                }
            },
            editProperty(){
                let data = this.editForm;
                axios.put('/api/properties/' + this.editForm.id, data)
                    .then(response => {
                        for(let i in this.properties){
                            if(this.properties[i].id === this.editForm.id){
                                this.properties[i].name = response.data.name;
                                this.properties[i].description = response.data.description;
                            }
                        }
                    });
            },
            createProperty(){
                let data = this.createForm;
                axios.post('/api/properties', data)
                    .then(response => {
                        if(response.status === 201){
                            this.properties.push(response.data);
                        }else if(response.status === 422 ){
                            console.log(response.data);
                        }
                        this.createForm.description = null;
                        this.createForm.address = null;
                        this.createForm.type = null;
                        this.createForm.agency_id = null;
                    });
            }
        }
    }
</script>
