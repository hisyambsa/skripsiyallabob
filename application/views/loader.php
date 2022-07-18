<style>
  .backgroundLoading{
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: green;
    position: absolute;
    z-index: 88;
    opacity: 1;
  }


  .loaderJpg{ 

    width: 7rem;
    height: 7rem;
    /*animation: spin 2s linear infinite;*/
    z-index: 9999;

    position: absolute;
    color: White;
    left: 0%;
    /*margin: 0 auto;*/
    top: 70%;
  }

</style>

<link rel="stylesheet" id='compiled.css-css' media="all" href="<?php echo base_url('assets/node_modules/_core/css/core.min.css') ?>">


<script src="<?php echo base_url('assets/node_modules/sweetalert2/dist/sweetalert2.all.js') ?>"></script>
<script src="<?php echo base_url('assets/node_modules/_core/js/core.min.js') ?>"></script>



<div class="text-center">

  <div id="background" class="backgroundLoading">

    <div id="loading" class="loaderPng">
      <a href="#" id="idReset">
        <img src="img/syugran.png" alt="loader">
      </a>
    </div>
  </div>

</div>