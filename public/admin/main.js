const Foo = { template: '<div>foo</div>' };
const Bar = { template: '<div>bar</div>' };

// dashboard component
const dashboard = {
    template: '<p>Hello from dashboard</p>'
};

// user management component
/*const user = {
    template: '<p>Hello from user management page</p>'
}*/
const User = {
    props: ['userId'],
    template: '<div>User {{ userId }}</div>'
};
const Hello = {
    props: ['name'],
    template: '<div> <h2 class="hello">Hello {{name}}</h2> </div>'
};

const Login = {
    template: '<form class="form-horizontal" role="form" method="POST" action="login">'+
              '              <div class="form-group">'+
              '                  <label for="email" class="col-md-4 control-label">Логин (email)</label>'+
              '                  <div class="col-md-6">'+
              '                      <input id="email" type="email" class="form-control" name="email" v-model="email">'+
              '                  </div>'+
              '              </div>'+
              '              <div class="form-group">'+
              '                  <label for="password" class="col-md-4">Пароль</label>'+
              '                  <div class="col-md-6">'+
              '                      <input id="password" type="password" class="form-control" name="password" v-model="password">'+
              '                  </div>'+
              '              </div>'+
              '              <div class="form-group">'+
              '                  <div class="col-md-8 col-md-offset-4">'+
              '                      <button type="button" v-on:click="login" class="btn btn-primary">'+
              '                          Login'+
              '                      </button>'+
              '                  </div>'+
              '              </div>'+
              '          </form>'
};
// 404
const fourohfour = {
    template: '<p>Oh noes, four oh foes</p>'
};

// create our vm instance
// set our template to display the component selected 
// by the router
/*const app = Vue.extend({
    template: '<router-view></router-view>'
})*/
const routes =[
    // dynamic segments start with a colon
    //{ path: '/user/:id', component: User },
    { path: '/hello/:name', component: Hello, props: true },
    { path: '/user/:userId', name: 'user', props: true, component: User },
    { path: '/dashboard', component: dashboard },
    { path: '/foo', component: Foo },
    { path: '/bar', component: Bar },
    { path: '/login', component: Login },
    { path: '*', component: fourohfour }
];
// configure the router
// using HTML5 history mode
const router = new VueRouter({
   // history: true,
   //mode:'history',
    //saveScrollPosition: true,
    //root: '/admin',
    mode: 'history',
    base: 'admin',
    routes
});
const app = new Vue({
    el: '#app',
    data() {
        return {
            email: '',
            password: '',
            response_key: ''
        };
    },

    methods: {
        login() {
            var vm = this;

            axios.post('/login', {
                email: vm.email,
                password: vm.password
            }).then(function (response) {
                vm.response_key = response.data.result;
                this.$router.push('/user_main_page');
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
        }
    },
    router
});//.$mount('#app');

// map our frontend routes
/*        router.map({
    '*': {
        component: fourohfour
    },
    '/dashboard': {
        component: dashboard
    },
    '/users': {
        component: user
    }
})
*/
// initialize the router and mount to #app
//router.start(app, '#app')