/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('topics-table', require('./components/TopicsTable.vue').default);
Vue.component('questions', require('./components/Questions.vue').default);
Vue.component('options', require('./components/Options.vue').default);
Vue.component('language-switcher', require('./components/LanguageSwitcher.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

if(window.location.toString().indexOf("/admin/topic") != -1)
{

    document.getElementById('add').addEventListener('click', function(){
        document.querySelector('.bg-modal').style.display = 'flex';
    });

    document.querySelector('.close').addEventListener('click', function(){
        document.querySelector('.bg-modal').style.display = 'none';
        app.$refs.topics.getTopics();
    });

    document.querySelector('#addTopic').addEventListener('click', function(){

        var url = '/en/admin/topic';
        var formData = $(addTopicForm).serializeArray();
        $.post(url, formData).done(function (data) {
            document.querySelector('#topic').value = '';
            document.getElementById('addTopicError').innerHTML = '';
            // $("#addCategoryError").html("");
        })
        .fail(function(response){
            $.each(response.responseJSON.errors, function(field_name, error){
                document.getElementById('addTopicError').innerHTML = error;
            })
        });

        document.querySelector('#topic').focus();
    });
};
