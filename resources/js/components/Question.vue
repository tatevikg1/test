<template>
    <div class="admin-question" v-if="visible">
        <div class="row justify-content-between">
            <div>
                <div>
                    <div class="question">{{ question.question }}</div>
                    <span class="point">{{question.point}}</span>
                </div>
            </div>
            
            <div>
                <div @click="deleteQuestion" class="btn btn-danger">Delete</div>
                <a :href="editLink" class="btn btn-secondary">Edit</a>
            </div>
        </div>

        <div v-for="option in options" :key="option.id">
            <div :class="{ 'correct': option.correct == '1' }">{{ option.option }}</div>
        </div>
    </div>
</template>

<script>
    export default{

        props:{
            question: {
                required:true,
            },
            language:{
                required:true,
            }
        },

        beforeMount(){
            this.getOptions();
        },

        data: function () {
            return {
                options: this.options,
                option:this.option,
                visible:true,
                editLink:`${this.language}/admin/question/${this.question.id}/edit`
            }
        },

        methods:{
            getOptions: function(){
                axios.post(`/api/admin/get-options/${this.question.id}`)
                .then((response) =>{
                    this.options = response.data;
                })
            },

            deleteQuestion: function(){
                axios.delete(`/${this.language}/admin/question/${this.question.id}`);
                this.visible = false;
            },
        },
    }
</script>

<style lang="scss">
.admin-question{
    border: 1px solid #80878d;
    margin:20px;
    padding:10px 20px;

    .question{
        font-weight:bold;
        font-size: 20px;
        position: relative;
    }
    .correct{
        color : green;
        font-weight:bold;
    }
    .point{
        position: relative;
        top: -8px;
        right: -10px;
        padding: 1px 6px;
        border-radius: 60%;
        background-color: green;
        color: white;
        font-size: 11px;
    }
}
</style>
