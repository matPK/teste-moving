<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div v-if="properties.length > 0">
        <div v-for="property in properties" class="col-xs-6 col-sm-4 col-lg-3">
            <div class="panel panel-default card">
                <div class="panel-heading text-center">
                    {{ property.description }}
                </div>
                <div class="panel-body">
                    <img src="http://s2.glbimg.com/QWNxtZSOaTbBY7HmJbzeoUDwlEU=/s.glbimg.com/jo/g1/f/original/2017/06/13/matjunho_2.jpg"
                         alt="imagem"
                         width="100%"
                    >
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
                this.getProperties();
            },

            /**
             * Get all of the authorized tokens for the user.
             */
            getProperties() {
                axios.get('/api/properties')
                    .then(response => {
                        let properties = response.data;
                        for(var i in properties){
                            properties[i].url = "/imoveis/" + properties[i].id;
                        }
                        this.properties = properties;
                    });
            }
        }
    }
</script>
