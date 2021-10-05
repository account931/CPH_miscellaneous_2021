# tic-tac-vue
Tic-tac-tac on Vue Framework 2.5.
Same as JQuery Tic-tac-toe but implemented on Vue Framework 2.5. + 
 + uses Vue router + 
 + this Vue project uses Vue-sweetalert2 (ordinary sweetAlert works Ok on {npm run dev}, but does not work in build (i.e in /dist folder)), while JQ Tic-tac-toe uses both Sweet Alert 2 and Sweet Alert 1
 Vue-sweetalerts difference from ordinary SweetAlert =>
     # instead of Swal.fire({})                  => use => this.$swal  (or sometimes Vue.swal)
     # instead of let Toast = Swal.mixin({})     => use => let Toast = this.$swal.mixin({
     
     
> tic-tac-toe on vue framework

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report

# run unit tests
npm run unit

# run all tests
npm test
```

For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
