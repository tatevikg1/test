<template>
    <div class="table-question">
        <div v-for="question in questions" :key="question.id" class="container">
            <Question :question="question" :language="language"></Question>
        </div>
    </div>
</template>

<script>
    export default{

        props:{
            topic: {
                required:true,
            },
            language: {
                required:false,
            }
        },

        beforeMount(){
            this.getQuestions();
        },

        data: function () {
            return {
                questions: this.questions,
                question:this.question,
            }
        },

        methods:{
            getQuestions: function(){
                axios.post(`/api/admin/get-questions/${this.topic}`)
                .then((response) => {
                    this.questions = response.data;
                })
            }
        },
        
        components:{ Question: () => import('./Question.vue') }
    }
</script>
