<template>
    <div class="table-topics">
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>Topic</th>
                    <th>Created at</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            
            <tbody v-for="topic  in topics" :key="topic.id" class="">
                <Topic :topic="topic"></Topic>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default{

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

<style lang="scss">
.table-topics{
    table { 
        width: 100%; 
    }
    /* Zebra striping */
    tr:nth-of-type(odd) { 
        background: #eee; 
    }
    th { 
        background: #485160; 
        color: white; 
        font-weight: bold; 
    }
    td, th { 
        padding: 6px; 
        border: 1px solid #aaa; 
        text-align: left; 
    }
    .action{
        width: 100px;
    }
}

@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr { 
        display: block; 
    }

    body, tr{
        text-align: left;
    }
    
    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr { 
        position: absolute;
        top: -9999px;
        left: -9999px;
    }
    
    tr { border: 1px solid #ccc; }
    
    td { 
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee; 
        position: relative;
        padding-left: 50%; 
        vertical-align: middle;
    }
    
    .table-categories td:before { 
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%; 
        padding-right: 10px; 
        white-space: nowrap;
    }
    
    /*  Label the data*/
    .table-categories td:nth-of-type(1):before { content: "Topic "; text-align: left; font-weight: bold; }
    .table-categories td:nth-of-type(2):before { content: "Created at"; text-align: left; font-weight: bold; }
    .table-categories td:nth-of-type(3):before { content: "Action"; text-align: left; font-weight: bold; }
    .table-categories td:nth-of-type(4):before { content: "";  }

    .table-categories td:nth-of-type(1) { text-align: right; }
    .table-categories td:nth-of-type(2) { text-align: right; }
    .table-categories td:nth-of-type(3) { text-align: right; }
    .table-categories td:nth-of-type(4) { text-align: right; }
}
</style>
