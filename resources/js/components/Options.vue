<template>
    <div class="form-group">
        <div v-for="(input, index) in questionOptions" :key="`${index}`" >
            <div class="container row">
                <input type="radio" name="correct" :value="index">
                <input v-model="input.questionOption" 
                    :name="'options['+index+']'" type="text" 
                    placeholder="Enter question option"
                    style="width:80%;"/>

                <svg @click="addField(input, questionOptions)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="ml-2 cursor-pointer">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path fill="green" d="M11 11V7h2v4h4v2h-4v4h-2v-4H7v-2h4zm1 11C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>
                </svg>
                <!-- <svg @click="removeField(index, questionOptions)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="ml-2 cursor-pointer">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path fill="#EC4899"  d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-9.414l2.828-2.829 1.415 1.415L13.414 12l2.829 2.828-1.415 1.415L12 13.414l-2.828 2.829-1.415-1.415L10.586 12 7.757 9.172l1.415-1.415L12 10.586z"/>
                </svg> -->
            </div>
        </div>
            
    </div>
</template>

<script>
    export default{

        data: function () {
            return {
                questionOptions: [
                    { questionOption: "" }
                ],

            };
        },

        methods:{
            addField(value, fieldType) {
                fieldType.push({ value });
            },
            // removeField(index, fieldType) {
            //     type.splice(index, 1);
            // },

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
input{
    margin:5px;
}
</style>
