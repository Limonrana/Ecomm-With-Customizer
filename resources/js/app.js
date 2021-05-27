require('./bootstrap');

import Vue from 'vue'
window.Vue = Vue;

let axios = require('axios');
window.axios = axios;

require('./components/edit-variant.js');
require('./components/frontend/configure.js');
require('./components/frontend/product.js');
require('./components/frontend/checkout.js');
require('./components/frontend/customer.js');
