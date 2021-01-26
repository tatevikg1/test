<template>
    <tr class="table-body" v-show="visible">
        <a :href="url">
            <td>{{ topic.title.toUpperCase() }}</td>
        </a>
        <td>{{ topic.created_at.slice(0, 10) }}</td>
        <td>
            <form method="post">
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="category" :value="topic.id">

                <button @click="deleteTopic(topic.id)" class="btn btn-secondary">Delete</button>
            </form>
        </td> 
    </tr>
</template>

<script>
    export default{
        props: {
            topic: {
                required: true
            }
        },

        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                visible: true,
                url: `/admin/${ this.topic.id }/question`,
            }
        },

        methods:{
            deleteTopic(id){
                event.preventDefault();
                this.visible = false;
                axios.delete(`/admin/topic/${id}`)
                .then(() => {
                    console.log('Topic was deleted.');
                })
                .catch(() => {
                    console.log('Delete request is made twice. Dont pay attention ;)');
                });
            }
        }
    }
</script>

<style>
.table-categories td {
    text-align: left; 
    vertical-align: middle;
}

</style>
