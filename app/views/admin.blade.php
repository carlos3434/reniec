<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo | Admin Panel</title>
</head>
<body>
    <div id="app">
        <h1>Route props</h1>
        <ul>
          <!-- use router-link component for navigation. -->
          <!-- specify the link by passing the `to` prop. -->
          <!-- <router-link> will be rendered as an `<a>` tag by default -->
          <li><router-link to="/user/juan">User</router-link></li>
          <li><router-link :to="{ name: 'user', params: { userId: 123 }}">User</router-link></li>

          <li><router-link to="/hello/you">/hello/you</router-link></li>
          
          <li><router-link to="/dashboard">Go to dash</router-link></li>
          <li><router-link to="/foo">Go to Foo</router-link></li>
          <li><router-link to="/bar">Go to Bar</router-link></li>
          <li><router-link to="/*">not found</router-link></li>
        </ul>
      <router-view class="view"></router-view>
    </div>

    <script src="/js/plugin/vue/vue-2.3.3.js"></script>
    <script src="/js/plugin/vue/vue-router-2.5.3.js"></script>
    <script src="/admin/main.js"></script>

</body>
</html>