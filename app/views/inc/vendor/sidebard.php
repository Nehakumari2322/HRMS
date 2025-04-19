<form action="<?php echo URLROOT; ?>Clients/sidebar" method="post">
  <style>
   .nav-link {
    background-color: #343a40; /* Dark background for the initial state */
    color: white;
    transition: background-color 0.3s ease;
  }

  .nav-link:hover {
      background-color: #c10505!important; /* Change to purple on hover */
      color: white; /* Ensure the text color remains white */
  }
    </style>
    <div class="row w-100">

    <!-- Tab navs -->
    <div class="nav flex-column nav-tabs bg-dark" id="v-tabs-tab" role="tablist" aria-orientation="vertical" style="padding:0">
      <button data-mdb-tab-init class="nav-link btn text-light bg mt-5" id="dashboard" name="dashboard" role="tab" aria-controls="v-tabs-home" aria-selected="true" style="height:64px;text-align:left;"><i class="fa-solid fa-chart-pie px-4"></i>Dashboard</button>

      <button data-mdb-tab-init class="nav-link btn text-light" id="user" name="user" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-user px-4"></i> User</button>


      <button data-mdb-tab-init class="nav-link btn text-light" id="project" name="project" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-file px-4"></i> Project</button>

      <button data-mdb-tab-init class="nav-link btn text-light" id="lead" name="lead" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-brain px-4"></i>Lead</button>

    </div>
    <!-- Tab navs -->

</div>

</form>