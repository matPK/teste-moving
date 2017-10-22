<template>
    <div v-if="properties.length > 0" class="row">
        <div v-for="property in properties" class="col-xs-6">
            <div class="panel panel-default card">
                <div class="panel-heading text-center">
                    {{ property.description }}
                </div>
                <div class="panel-body">
                    <img src="http://s2.glbimg.com/QWNxtZSOaTbBY7HmJbzeoUDwlEU=/s.glbimg.com/jo/g1/f/original/2017/06/13/matjunho_2.jpg"
                         alt="imagem"
                         width="100%">
                </div>
                <div class="panel-footer">
                    <a v-bind:href="property.url" class="btn btn-primary btn-block">
                        <i class="fa fa-plus"></i>
                        Detalhes
                    </a>
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
                properties: []
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
                this.getProperty(1);
                this.getProperty(2);
            },

            /**
             * Get all of the authorized tokens for the user.
             */
            getProperty(id) {
                axios.get('/api/properties/'+id)
                    .then(response => {
                        this.handleProperty(response.data);
                    });
            },
            handleProperty(property) {
                property.url = "/imoveis/" + property.id;
                this.properties.push(property);
            }
        }
    }
</script>
