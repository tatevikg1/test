<template>

    <div class="table-topics">
        <div  v-for="topic  in topics" :key="topic.id" class="container">
            <Topic :topic="topic" :language="language"></Topic>
        </div>
    </div>
</template>

<script>

    export default{
        props:[
            'language'
        ],

        beforeMount(){
            this.getTopics();
        },

        data: function () {
            return {
                topics: this.topics,
            }
        },

        methods:{
            getTopics: function(){
                axios.post('/api/admin/get-topics')
                .then((response) => {
                    this.topics = response.data;
                })
            }
        },

        components:{ Topic: () => import('./Topic.vue') }
    }
</script>
