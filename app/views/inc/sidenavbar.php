<form action="<?php echo URLROOT; ?>taskmanagers/sidebar" method="post">
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

    /* Add margin to the top of the nav to prevent hiding */
    .nav-tabs {
      margin-top: 20px; /* Adjust this value as needed */
    }
  </style>
  
  <div class="row w-100">
    <!-- Tab navs -->
    <div class="nav flex-column nav-tabs bg-dark" id="v-tabs-tab" role="tablist" aria-orientation="vertical" style="padding:0;">
      <button data-mdb-tab-init class="nav-link btn text-light " id="dashboard" name="dashboard" role="tab" aria-controls="v-tabs-home"
        aria-selected="true" style="height:64px;text-align:left;"><i class="fa-solid fa-chart-pie px-4"></i>Dashboard</button>
      <button data-mdb-tab-init class="nav-link btn text-light" id="users" name="users" role="tab" aria-controls="v-tabs-profile" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-user px-4"></i> Users</button>
      <button data-mdb-tab-init class="nav-link btn text-light" id="project" name="project" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-file px-4"></i> Project</button>
      <button data-mdb-tab-init class="nav-link btn text-light" id="client" name="client" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-network-wired px-4"></i>Client</button>
      <button data-mdb-tab-init class="nav-link btn text-light" id="lead" name="lead" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-brain px-4"></i>Lead</button>
      <button data-mdb-tab-init class="nav-link btn text-light" id="leadrule" name="leadrule" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-snowflake px-4"></i>Lead Rules</button>
      <button data-mdb-tab-init class="nav-link btn text-light" id="whatsapprule" name="whatsapprule" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-brands fa-whatsapp px-4"></i>Email Rule</button>
      <!-- <button data-mdb-tab-init class="nav-link btn text-light" name="audit" id="audit" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-brands fa-audible px-4"></i>Audit Logs</button> -->
      <!-- <button data-mdb-tab-init class="nav-link btn text-light" id="call" name="call" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-file-export px-4"></i>Call Reports</button> -->
      <!-- <button data-mdb-tab-init class="nav-link btn text-light" id="leadreport" name="leadreport" role="tab" aria-controls="v-tabs-messages" aria-selected="false" style="height:64px;text-align:left"><i class="fa-solid fa-chart-line px-4"></i>Lead Reports</button> -->
    </div>
    <!-- Tab navs -->
  </div>
</form>
